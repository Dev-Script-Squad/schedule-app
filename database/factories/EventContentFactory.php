<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventContent>
 */
class EventContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Férias', 'Provas', 'Carnaval', 'Páscoa']),
            'subtitle' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'description' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'background_image' => fake()->imageUrl($width = 640, $height = 480),
            'card_image' => fake()->imageUrl($width = 640, $height = 480),
            'card_color' => fake()->randomElement(['Vermelho', 'Verde', 'Azul', 'Amarelo']),
        ];
    }
}
