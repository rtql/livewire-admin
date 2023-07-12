<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            _PermissionSeeder::class,
            _AdminSeeder::class,
            _SectionSeeder::class,
            _PageSeeder::class,
        ]);
        \App\Models\_Contact::factory()->create();
    }
}
