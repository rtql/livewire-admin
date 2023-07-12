<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class _PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        $pages = [
            [
                'route' => 'home',
                'type' => 'origin',
                'origin_title' => 'Home',
                'file' => 'og.jpg',
                'seo_title' => [
                    'en' => env('APP_NAME'),
                    'hy' => env('APP_NAME'),
                    'ru' => env('APP_NAME'),
                ],
                'seo_description' => [
                    'en' => env('APP_NAME'),
                    'hy' => env('APP_NAME'),
                    'ru' => env('APP_NAME'),
                ],
            ],
        ];

        foreach ($pages as $page) {
            \App\Models\_Page::create($page);
        }
    }
}
