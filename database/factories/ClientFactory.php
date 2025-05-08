<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_parent' => $this->faker->lastName(),
            'prenom_parent' => $this->faker->firstName(),
            'genre_parent' => $this->faker->randomElement(['M', 'F']),
            'email' => $this->faker->unique()->safeEmail(),
            'mot_de_passe' => Hash::make('defaultPassword'),
            'type_client' => $this->faker->randomElement(['societe', 'client ordinaire']),
            'envoi_mail' => $this->faker->boolean(),
         
        ];
    }
}
