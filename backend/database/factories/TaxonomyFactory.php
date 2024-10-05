<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taxonomy>
 */
class TaxonomyFactory extends Factory
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
            'status' => fake()->randomElement(['publish', 'draft', 'pending', 'private']),
            'thumbnail' => fake()->imageUrl(640, 480, 'cats', true), // Random image URL
        ];
    }
}
