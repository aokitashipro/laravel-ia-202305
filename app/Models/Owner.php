<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// 認証機能を継承
class Owner extends Authenticatable
{
    use HasFactory;

    // create()で登録できるように書いておく
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
