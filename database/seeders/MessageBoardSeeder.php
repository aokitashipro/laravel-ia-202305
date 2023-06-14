<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBファサード

class MessageBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('message_boards')->insert([
            [
                'name' => '青木',
                'email' => 'test1@test.com',
                'contact_to' => '相手名1',
                'message' => 'テスト1',
            ],
            [
                'name' => '山田',
                'email' => 'test2@test.com',
                'contact_to' => '相手名2',
                'message' => 'テスト2',
            ],
            [
                'name' => '田中',
                'email' => 'test2@test.com',
                'contact_to' => '相手名3',
                'message' => 'テスト3',
            ],

        ]);
    }
}
