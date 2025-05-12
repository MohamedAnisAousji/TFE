<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'text' => $this->faker->sentence(12),
            'evaluation' => $this->faker->numberBetween(1, 5),
            'client_id' => Client::factory(), // Crée un client automatiquement

        ];
    }
}
