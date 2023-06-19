<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'total_point', // 追記
        'role', // 追記
    ];

   	// 1対多の場合は相手のモデルを指定
	public function pointHistory(){
        return $this->hasMany(PointHistory::class);
    }

    // 多対多の場合は(中間テーブルではなく)相手のモデルを指定
    public function items(){
        return $this->belongsToMany(Item::class, 'purchase_history')
        ->withPivot('price', 'amount', 'created_at');
    }




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
