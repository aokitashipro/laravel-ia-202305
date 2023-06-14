<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DatabaseSeederの中で
        // それぞれのシーダーファイルを読み出す
        $this->call([
            UserSeeder::class,
            CafeSeeder::class,
            ContactsSeeder::class,
            BookSeeder::class,
            MessageBoardSeeder::class,
            InitializeCoachesAndTeamsSeeder::class,
            InitializePlayersTableSeeder::class,
            // 各テーブルのダミー入れてから
            // 中間テーブルのダミー
            InitializePositionsTableSeeder::class,
            InitializePlayerPositionTableSeeder::class
        ]);

        \App\Models\Furniture::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
