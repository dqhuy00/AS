<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('accounts')->insert([
                'fullname' => $faker->text(25),
                'address' => $faker->text(100),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->unique()->safeEmail(),
                'password' => '123',
            ]);
        }
    }
}
