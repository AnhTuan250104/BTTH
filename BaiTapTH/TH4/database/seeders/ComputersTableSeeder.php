<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->unique()->word . '-' . $faker->numberBetween(1, 100),
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP ProDesk 400', 'Lenovo ThinkCentre M720']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'macOS Big Sur']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 3600', 'Intel Core i7-11700']),
                'memory' => $faker->randomElement([8, 16, 32]), // RAM ngẫu nhiên
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}