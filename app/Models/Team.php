<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /* players テーブル(Playerモデル)とのリレーション設定 */
    public function players(){
        /* player テーブルに設定した team_id で関連付けする
            * $this->hasMany(<連携先クラス名>::class)
            */
        return $this->hasMany(Player::class);
    }

    public function coach(){
        /* teams テーブル自身が持っている外部キー coach_id で関連付けする
         * $this->belongsTo(<連携先クラス名>::class)
         */
        return $this->belongsTo(Coach::class);
    }

}
