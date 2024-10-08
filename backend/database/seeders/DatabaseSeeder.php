<?php

namespace Database\Seeders;

use App\Models\Taxonomy;
use App\Models\Term;
use App\Models\TermRelationships;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Crazy Modifier',
            'email' => 'modifier@example.com',
            'password' => 'crazymodifier',
        ]);

        // Term::factory(30)->create();

        // Taxonomy::factory()->create(
        //         [
        //             'name' => 'Suppliers',
        //             'slug' => 'suppliers',
        //             'status' => 'publish'
        //         ]
        //     )->each(function ($taxonomy) {
        //         // Create 3 terms for each taxonomy
        //         Term::factory(15)->create(['tax_id' => $taxonomy->id]);
        //     });

        // TermRelationships::factory(10)->create();
    }
}
