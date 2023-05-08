<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Election>
 */
class electionFactory extends Factory
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
            'label' => rand(21, 80),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
