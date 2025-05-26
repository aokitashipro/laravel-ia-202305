<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => '青木',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
                'total_point' => 1000,
                'role' => 0
            ],
            [
                'name' => '山田',
                'email' => 'test1@test.com',
                'password' => Hash::make('password'),
                'total_point' => 2000,
                'role' => 5
            ],
            ]);

    }
}
