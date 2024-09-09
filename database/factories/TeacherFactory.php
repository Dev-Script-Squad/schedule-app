<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'specialty' => fake()->randomElement(['Geografia', 'Matemática', 'Português', 'História', 'Física', 'Química', 'Biologia']),
            'educational_degree' => fake()->randomElement(['Mestre', 'Doutor', 'Especialista', 'Bacharel']),
        ];
    }
}