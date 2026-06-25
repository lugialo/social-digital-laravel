<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Visita;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
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

    // --- Acesso ---

    public function test_admin_can_access_dashboard(): void
    {
        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard');
    }

    public function test_guest_is_redirected_from_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_dashboard(): void
    {
        $response = $this->actingAs($this->user())->get(route('admin.dashboard'));

        $response->assertStatus(403);
    }

    // --- Totais ---

    public function test_dashboard_shows_correct_total_usuarios(): void
    {
        User::factory()->count(4)->create(['role' => 'user']);
        User::factory()->count(2)->create(['role' => 'admin']);

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('totalUsuarios', 4);
    }

    public function test_dashboard_shows_correct_total_visitas(): void
    {
        Visita::factory()->count(5)->create();

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('totalVisitas', 5);
    }

    public function test_dashboard_shows_correct_visitas_do_mes(): void
    {
        Visita::factory()->count(3)->create(['data' => now()->format('Y-m-d')]);
        Visita::factory()->count(2)->create(['data' => now()->subYear()->format('Y-m-d')]);

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('visitasMes', 3);
    }

    public function test_dashboard_shows_zero_when_no_visitas_this_month(): void
    {
        Visita::factory()->count(2)->create(['data' => now()->subMonths(2)->format('Y-m-d')]);

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('visitasMes', 0);
    }

    // --- Dados dos gráficos ---

    public function test_dashboard_passes_meses_labels_with_12_entries(): void
    {
        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('mesesLabels', fn ($labels) => count($labels) === 12);
    }

    public function test_dashboard_passes_meses_data_with_12_entries(): void
    {
        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('mesesData', fn ($data) => count($data) === 12);
    }

    public function test_dashboard_meses_data_counts_visitas_per_month(): void
    {
        Visita::factory()->count(2)->create(['data' => now()->format('Y-m-d')]);

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $mesesData = $response->viewData('mesesData');
        $this->assertEquals(2, last($mesesData));
    }

    public function test_dashboard_passes_visitas_por_assistente(): void
    {
        $assistente = $this->user();
        Visita::factory()->count(3)->create(['user_id' => $assistente->id]);

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('visitasPorAssistente', function ($collection) use ($assistente) {
            return $collection->contains('name', $assistente->name);
        });
    }

    // --- Visitas recentes ---

    public function test_dashboard_passes_visitas_recentes(): void
    {
        Visita::factory()->count(5)->create();

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('visitasRecentes', fn ($v) => $v->count() === 5);
    }

    public function test_dashboard_visitas_recentes_limited_to_10(): void
    {
        Visita::factory()->count(15)->create();

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertViewHas('visitasRecentes', fn ($v) => $v->count() === 10);
    }

    public function test_dashboard_visitas_recentes_ordered_by_most_recent(): void
    {
        $antiga = Visita::factory()->create(['data' => now()->subDays(10)->format('Y-m-d')]);
        $recente = Visita::factory()->create(['data' => now()->format('Y-m-d')]);

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $visitasRecentes = $response->viewData('visitasRecentes');
        $this->assertEquals($recente->id, $visitasRecentes->first()->id);
    }
}
