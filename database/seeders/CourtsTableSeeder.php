<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CourtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $surfaces = ['Clay', 'Grass', 'Hard', 'Artificial Grass'];

        for ($i = 0; $i < 15; $i++) {
            DB::table('courts')->insert([
                'name' => 'Court-' . $faker->unique()->numberBetween(1, 100),
                'surface' => $surfaces[array_rand($surfaces)],
                'indoor' => $faker->boolean,
                'length' => $faker->randomNumber(2),
                'width' => $faker->randomNumber(2),
                'lighting' => $faker->boolean,
                'capacity' => $faker->randomNumber(3),
                'location' => $faker->address,
                'balls_provided' => $faker->boolean,
                'club_id' => $faker->numberBetween(1, 10), // TODO: adjust range to your club_id's range
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
