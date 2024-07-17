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
            "Nom_Parent" => $this->faker->name(),
            "Prenom_Parent" => $this->faker->name(),
            "Email" => $this->faker->unique()->safeEmail(),
            "Genre" => $this->faker->boolean(),  // Ajout des parenthèses
            "Envoi_Email" => $this->faker->boolean(),  // Ajout des parenthèses
            "password" => Hash::make('defaultPassword'),  // Hashage du mot de passe
            "remember_token" => Str::random(10),
        ];
    }
}
