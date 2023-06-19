<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'purchase_history')
        ->withPivot('price', 'amount');
    }

}
