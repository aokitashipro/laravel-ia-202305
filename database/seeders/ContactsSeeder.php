<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBファサード


class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // モデル名は単数系
        // テーブル名は複数形
        // Laravel側で判断して、モデルとマイグレーションを紐づける
        DB::table('contacts')->insert([
            [
                'name' => '青木',
                'email' => 'test@test.com',
                'gender' => 0,
                'age' => 20,
                'message' => 'テスト1',
            ],
            [
                'name' => '三苫',
                'email' => 'test2@test.com',
                'gender' => 0,
                'age' => 25,
                'message' => 'がんばってね',
            ],
            [
                'name' => 'Aimer',
                'email' => 'test3@test.com',
                'gender' => 1,
                'age' => 28,
                'message' => '歌うまい',
            ],
        ]);
    }
}
