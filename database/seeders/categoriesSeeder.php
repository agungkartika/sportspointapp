<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Artikel',
                'slug' => 'artikel',
                'user_id' => 1,

            ],
            [
                'name' => 'Tips',
                'slug' => 'tips',
                'user_id' => 1,
            ],
        ]);
    }
}
