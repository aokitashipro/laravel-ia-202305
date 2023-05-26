<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitializePlayerPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('player_position')->insert(
            [
                ['player_id' => 1, 'position_id' => 1],
                ['player_id' => 1, 'position_id' => 2],

                ['player_id' => 2, 'position_id' => 2],
                ['player_id' => 2, 'position_id' => 3],

                ['player_id' => 3, 'position_id' => 3],
                ['player_id' => 3, 'position_id' => 4],

                ['player_id' => 4, 'position_id' => 4],
                ['player_id' => 4, 'position_id' => 5],

                ['player_id' => 5, 'position_id' => 5],
                ['player_id' => 5, 'position_id' => 1],

                ['player_id' => 6, 'position_id' => 1],
                ['player_id' => 6, 'position_id' => 3],

                ['player_id' => 7, 'position_id' => 2],
                ['player_id' => 7, 'position_id' => 4],

                ['player_id' => 8, 'position_id' => 3],
                ['player_id' => 8, 'position_id' => 5],

                ['player_id' => 9, 'position_id' => 4],
                ['player_id' => 9, 'position_id' => 3],
            ]
        );

    }
}
