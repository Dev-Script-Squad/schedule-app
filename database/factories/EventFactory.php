<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'type' => fake()->randomElement(['Férias', 'Provas', 'Carnaval', 'Páscoa']),
            'start' => fake()->dateTime($max = 'now', $timezone = null),
            'end' => fake()->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = null),
            'school_class_id' => SchoolClass::factory()->create(),
            // 'user_id',
            // 'student_id',
            // 'event_content_id'
        ];
    }
}
