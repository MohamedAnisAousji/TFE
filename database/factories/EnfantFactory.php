<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enfant>
 */
class EnfantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_Nais' => $this->faker->date(),
            'nom_enfant' => $this->faker->lastName(),
            'prenom_Enfant' => $this->faker->firstName(),
            'client_id' => Client::factory(), 
        ];
    }
}
