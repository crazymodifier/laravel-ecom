<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TermRelationships>
 */
class TermRelationshipsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->randomElement([1,2]),
            'term_id' => fake()->randomElement([1,4,6,9]),
            'tax_id' => fake()->randomElement([1,2,3]),
            'tax_slug' => fake()->randomElement(['','categories', 'brands']),
        ];
    }
}
