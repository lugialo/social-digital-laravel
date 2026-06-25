<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContatoTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'assunto'  => 'Dúvida sobre o sistema',
            'mensagem' => 'Gostaria de saber mais sobre o funcionamento.',
        ], $overrides);
    }

    // --- Acesso ---

    public function test_authenticated_user_can_access_contato(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(route('user.contato'));

        $response->assertStatus(200);
        $response->assertViewIs('user.contato');
    }

    public function test_guest_is_redirected_from_contato(): void
    {
        $response = $this->get(route('user.contato'));

        $response->assertRedirect(route('login'));
    }

    // --- Envio válido ---

    public function test_user_can_submit_contato(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('user.contato.store'), $this->payload());

        $response->assertRedirect(route('user.contato'));
        $response->assertSessionHas('success');
    }

    public function test_contato_is_persisted_with_correct_user_id(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('user.contato.store'), $this->payload());

        $this->assertDatabaseHas('contatos', [
            'user_id'  => $user->id,
            'assunto'  => 'Dúvida sobre o sistema',
            'mensagem' => 'Gostaria de saber mais sobre o funcionamento.',
        ]);
    }

    public function test_guest_cannot_submit_contato(): void
    {
        $response = $this->post(route('user.contato.store'), $this->payload());

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount('contatos', 0);
    }

    // --- Campos obrigatórios ---

    public function test_assunto_is_required(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('user.contato.store'), $this->payload(['assunto' => '']));

        $response->assertSessionHasErrors('assunto');
        $this->assertDatabaseCount('contatos', 0);
    }

    public function test_mensagem_is_required(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('user.contato.store'), $this->payload(['mensagem' => '']));

        $response->assertSessionHasErrors('mensagem');
        $this->assertDatabaseCount('contatos', 0);
    }

    // --- Limites de tamanho ---

    public function test_assunto_cannot_exceed_255_characters(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('user.contato.store'), $this->payload(['assunto' => str_repeat('a', 256)]));

        $response->assertSessionHasErrors('assunto');
    }

    public function test_assunto_accepts_exactly_255_characters(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('user.contato.store'), $this->payload(['assunto' => str_repeat('a', 255)]));

        $response->assertSessionHasNoErrors();
    }

    public function test_mensagem_cannot_exceed_2000_characters(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('user.contato.store'), $this->payload(['mensagem' => str_repeat('a', 2001)]));

        $response->assertSessionHasErrors('mensagem');
    }

    public function test_mensagem_accepts_exactly_2000_characters(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('user.contato.store'), $this->payload(['mensagem' => str_repeat('a', 2000)]));

        $response->assertSessionHasNoErrors();
    }
}
