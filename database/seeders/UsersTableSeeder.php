<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $skill_level = ['Beginner', 'Intermediate', 'Advanced', 'Professional'];
        $gender = ['Male', 'Female', 'Other'];

        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => $faker->dateTime,
                'password' => '$2y$12$njE.oUzfEhdUKqeonaZMGOaWrk62/t0/gvsRZ3k0aJ.Z.OG6IcjLy', // password
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'skill_level' => $skill_level[array_rand($skill_level)],
                'availability' => $faker->boolean,
                'city' => $faker->city,
                'bio' => $faker->text($maxNbChars = 200),
                'profile_picture' => $faker->imageUrl(),
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                'gender' => $gender[array_rand($gender)],
                'age' => $faker->numberBetween(16, 40),
                'club_id' => $faker->numberBetween(1, 10),  // TODO: adjust according to your clubs count
                'remember_token' => 'hXwEVFrueQ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
