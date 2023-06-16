<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; // モデルを読み込む

class SaleController extends Controller
{
    public function trainingA()
    {
        // 1. Saleテーブルからidが10のレコードを取得する。
        $no1 = Sale::find(10);
        
        // 2. Saleテーブルからpriceが10000以上のレコードをすべて取得する。
        $no2 = Sale::where('price', '>=', 10000)->get();
        
        // 3. Saleテーブルから最新の10件のレコードを取得する。
        $no3 = Sale::orderBy('created_at', 'desc')->limit(10)->get();
        
        // 4. Saleテーブルからカテゴリーidが1の商品の総売り上げを計算する。
        $no4 = Sale::where('category_id', 1)->sum('price');
        
        // 5. Saleテーブルからカテゴリーidが1の商品の平均価格を計算する。
        $no5 = Sale::where('category_id', 1)->average('price');

        dd($no1, $no2, $no3, $no4, $no5);   

    }

    public function trainingB()
    {
        // 6. Saleテーブルから最も高価な商品を探す。
        $no6 = Sale::orderBy('price', 'desc')->first();        
        
        // 7. Saleテーブルから、カテゴリーidが1の商品の中で最も売れている商品を探す。
        $no7 = Sale::where('category_id', 1)->orderBy('amount', 'desc')->first();
        
        // 8. カテゴリーidが3の中で最も高価な商品を見つけてください。 
        $no8 = Sale::where('category_id', 3)->orderBy('price', 'desc')->first();

        // 9. Saleテーブルの全データをpriceの高い順で並べ替え、TOP10の商品を取得してください。
        $no9 = Sale::orderBy('price', 'desc')->limit(10)->get();

        // 10. カテゴリ毎の商品数を計算してください
        $no10 = Sale::groupBy('category_id')->selectRaw('sum(amount)')->get();

        dd($no6, $no7, $no8, $no9, $no10);        

    }

    public function trainingC()
    {
        // 11. カテゴリ毎の平均売上を計算してください。
        $no11 = Sale::groupBy('category_id')
        ->selectRaw('category_id, avg(price)')
        ->orderBy('category_id', 'asc')->get();
        
        // 12. 2023年に販売された商品の中で最も売れた商品を見つけてください。
        $no12 = Sale::whereYear('created_at', date('Y'))->orderBy('amount', 'desc')->first();
        
        // 13. 年別の最高売上商品を取得してください。
        $no13 = Sale::selectRaw('year(created_at) as year, max(price * amount) as max_amount')
        ->groupBy('year')
        ->orderBy('year', 'asc')->get();
        
        // 14. Saleテーブルから、今年売られた商品の総売上を計算する。
        $no14 = Sale::whereYear('created_at', date('Y'))->sum('price');

        // 15. 2020年12月の売上を取得してください。
        $no15 = Sale::selectRaw('extract(year_month from created_at) as yearMonth')
        ->groupBy('yearMonth')
        ->having('yearMonth', '202012')
        ->selectRaw('sum(price * amount)')
        ->get();
        
        dd($no11, $no12, $no13, $no14, $no15);

    }

    public function trainingD()
    {
        //16. 最も売上金額が多かった日を検索し、売上順に30件表示してください
        $no16 = Sale::orderBy('price', 'desc')
        ->limit(30)
        ->select('name', 'price', 'created_at')
        ->get();

        //17. 2020年の売上額と売上数を表示してください。
        $no17 = Sale::selectRaw('extract(year from created_at) as year')
        ->groupBy('year')
        ->having('year', 2020)
        ->selectRaw('sum(price * amount), sum(amount)')
        ->get();

        //18. 2021年の売上金額、売上数をカテゴリー毎に表示してください。(売上 金額の多い順)
        $no18 = Sale::selectRaw('extract(year from created_at) as year')
        ->groupBy('year')
        ->groupBy('category_id')
        ->having('year', 2021)
        ->selectRaw('category_id, sum(price * amount), sum(amount)')
        ->orderBy('category_id')
        ->get();

        // 19. 2022年の月ごとの売上額と売上数を表示してください。 
        $no19 = Sale::selectRaw('extract(year_month from created_at) as yearMonth')
        ->whereYear('created_at', 2022)
        ->groupBy('yearMonth')
        ->selectRaw('sum(price * amount), sum(amount)')
        ->orderBy('yearMonth', 'asc')
        ->get();

        // 20. 2019年に最も売れたカテゴリーを表示してください。(金額も表示)
        $no20 = Sale::selectRaw('extract(year from created_at) as year')
        ->whereYear('created_at', 2019)
        ->groupBy('year')
        ->groupBy('category_id')
        ->selectRaw('category_id, sum(price * amount) as total, sum(amount)')
        ->orderBy('total', 'desc')
        ->get();

        dd($no16, $no17, $no18, $no19, $no20 );        
    }

