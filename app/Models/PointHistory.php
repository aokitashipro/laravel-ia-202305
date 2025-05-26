<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    use HasFactory;

    // テーブル名指定
    protected $table = 'point_history';

    protected $fillable = [
        'user_id',
        'purchase_history_id',
        'amount',
        'reason'
    ];
}
