<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Visita;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VisitaManagementTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function user(): User
    {
        return User::factory()->create(['role' => 'user']);
    }

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'user_id' => User::factory()->create()->id,
            'membro' => 'João da Silva',
            'data' => '2025-06-10',
            'hora' => '14:30',
            'logradouro' => 'Rua das Flores',
            'numero' => '123',
            'bairro' => 'Centro',
            'cidade' => 'Florianópolis',
            'estado' => 'SC',
            'descricao' => 'Visita de acompanhamento.',
            'observacao' => 'Sem observações.',
        ], $overrides);
    }

    // --- Listagem ---

    public function test_admin_can_list_visitas(): void
    {
        Visita::factory()->count(3)->create();

        $response = $this->actingAs($this->admin())->get(route('admin.visitas.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.visitas.index');
    }

    public function test_guest_is_redirected_from_visitas_list(): void
    {
        $response = $this->get(route('admin.visitas.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_visitas_list(): void
    {
        $response = $this->actingAs($this->user())->get(route('admin.visitas.index'));

        $response->assertStatus(403);
    }

    // --- Busca ---

    public function test_admin_can_search_visitas_by_membro(): void
    {
        $assistente = User::factory()->create();
        Visita::factory()->create(['user_id' => $assistente->id, 'membro' => 'Ana Paula']);
        Visita::factory()->create(['user_id' => $assistente->id, 'membro' => 'Carlos Souza']);

        $response = $this->actingAs($this->admin())
            ->get(route('admin.visitas.index', ['search' => 'Ana']));

        $response->assertStatus(200);
        $response->assertSee('Ana Paula');
        $response->assertDontSee('Carlos Souza');
    }

    public function test_admin_can_search_visitas_by_id(): void
    {
        $visita = Visita::factory()->create();

        $response = $this->actingAs($this->admin())
            ->get(route('admin.visitas.index', ['search' => $visita->id]));

        $response->assertStatus(200);
        $response->assertSee($visita->membro);
    }

    public function test_search_with_no_results_shows_empty_state(): void
    {
        $response = $this->actingAs($this->admin())
            ->get(route('admin.visitas.index', ['search' => 'xyznotexists']));

        $response->assertStatus(200);
        $response->assertSee('Nenhuma visita encontrada');
    }

    // --- Criação ---

    public function test_admin_can_see_create_form(): void
    {
        $response = $this->actingAs($this->admin())->get(route('admin.visitas.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.visitas.create');
    }

    public function test_admin_can_create_visita(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.visitas.store'), $this->payload());

        $response->assertRedirect(route('admin.visitas.index'));
        $this->assertDatabaseHas('visitas', ['membro' => 'João da Silva', 'cidade' => 'Florianópolis']);
    }

    public function test_create_requires_membro(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.visitas.store'), $this->payload(['membro' => '']));

        $response->assertSessionHasErrors('membro');
    }

    public function test_create_requires_data(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.visitas.store'), $this->payload(['data' => '']));

        $response->assertSessionHasErrors('data');
    }

    public function test_create_requires_valid_user_id(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.visitas.store'), $this->payload(['user_id' => 99999]));

        $response->assertSessionHasErrors('user_id');
    }

    public function test_create_requires_cidade(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.visitas.store'), $this->payload(['cidade' => '']));

        $response->assertSessionHasErrors('cidade');
    }

    public function test_non_admin_cannot_create_visita(): void
    {
        $response = $this->actingAs($this->user())->post(route('admin.visitas.store'), $this->payload());

        $response->assertStatus(403);
    }

    // --- Edição ---

    public function test_admin_can_see_edit_form(): void
    {
        $visita = Visita::factory()->create(['membro' => 'Maria Oliveira']);

        $response = $this->actingAs($this->admin())->get(route('admin.visitas.edit', $visita));

        $response->assertStatus(200);
        $response->assertViewIs('admin.visitas.edit');
        $response->assertSee('Maria Oliveira');
    }

    public function test_admin_can_update_visita(): void
    {
        $visita = Visita::factory()->create(['membro' => 'Nome Antigo']);

        $this->actingAs($this->admin())->put(route('admin.visitas.update', $visita), $this->payload(['membro' => 'Nome Novo']));

        $this->assertDatabaseHas('visitas', ['id' => $visita->id, 'membro' => 'Nome Novo']);
    }

    public function test_non_admin_cannot_update_visita(): void
    {
        $visita = Visita::factory()->create();

        $response = $this->actingAs($this->user())->put(route('admin.visitas.update', $visita), $this->payload());

        $response->assertStatus(403);
    }

    // --- Exclusão ---

    public function test_admin_can_delete_visita(): void
    {
        $visita = Visita::factory()->create();

        $response = $this->actingAs($this->admin())->delete(route('admin.visitas.destroy', $visita));

        $response->assertRedirect(route('admin.visitas.index'));
        $this->assertDatabaseMissing('visitas', ['id' => $visita->id]);
    }

    public function test_non_admin_cannot_delete_visita(): void
    {
        $visita = Visita::factory()->create();

        $response = $this->actingAs($this->user())->delete(route('admin.visitas.destroy', $visita));

        $response->assertStatus(403);
        $this->assertDatabaseHas('visitas', ['id' => $visita->id]);
    }

    // --- Impressão ---

    public function test_admin_can_view_print_page(): void
    {
        $visita = Visita::factory()->create(['membro' => 'Pedro Henrique']);

        $response = $this->actingAs($this->admin())->get(route('admin.visitas.print', $visita));

        $response->assertStatus(200);
        $response->assertSee('Pedro Henrique');
    }
}
