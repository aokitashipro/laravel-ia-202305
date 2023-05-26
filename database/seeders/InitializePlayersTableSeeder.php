<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitializePlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('players')->insert(
            [
                ['name' => '選手1', 'team_id' => 1],
                ['name' => '選手2', 'team_id' => 2],
                ['name' => '選手3', 'team_id' => 3],
                ['name' => '選手4', 'team_id' => 1],
                ['name' => '選手5', 'team_id' => 2],
                ['name' => '選手6', 'team_id' => 3],
                ['name' => '選手7', 'team_id' => 1],
                ['name' => '選手8', 'team_id' => 2],
                ['name' => '選手9', 'team_id' => 3],
            ]
        );

    }
}
