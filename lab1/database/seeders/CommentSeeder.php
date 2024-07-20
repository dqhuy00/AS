<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('comments')->insert([
                'account_id' => rand(1, 10),
                'book_id' => rand(1, 70),
                'content' => $faker->text(100),
                'comment_date' => now(),
            ]);
        }
    }
}
