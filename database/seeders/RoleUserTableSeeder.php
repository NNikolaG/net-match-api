<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $role_ids = [2, 3];    // Your Role IDs

        // Get Number of users
        $userCount = DB::table('users')->count();

        // We create a mapping for every user
        for ($i = 1; $i <= $userCount; $i++) {

            DB::table('role_user')->insert([
                'user_id' => $i,
                'role_id' => $faker->randomElement($role_ids)
            ]);
        }
    }
}
