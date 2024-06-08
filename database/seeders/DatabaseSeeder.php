<?php

namespace Database\Seeders;

use App\Models\Role;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Nikola',
            'email' => 'nikola@gmail.com',
            'password' => Hash::make('Nikola2208!'),
            'skill_level' => 'Beginner',
            'phone_number' => '', // update this as per the data
            'address' => '', // update this as per the data
            'last_name' => 'Gutic',
            'age' => 24,
            'gender' => 'Male',
            'date_of_birth' => '2000-01-15',
            'city' => 'Belgrade'
        ]);

        Role::create(['id' => 1, 'name' => 'Admin']);
        Role::create(['id' => 2, 'name' => 'Player']);
        Role::create(['id' => 3, 'name' => 'Trainer']);

        DB::table('role_user')
            ->insert([
                'role_id' => 1,
                'user_id' => 1,
            ]);

        $this->call(ClubsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(CourtsTableSeeder::class);
    }
}
