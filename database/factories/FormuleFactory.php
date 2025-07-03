<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formule>
 */
class FormuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'montant' => $this->faker->randomFloat(2, 50, 500), // ex : 75.00 €
            'desc_formules' => $this->faker->sentence(8),       // description courte
            'nom_formule' => $this->faker->randomElement([
                'Formule Bronze',
                'Formule Argent',
                'Formule Or',
                'Formule Platine'
            ])
        ];
    }
}
