<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'タイトル1',
                'price' => 123,
            ],
            [
                'title' => 'タイトル2',
                'price' => 234,
            ],
            [
                'title' => 'タイトル3',
                'price' => 345,
            ]
        ]);
    }
}
