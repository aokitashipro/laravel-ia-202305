<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cafes')->insert([
            [
                'name' => 'タリーズ',
                'prefecture' => '東京都',
                'address' => '港区',
                'review' => 3.5,
                'is_visible' => true
            ],
            [
                'name' => 'スタバ',
                'prefecture' => '東京都',
                'address' => '港区',
                'review' => 3.5,
                'is_visible' => true
            ],
            [
                'name' => 'ベローチェ',
                'prefecture' => '東京都',
                'address' => '港区',
                'review' => 3.5,
                'is_visible' => true
            ],

            ]);
    }
}
