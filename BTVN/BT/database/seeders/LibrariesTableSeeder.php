<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Library::create([
                'name' => $faker->company . ' Library',  // Tên thư viện
                'address' => $faker->address,           // Địa chỉ
                'contact_number' => $faker->phoneNumber, // Số điện thoại
            ]);
        }
    }
}