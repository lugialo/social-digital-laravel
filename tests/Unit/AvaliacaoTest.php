<?php

namespace Tests\Unit;

use App\Models\Avaliacao;
use PHPUnit\Framework\TestCase;

class AvaliacaoTest extends TestCase
{
    public function test_media_calcula_corretamente(): void
    {
        $avaliacao = new Avaliacao([
            'velocidade' => 4,
            'usabilidade' => 5,
            'design' => 3,
            'atendimento' => 4,
            'geral' => 4,
        ]);

        $this->assertEquals(4.0, $avaliacao->media());
    }

    public function test_media_com_notas_minimas(): void
    {
        $avaliacao = new Avaliacao([
            'velocidade' => 1,
            'usabilidade' => 1,
            'design' => 1,
            'atendimento' => 1,
            'geral' => 1,
        ]);

        $this->assertEquals(1.0, $avaliacao->media());
    }

    public function test_media_com_notas_maximas(): void
    {
        $avaliacao = new Avaliacao([
            'velocidade' => 5,
            'usabilidade' => 5,
            'design' => 5,
            'atendimento' => 5,
            'geral' => 5,
        ]);

        $this->assertEquals(5.0, $avaliacao->media());
    }

    public function test_media_com_resultado_decimal(): void
    {
        $avaliacao = new Avaliacao([
            'velocidade' => 1,
            'usabilidade' => 2,
            'design' => 3,
            'atendimento' => 4,
            'geral' => 5,
        ]);

        $this->assertEquals(3.0, $avaliacao->media());
    }
}
