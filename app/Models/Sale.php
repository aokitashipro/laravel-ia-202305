<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Sale extends Model
{
    use HasFactory;

    public function scopeLatestTenItems(Builder $query)
    {
	    $query->orderBy('created_at', 'desc')
        ->limit(10);
        return $query;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
}
