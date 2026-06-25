<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerfilTest extends TestCase
{
    use RefreshDatabase;

    // --- Acesso ---

    public function test_authenticated_user_can_access_perfil(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('user.perfil'));

        $response->assertStatus(200);
        $response->assertViewIs('user.perfil');
    }

    public function test_guest_is_redirected_from_perfil(): void
    {
        $response = $this->get(route('user.perfil'));

        $response->assertRedirect(route('login'));
    }

    // --- Dados exibidos ---

    public function test_perfil_shows_own_name(): void
    {
        $user = User::factory()->create(['name' => 'Maria Oliveira']);

        $response = $this->actingAs($user)->get(route('user.perfil'));

        $response->assertSee('Maria Oliveira');
    }

    public function test_perfil_shows_own_cpf(): void
    {
        $user = User::factory()->create(['cpf' => '12345678900']);

        $response = $this->actingAs($user)->get(route('user.perfil'));

        $response->assertSee('12345678900');
    }

    public function test_perfil_shows_own_email(): void
    {
        $user = User::factory()->create(['email' => 'maria@example.com']);

        $response = $this->actingAs($user)->get(route('user.perfil'));

        $response->assertSee('maria@example.com');
    }

    public function test_perfil_shows_own_birth_date_formatted(): void
    {
        $user = User::factory()->create(['birth_date' => '1990-06-15']);

        $response = $this->actingAs($user)->get(route('user.perfil'));

        $response->assertSee('15/06/1990');
    }

    public function test_perfil_shows_dash_when_birth_date_is_null(): void
    {
        $user = User::factory()->create(['birth_date' => null]);

        $response = $this->actingAs($user)->get(route('user.perfil'));

        $response->assertSee('—');
    }

    public function test_perfil_does_not_show_other_users_data(): void
    {
        $user  = User::factory()->create(['name' => 'Usuário A']);
        $other = User::factory()->create(['name' => 'Usuário B']);

        $response = $this->actingAs($user)->get(route('user.perfil'));

        $response->assertSee('Usuário A');
        $response->assertDontSee('Usuário B');
    }
}
