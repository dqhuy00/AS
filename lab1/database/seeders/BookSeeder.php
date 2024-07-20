<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->text(25),
                'thumbnail' => 'https://cdn0.fahasa.com/media/catalog/product/8/9/8935235240308.jpg',
                'author' => $faker->text(10),
                'publisher' => $faker->text(10),
                'publication' => now(),
                'price' => rand(10, 100),
                'quantity' => rand(1, 20),
                'category_id' => rand(1, 10),
            ]);
        }
    }
}
