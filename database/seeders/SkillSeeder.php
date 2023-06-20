<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [  'name' => 'Laravel' ],
            [  'name' => 'php' ],
            [  'name' => 'database' ],
        ]);

        DB::table('skill_user')->insert([
            [  'user_id' => 1,
                'skill_id' => 1,
                'score' => 3,
                'created_at' => now()
            ],
            [  'user_id' => 1,
                'skill_id' => 2,
                'score' => 5,
                'created_at' => now()
            ],
            [  'user_id' => 2,
                'skill_id' => 1,
                'score' => 3,
                'created_at' => now()
            ],
        ]);
    }
}