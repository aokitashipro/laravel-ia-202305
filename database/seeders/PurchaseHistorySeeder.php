<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PurchaseHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchase_history')->insert([
            [
                'user_id' => 1,
                'item_id' => 1,
                'price' => 100,
                'amount' => 5,
                'created_at' => now()
            ],
            [
                'user_id' => 1,
                'item_id' => 2,
                'price' => 80,
                'amount' => 2,
                'created_at' => now()
            ],
            [
                'user_id' => 2,
                'item_id' => 1,
                'price' => 100,
                'amount' => 5,
                'created_at' => now()
            ],
        ]);

        DB::table('point_history')->insert([
            [
                'user_id' => 1,
                'amount' => 100,
                'reason' => 0,
                'purchase_history_id' => null,
                'created_at' => now()
             ],
            [
                'user_id' => 1,
                'amount' => -10,
                'reason' => 1,
                'purchase_history_id' => 1,
                'created_at' => now()
                ],
        ]);




    }
}
