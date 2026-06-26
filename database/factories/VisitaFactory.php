<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Visita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Visita>
 */
class VisitaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'membro' => fake()->name(),
            'data' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'hora' => fake()->time('H:i'),
            'logradouro' => fake()->streetName(),
            'numero' => fake()->buildingNumber(),
            'bairro' => fake()->citySuffix(),
            'cidade' => fake()->city(),
            'estado' => 'SC',
            'descricao' => fake()->optional()->paragraph(),
            'observacao' => fake()->optional()->sentence(),
        ];
    }
}
