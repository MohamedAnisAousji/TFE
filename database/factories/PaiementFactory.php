<?php

namespace Database\Factories;
use App\Models\Reservation;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'mode_paiement' => $this->faker->randomElement(['carte', 'cash', 'virement']),
            'type_paiement' => $this->faker->randomElement(['total', 'acompte']),
            'montant' => $this->faker->numberBetween(20, 500),
            'reservation_id' => Reservation::factory(), // Génère une réservation automatiquement
        ];
    }
}
