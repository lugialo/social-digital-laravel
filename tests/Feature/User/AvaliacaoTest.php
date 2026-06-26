<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AvaliacaoTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'velocidade' => 4,
            'usabilidade' => 5,
            'design' => 3,
            'atendimento' => 4,
            'geral' => 4,
        ], $overrides);
    }

    // --- Acesso ---

    public function test_authenticated_user_can_access_avaliacao(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(route('user.avaliacao'));

        $response->assertStatus(200);
        $response->assertViewIs('user.avaliacao');
    }

    public function test_guest_is_redirected_from_avaliacao(): void
    {
        $response = $this->get(route('user.avaliacao'));

        $response->assertRedirect(route('login'));
    }

    // --- Envio válido ---

    public function test_user_can_submit_avaliacao(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('user.avaliacao.store'), $this->payload());

        $response->assertRedirect(route('user.avaliacao'));
        $response->assertSessionHas('success');
    }

    public function test_avaliacao_is_persisted_with_correct_user_id(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('user.avaliacao.store'), $this->payload());

        $this->assertDatabaseHas('avaliacoes', [
            'user_id' => $user->id,
            'velocidade' => 4,
            'usabilidade' => 5,
            'design' => 3,
            'atendimento' => 4,
            'geral' => 4,
        ]);
    }

    public function test_guest_cannot_submit_avaliacao(): void
    {
        $response = $this->post(route('user.avaliacao.store'), $this->payload());

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount('avaliacoes', 0);
    }

    // --- Campos obrigatórios ---

    #[DataProvider('camposObrigatorios')]
    public function test_campo_is_required(string $campo): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(
            route('user.avaliacao.store'),
            $this->payload([$campo => ''])
        );

        $response->assertSessionHasErrors($campo);
        $this->assertDatabaseCount('avaliacoes', 0);
    }

    public static function camposObrigatorios(): array
    {
        return [
            ['velocidade'],
            ['usabilidade'],
            ['design'],
            ['atendimento'],
            ['geral'],
        ];
    }

    // --- Validação de range ---

    #[DataProvider('camposObrigatorios')]
    public function test_nota_abaixo_de_1_e_rejeitada(string $campo): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(
            route('user.avaliacao.store'),
            $this->payload([$campo => 0])
        );

        $response->assertSessionHasErrors($campo);
    }

    #[DataProvider('camposObrigatorios')]
    public function test_nota_acima_de_5_e_rejeitada(string $campo): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(
            route('user.avaliacao.store'),
            $this->payload([$campo => 6])
        );

        $response->assertSessionHasErrors($campo);
    }
}
