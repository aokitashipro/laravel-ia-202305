<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\PurchaseHistory;
use App\Models\PointHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Const\Item as ItemConst; // 別名 as
use App\Http\Requests\ItemPurchaseRequest;
use Illuminate\Support\Facades\Log;

class ManyToManyTestController extends Controller
{
    public function index(){
        // Authファサード使うと
        // ログインしてる人のidを取れる
        $user = User::find(Auth::id());
        $items = Item::all();

        Log::debug('テスト');
        Log::info('form情報', [ 'user_id' => $user->id ]);

        return view('items.index', compact('user', 'items'));
    }

    public function purchase(){
        $user = User::find(Auth::id());
        $items = Item::all();
        return view('items.purchase', compact('user', 'items'));
    }

    public function store(ItemPurchaseRequest $request)
    {
        // dd($request);

        DB::beginTransaction();
        try {
            // 4つのテーブルに処理
            // 1. purchaseHistory
            // 中間テーブルに追加するにはattach()
            // attach('相手のid', [中間テーブルに保存したい他の情報])
            $user = User::find(Auth::id());
            $user->items()->attach($request->item_id, [
                'price' => Item::find($request->item_id)->price,
                'amount' => $request->amount
            ]);

            // 2. Item 在庫減らす
            $item = Item::find($request->item_id);
            $item->current_stock -= $request->amount;
            $item->save();

              // ポイント使用が0でなかったら
              if($request->point !== "0")
              {
                // 3. ポイント履歴更新
                PointHistory::create([
                    'user_id' => $user->id,
                    'purchase_history_id' => PurchaseHistory::latest()->first()->id,
                    'amount' => -($request->amount),
                    'reason' => ItemConst::REASON['BUY_ITEM'], // 1だと意味がわからない 定数にすれば意味がわかる
                ]);


                // 4. User の今のポイントを再計算して保存
                 //pointHistoryに入っているポイント数を計算
                 $latestTotalPoint = PointHistory::where('user_id', Auth::id())
                 ->sum('amount');
 
                 // Userに保存
                $user->total_point = $latestTotalPoint;
                $user->save();                

              }
  
            DB::commit();

            return redirect('items');

        } catch(Exception $exception){
            DB::rollback();
        }
    }

    public function purchaseHistory(){
        $user = User::find(Auth::id());
        return view('items.purchaseHistory', compact('user'));
    }

    public function pointHistory(){
        $user = User::find(Auth::id());
        return view('items.pointHistory', compact('user'));
    }



}
