<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

        /* teams テーブル(Teamモデル) とのリレーション設定 */
        public function team()
        {
            /* players テーブル自身が持っている外部キー team_id で関連付けする
             * $this->belongsTo(<連携先クラス名>::class)
             */
            return $this->belongsTo(Team::class);
        }
    
        /* ↓以下の内容を追加↓ */
        /* positions テーブル(Positionモデル)とのリレーション設定 */
        public function positions()
        {
            /* 中間テーブル(player_position テーブル)が持っているレコード で関連付けする
             * $this->belongsTo(<連携先クラス名>::class)
             */
            return $this->belongsToMany(Position::class);
        }

}
