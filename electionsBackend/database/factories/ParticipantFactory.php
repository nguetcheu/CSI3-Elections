<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'num_cni' => Str::upper(str::random(10)),
            'age' => rand(21, 80),
            'id_region' => rand(1, 20),
            'login' => Str::upper(str::random(10)),
            'pwd' => $this->faker->password(),
            'email' => $this->faker->email(),
            'tel' => $this->faker->phoneNumber(),
        ];
    }
}
