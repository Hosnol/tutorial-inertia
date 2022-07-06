<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            DB::table('posts')->insert([
                'title' => $faker->sentence(),
                'content' => $faker->paragraph(),
                'author_id' => $user->id,
            ]);
        }
    }
}
