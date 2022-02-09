<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'MANAGER',
            'email' => 'manager@keypedia.com',
            'password' => Hash::make('manager1'),
            'address' => 'Manager address 10',
            'gender' => 'male',
            'dob' => 'January 1',
            'is_manager' => true,
        ]);

        DB::table('users')->insert([
            'username' => 'USER A',
            'email' => 'user_a@keypedia.com',
            'password' => Hash::make('useruser'),
            'address' => 'User address 20',
            'gender' => 'male',
            'dob' => 'March 1',
            'is_manager' => false,
        ]);

        DB::table('users')->insert([
            'username' => 'USER B',
            'email' => 'user_b@keypedia.com',
            'password' => Hash::make('useruser'),
            'address' => 'User address 30',
            'gender' => 'female',
            'dob' => 'December 1',
            'is_manager' => false,
        ]);
    }
}
