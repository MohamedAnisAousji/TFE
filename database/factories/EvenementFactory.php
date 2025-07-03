<?php

namespace Database\Factories;
use App\Models\Client;
use App\Models\evenements;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 *   @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateDebut = $this->faker->dateTimeBetween('+1 days', '+1 month');
        $dateFin = (clone $dateDebut)->modify('+1 day');

        return [
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'nombre' => $this->faker->numberBetween(10, 100),
            'status' => $this->faker->randomElement(['payer', 'impayer']),
            'email' => $this->faker->safeEmail(),
            'nom_societe' => $this->faker->company(),
            'formule_demande' => $this->faker->sentence(10),
            'client_id' => Client::factory(),
        ];
    }
}
