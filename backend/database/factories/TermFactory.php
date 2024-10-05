<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Term>
 */
class TermFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word,
            'slug' => fake()->unique()->slug,
            'parent' => fake()->randomElement([rand(1, 10)]), // Adjust range as needed
            'status' => fake()->randomElement(['publish', 'draft', 'pending', 'private']),
            'thumbnail' => fake()->imageUrl(640, 480, 'cats', true), // Random image URL
        ];
    }
}
