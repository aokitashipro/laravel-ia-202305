<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    /* teams テーブル(Teamモデル)とのリレーション設定 */
    public function team(){
        /* teams テーブルに設定した coach_id で関連付けする
            * $this->hasOne(<連携先クラス名>::class)
            */
        return $this->hasOne(Team::class);
    }

}
