<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sales;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $faker = Faker::create();

        $startDate = '2023-01-01';
        $endDate = '2023-12-31';

        // Get the total number of users
        $totalUsers = User::count();

        foreach (range(1, 20) as $index) {
            // Generate a random date between $startDate and $endDate
            $randomDate = $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d');

            // Add 'jenis' field with values "barang" or "jasa"
            $jenis = $faker->randomElement(['barang', 'jasa']);
            $nominal = $faker->randomElement(['5', '10']);

            // Get a random user ID from the 'users' table
            $randomUserId = $faker->numberBetween(1, $totalUsers);

            Sales::create([
                'tgl' => $randomDate, 
                'jenis' => $jenis,
                'user_id' => $randomUserId, 
                'nominal' => $nominal, 
            ]);
        }
    }
}
