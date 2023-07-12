<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class _SectionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('sections')->delete();
        $sections = [
            [
                'route' => 'main',
                'origin_title' => 'Main',
                'tag' => '',
            ],
                     
        ];

        foreach ($sections as $section) {
            \App\Models\_Section::create($section);
        }
    }
}
