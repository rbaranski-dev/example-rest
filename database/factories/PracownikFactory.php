<?php

namespace Database\Factories;

use App\Models\Firma;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pracownik>
 */
class PracownikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imie' => $this->faker->firstName(),
            'nazwisko' => $this->faker->name(),
            'email' => $this->faker->freeEmail(),
            'telefon' => $this->faker->phoneNumber(),
            'firma_id' => Firma::factory()->create()->id,
        ];
    }
}
