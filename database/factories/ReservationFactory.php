<?php

namespace Database\Factories;
use App\Models\Client;
use App\Models\Formule;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
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
            'heure' => $this->faker->time(),
            'created_at' => now(),
            'deleted_at' => null,
            'client_id' => Client::factory(),
            'formule_id' => Formule::factory(),
        ];
    }
}
