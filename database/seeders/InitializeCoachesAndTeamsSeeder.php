<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InitializeCoachesAndTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* coaches テーブルに、監督のデータを追加する */
        DB::table('coaches')->insert(
            [
                ['name' => '監督さん１'],
                ['name' => '監督さん２'],
                ['name' => '監督さん３'],
            ]
        );

        /* teams テーブルに、チームのデータを追加する */
        DB::table('teams')->insert(
            [
                ['name' => 'チームA', 'coach_id' => 1],
                ['name' => 'チームB', 'coach_id' => 2],
                ['name' => 'チームC', 'coach_id' => 3],

                /* チームD, チームEはcoachテーブルとの関連付けをしない(外部キーcoach_id をnullにしておく) */
                ['name' => 'チームD', 'coach_id' => null],
                ['name' => 'チームE', 'coach_id' => null],
            ]
        );
        
    }
}
