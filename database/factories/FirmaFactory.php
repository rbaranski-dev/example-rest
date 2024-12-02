<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Firma>
 */
class FirmaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nazwa' => $this->faker->name(),
            'nip' => $this->faker->numerify('###########'),
            'adres' => $this->faker->streetAddress(),
            'miasto' => $this->faker->city(),
            'kod_pocztowy' => $this->faker->postcode(),
        ];
    }
}
