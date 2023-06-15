<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'テント'],
            ['name' => 'ウェア'],
            ['name' => 'バッグ'],
            ['name' => 'チェア'],
            ['name' => 'ランタン'],
            ['name' => 'クーラーボックス'],
            ['name' => 'アウトドアワゴン'],
            ['name' => 'BBQ用品'],
            ['name' => 'キャンプ用食器'],
            ['name' => 'ストーブ・ヒーター'],
            ]);

    }
}
