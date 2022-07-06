<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $posts = \App\Models\Post::all();
        foreach($posts as $post) {
            DB::table('comments')->insert([
                'reply' => $faker->paragraph(),
                'post_id' => $post->id,
            ]);
        }
    }
}
