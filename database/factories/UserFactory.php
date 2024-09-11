<?php

namespace Database\Factories;

use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['Diretor', 'Coordenador', 'Professor', 'Aluno', 'Responsável']);

        return [
            'name' => fake()->name(),
            'role' => $role,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'user_type_id' => UserType::factory()->create([
                'name' => $role,
            ])->id,
        ];
    }

    public function director()
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'Diretor'
        ]);
    }
    public function coordinator()
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'Coordenador'
        ]);
    }
    public function teacher()
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'Professor'
        ]);
    }
    public function student()
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'Aluno'
        ]);
    }
    public function guardian()
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'Responsável'
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
