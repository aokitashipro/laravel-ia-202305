<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Const\Prefecture;

class Furniture extends Model
{
    use HasFactory;

    // 今回は全部まとめてますが
    // 個別にscopeつくる場合もよくあります
    public function scopeSearch(Builder $query, $request){
        
        // $request->prefecture;
        if($request->prefecture !== 'all'){        
        $query->where('prefecture', $request->prefecture);
        }
        // $request->order;
        if($request->order === 'latest'){        
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('review', 'desc');
        }
    
        // $request->min_price;
        // $request->max_price;
        if(!is_null($request->min_price) && !is_null($request->max_price) )
        {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        } else if (!is_null($request->min_price) && is_null($request->max_price)){
            $query->where('price', '>=', $request->min_price );
        } else if (is_null($request->min_price) && !is_null($request->max_price)){
            $query->where('price', '<=', $request->max_price );
        } else {
            $query;
        }

        $query->where('is_visible', true);
    }

}
