<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('posts')->insert([
                'title' => 'Post Title ' . ($i + 1),
                'slug' => Str::slug('Post Title ' . ($i + 1)),
                'content' => 'This is the content for post ' . ($i + 1) . '.',
                'image' => 'img/banner.png',
                'status' => 1,
                'category_id' => rand(1, 2),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
