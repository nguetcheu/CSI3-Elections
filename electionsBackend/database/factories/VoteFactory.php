<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'date' => $this->faker->date($format = 'Y-m-d'),
            'id_election' => rand(1, 20),
            'id_bulletin' => rand(1, 20),
            'id_participant' => rand(1, 20),
        ];
    }
}