    public function collectionA(){
        // DBから情報を取得
        // get()で確定
        // コレクション型 (配列を拡張)
        $collection = Sale::select('id', 'name', 
        'category_id','price', 'amount', 'created_at')
        ->limit(10)
        ->get();

        // 確定した状態からさらに加工する事がたまにある
        // その練習
        
        // 1. amountの合計
        $no1 = $collection->sum('amount');

        // 2. 最大価格を取得
        $no2 = $collection->max('price');

        // 3. amountが10以下の数をカウント
        $no3 = $collection->where('amount', '<=', 10); 

        // 4. カテゴリ毎にカウント
        $no4 = $collection->countBy('category_id');

        // 5. ランダムに並び替え
        $no5 = $collection->shuffle();

        // 6. 新着順にソート
        $no6 = $collection->sortByDesc('created_at');
        
        // 7. priceの平均価格
        $no7 = $collection->average('price');
        
        // 8. 配列に変換
        $no8 = $collection->toArray();

        // 9. JSONに変換
        $no9 = $collection->toJson();

        // 10. ユニークなカテゴリーidを取得
        $no10 = $collection->unique('category_id');
        
        dd($no1, $no2,$no3,$no4,$no5,
        $no6, $no7, $no8, $no9, $no10);
    }

    public function collectionB(){
        $collection = Sale::select('id', 'name', 
        'category_id','price', 'amount', 'created_at')
        ->limit(10)->get();

        // 11. 5個ずつ分割
        $no11 = $collection->chunk(5);

        // 12. 各priceを10%上げてください (mapを使う)
        // map(funcion(){}) 引数が コールバック関数(名前がない関数)

        $no12 = $collection->map(function($collect){
            return $collect->price * 1.10;
        });

        // 13. 各priceとamountを掛け算してください (mapを使う)
        $no13 = $collection->map(function($collect){
            return $collect->price * $collect->amount;
        });

        // 14. それぞれの作成日からの経過日数を計算してください (mapとdiffInDaysを使う)
        $no14 = $collection->map(function($collect){
            return now()->diffInDays($collect->created_at);
        });

        // 15. 下記の形式に変換してください。 (mapを使う
        // [
        // 'Sale ID' => 値,
        // 'Sale Name' => 値,
        // 'Total Price' => 値 ]
        $no15 = $collection->map(function($collect){
            return [
                'Sale ID' => $collect->id,
                'Sale Name' => $collect->name,
                'Total Price' => $collect->price * $collect->amount,
            ];
        });

        // 16. category_idが1のものが存在するかどうか(存在すればtrue)
        $no16 = $collection->contains('category_id', 1);
        
        // 17. created_at の列以外を表示してください
        // Eloquent/Collectionなのでexceptの挙動が違う・・
        // 急遽mapで対応
        // コレクション 2種類ある
        // Eloquent ORM からとってるコレクション
        // 普通のコレクション collect()
        $no17 = $collection->map(function ($item, $key) {
            return collect($item)->except(['created_at']);
        });

        // 18. 各category_idがいくつあるか表示してください
        $no18 = $collection->countBy('category_id');
        
        // 19. category_id に 11 が存在するか (存在しないのでfalse)
        $no19 = $collection->contains('category_id', 11);
        
        // 20. priceが 5000以上 20000以下のものを表示
        $no20 = $collection->whereBetween('price', [5000, 20000]);

        dd($no11,$no12,$no13,$no14,$no15,
        $no16, $no17, $no18, $no19, $no20);

    }


    public function index()
    {       

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
