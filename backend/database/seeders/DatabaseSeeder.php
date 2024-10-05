<?php

namespace Database\Seeders;

use App\Models\Term;
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
    }
}
