<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; // モデルを読み込む

class SaleController extends Controller
{
    public function index()
    {
        //1. 最も売上金額が多かった日を検索し、売上順に30件表示してください
        $no1 = Sale::orderBy('price', 'desc')
        ->limit(30)
        ->select('name', 'price', 'created_at')
        ->get();

        //2. 2020年の売上額と売上数を表示してください。
        $no2 = Sale::selectRaw('date_format(created_at, "%Y") as year')
        ->groupBy('year')
        ->having('year', 2020)
        ->selectRaw('sum(price), sum(amount)')
        ->get();

        //3. 2021年の売上金額、売上数をカテゴリー毎に表示してください。(売上 金額の多い順)

        // 4. 2022年の月ごとの売上額と売上数を表示してください。 

        // 5. 2019年に最も売れたカテゴリーを表示してください。(金額も表示)

        dd($no1, $no2);


        // all か find なら クエリ確定してデータ取得
        // Eloquent・・ORM
        // Collection・・配列を拡張
        // Illuminate\Database\Eloquent\Collection
        // 1000件なら1000件のインスタンス
        //$sales = Sale::all();

        // App\Models\Sale (1件のインスタンス)
        //$saleFind = Sale::find(1);

        // selectなどのクエリは
        // getをしないと確定しない
        // クエリビルダの途中
        // Illuminate\Database\Eloquent\Builder
        //$salesSelect = Sale::select('id');

        // getをつけると確定
        // Illuminate\Database\Eloquent\Collection
        // 1000件
        //$salesSelectGet = Sale::select('id')->get();

        // getをつけると確定
        // Illuminate\Database\Eloquent\Collection
        // 9件
        // $salesSelectWhere = Sale::select('id')
        //     ->where('id', '<', 10)
        //     ->get();

        // ORMで情報を取得中 getする前 クエリビルダ
        // get後 コレクション

        // dd($sales, $saleFind, $salesSelect, 
        // $salesSelectGet, $salesSelectWhere);
    }
}
