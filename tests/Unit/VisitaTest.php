<?php

namespace Tests\Unit;

use App\Models\Visita;
use PHPUnit\Framework\TestCase;

class VisitaTest extends TestCase
{
    private function visita(array $attrs = []): Visita
    {
        return new Visita(array_merge([
            'logradouro' => 'Rua das Flores',
            'numero' => '123',
            'bairro' => 'Centro',
            'cidade' => 'Florianópolis',
            'estado' => 'SC',
        ], $attrs));
    }

    public function test_endereco_completo_com_todos_os_campos(): void
    {
        $visita = $this->visita();

        $this->assertEquals(
            'Rua das Flores, 123, Centro, Florianópolis - SC',
            $visita->enderecoCompleto()
        );
    }

    public function test_endereco_completo_sem_numero(): void
    {
        $visita = $this->visita(['numero' => null]);

        $this->assertEquals(
            'Rua das Flores, Centro, Florianópolis - SC',
            $visita->enderecoCompleto()
        );
    }

    public function test_endereco_completo_sem_bairro(): void
    {
        $visita = $this->visita(['bairro' => null]);

        $this->assertEquals(
            'Rua das Flores, 123, Florianópolis - SC',
            $visita->enderecoCompleto()
        );
    }

    public function test_endereco_completo_apenas_cidade_e_estado(): void
    {
        $visita = $this->visita([
            'logradouro' => null,
            'numero' => null,
            'bairro' => null,
        ]);

        $this->assertEquals('Florianópolis - SC', $visita->enderecoCompleto());
    }
}
