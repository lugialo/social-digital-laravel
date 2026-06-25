<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
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

    // --- Listagem ---

    public function test_admin_can_list_users(): void
    {
        $admin = $this->admin();
        User::factory()->count(3)->create();

        $response = $this->actingAs($admin)->get(route('admin.users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
    }

    public function test_guest_is_redirected_from_users_list(): void
    {
        $response = $this->get(route('admin.users.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_users_list(): void
    {
        $response = $this->actingAs($this->user())->get(route('admin.users.index'));

        $response->assertStatus(403);
    }

    // --- Busca ---

    public function test_admin_can_search_users_by_name(): void
    {
        $admin = $this->admin();
        $target = User::factory()->create(['name' => 'João da Silva']);
        User::factory()->create(['name' => 'Maria Souza']);

        $response = $this->actingAs($admin)->get(route('admin.users.index', ['search' => 'João']));

        $response->assertStatus(200);
        $response->assertSee('João da Silva');
        $response->assertDontSee('Maria Souza');
    }

    public function test_admin_can_search_users_by_cpf(): void
    {
        $admin = $this->admin();
        $target = User::factory()->create(['cpf' => '12345678900']);
        User::factory()->create(['cpf' => '99999999999']);

        $response = $this->actingAs($admin)->get(route('admin.users.index', ['search' => '12345678900']));

        $response->assertStatus(200);
        $response->assertSee($target->name);
        $response->assertDontSee('99999999999');
    }

    public function test_admin_can_search_users_by_id(): void
    {
        $admin = $this->admin();
        $target = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('admin.users.index', ['search' => $target->id]));

        $response->assertStatus(200);
        $response->assertSee($target->name);
    }

    public function test_search_with_no_results_shows_empty_state(): void
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin)->get(route('admin.users.index', ['search' => 'xyznotexists']));

        $response->assertStatus(200);
        $response->assertSee('Nenhum usuário encontrado');
    }

    // --- Criação ---

    public function test_admin_can_see_create_form(): void
    {
        $response = $this->actingAs($this->admin())->get(route('admin.users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.create');
    }

    public function test_admin_can_create_user(): void
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin)->post(route('admin.users.store'), [
            'name'       => 'Novo Usuário',
            'cpf'        => '11122233344',
            'rg'         => '1234567',
            'email'      => 'novo@example.com',
            'phone'      => '11999998888',
            'birth_date' => '1990-05-15',
            'role'       => 'user',
            'password'   => 'senha1234',
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', ['email' => 'novo@example.com', 'name' => 'Novo Usuário']);
    }

    public function test_create_requires_name(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.users.store'), [
            'email'    => 'x@example.com',
            'cpf'      => '11122233344',
            'role'     => 'user',
            'password' => 'senha1234',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_create_requires_email(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.users.store'), [
            'name'     => 'Teste',
            'cpf'      => '11122233344',
            'role'     => 'user',
            'password' => 'senha1234',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_create_requires_unique_email(): void
    {
        $existing = User::factory()->create(['email' => 'duplicado@example.com']);

        $response = $this->actingAs($this->admin())->post(route('admin.users.store'), [
            'name'     => 'Outro',
            'cpf'      => '11122233344',
            'email'    => 'duplicado@example.com',
            'role'     => 'user',
            'password' => 'senha1234',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_create_requires_unique_cpf(): void
    {
        User::factory()->create(['cpf' => '11122233344']);

        $response = $this->actingAs($this->admin())->post(route('admin.users.store'), [
            'name'     => 'Outro',
            'cpf'      => '11122233344',
            'email'    => 'novo@example.com',
            'role'     => 'user',
            'password' => 'senha1234',
        ]);

        $response->assertSessionHasErrors('cpf');
    }

    public function test_create_requires_password(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.users.store'), [
            'name'  => 'Teste',
            'cpf'   => '11122233344',
            'email' => 'novo@example.com',
            'role'  => 'user',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_create_requires_password_min_8_chars(): void
    {
        $response = $this->actingAs($this->admin())->post(route('admin.users.store'), [
            'name'     => 'Teste',
            'cpf'      => '11122233344',
            'email'    => 'novo@example.com',
            'role'     => 'user',
            'password' => '1234567',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_non_admin_cannot_create_user(): void
    {
        $response = $this->actingAs($this->user())->post(route('admin.users.store'), [
            'name'     => 'Teste',
            'cpf'      => '11122233344',
            'email'    => 'novo@example.com',
            'role'     => 'user',
            'password' => 'senha1234',
        ]);

        $response->assertStatus(403);
    }

    // --- Edição ---

    public function test_admin_can_see_edit_form(): void
    {
        $target = User::factory()->create();

        $response = $this->actingAs($this->admin())->get(route('admin.users.edit', $target));

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.edit');
        $response->assertSee($target->name);
    }

    public function test_admin_can_update_user(): void
    {
        $target = User::factory()->create(['name' => 'Nome Antigo']);

        $this->actingAs($this->admin())->put(route('admin.users.update', $target), [
            'name'     => 'Nome Novo',
            'cpf'      => $target->cpf,
            'email'    => $target->email,
            'role'     => $target->role,
            'password' => '',
        ]);

        $this->assertDatabaseHas('users', ['id' => $target->id, 'name' => 'Nome Novo']);
    }

    public function test_admin_can_update_user_without_changing_password(): void
    {
        $target = User::factory()->create();
        $oldHash = $target->password;

        $this->actingAs($this->admin())->put(route('admin.users.update', $target), [
            'name'     => $target->name,
            'cpf'      => $target->cpf,
            'email'    => $target->email,
            'role'     => $target->role,
            'password' => '',
        ]);

        $this->assertDatabaseHas('users', ['id' => $target->id, 'password' => $oldHash]);
    }

    public function test_update_allows_same_email_for_same_user(): void
    {
        $target = User::factory()->create(['email' => 'mesmo@example.com']);

        $response = $this->actingAs($this->admin())->put(route('admin.users.update', $target), [
            'name'     => $target->name,
            'cpf'      => $target->cpf,
            'email'    => 'mesmo@example.com',
            'role'     => $target->role,
            'password' => '',
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $response->assertSessionHasNoErrors();
    }

    public function test_non_admin_cannot_update_user(): void
    {
        $target = User::factory()->create();

        $response = $this->actingAs($this->user())->put(route('admin.users.update', $target), [
            'name'  => 'Hack',
            'cpf'   => $target->cpf,
            'email' => $target->email,
            'role'  => 'user',
        ]);

        $response->assertStatus(403);
    }

    // --- Exclusão ---

    public function test_admin_can_delete_user(): void
    {
        $target = User::factory()->create();

        $response = $this->actingAs($this->admin())->delete(route('admin.users.destroy', $target));

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', ['id' => $target->id]);
    }

    public function test_non_admin_cannot_delete_user(): void
    {
        $target = User::factory()->create();

        $response = $this->actingAs($this->user())->delete(route('admin.users.destroy', $target));

        $response->assertStatus(403);
        $this->assertDatabaseHas('users', ['id' => $target->id]);
    }

    // --- Impressão ---

    public function test_admin_can_view_print_page(): void
    {
        $target = User::factory()->create();

        $response = $this->actingAs($this->admin())->get(route('admin.users.print', $target));

        $response->assertStatus(200);
        $response->assertSee($target->name);
    }
}
