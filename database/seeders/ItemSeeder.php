<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'ボールペン',
                'price' => 100,
                'current_stock' => 50
            ],
            [
                'name' => '消しゴム',
                'price' => 80,
                'current_stock' => 20
            ]]);
    }
}
