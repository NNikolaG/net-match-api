<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('clubs')->insert([
                'name' => $faker->company,
                'city' => $faker->city,
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'contact_name' => $faker->name,
                'contact_phone' => $faker->phoneNumber,
                'contact_email' => $faker->email,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
