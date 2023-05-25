<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // ORM
use Illuminate\Support\Facades\DB; // DBファサード

class SampleController extends Controller
{
    public function index(){
        // ORM モデルファイル
        // ★これを使う様にしてください
        // クエリビルダ + 独自機能(リレーション、スコープ etc)
        // リレーションが使える     
        
        // all()とかfind()などは、ここで確定してる
        // 普通は all()ではとらない
        $eloquent = Contact::all(); 
        $eloquentFind = Contact::find(1);
        // dd($eloquent, $eloquentFind);

        // 他のメソッド select() は、
        // Illuminate\Database\Eloquent\Builder
        // get()かfirst()で クエリが 確定する
        $eloquentSelect = Contact::select('id', 'name');
        $where = $eloquentSelect->where('id', 1)->get();
        $array = $where->toArray();
        dd($eloquentSelect, $where, $array);

        // toArray() // Collection -> 配列に置き換える
        // toSql() // SQL文表示

        // 出力がインスタンスになってる

        // DBファサード
        // クエリビルダのみ
        // joinの仕方が違う join()と書く
        // tableを4つとか5つとかjoinし出すと、
        // subQueryとか、すごい複雑なクエリ
        $queryBuilderGet = DB::table('contacts')->get(); 
        // Collection


        // phpの配列 array_push, array_merge

        $queryBuilderFirst = DB::table('contacts')->first(); 
        // Collectionの中の1つ

        $collection = collect(['aaa', 'bbb']);
        // collection

        // dd($eloquent, $queryBuilderGet, 
        // $queryBuilderFirst, $collection);           
    }   

}
