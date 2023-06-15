<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadImage;
/* Laravelの拡張クラス Str を読み込み */
use Illuminate\Support\Str;

class UploadImageController extends Controller
{
    /* 画像の一覧画面を表示する */
    public function index(Request $request)
    {
         /* Requestに送信された検索キーワードを変数に保持 */
         $keyword = $request->input('keyword');

         /* 検索キーワードが入力されている場合、表示するデータを絞り込む */
        if (Str::length($keyword) > 0) { // Str::length(<文字列>) で、文字列の長さを取得できる
            $upload_images = UploadImage::where('filename', 'LIKE', "%$keyword%") // ファイル名にkeyword を含むものを絞り込み
                ->orWhere('memo', 'LIKE', "%$keyword%") // 備考にkeyword を含むものを絞り込み
                ->get();
        } else {
            /* 検索キーワードが入力されていない場合は、全件取得する */
            $upload_images = UploadImage::all();
        }
        
        return view('upload_images', 
        compact('upload_images', 'keyword'));
    }
    

    
    public function upload(Request $request)
    {
        /* バリデーション */
        $request->validate([
            'image' => 'required|max:1024|mimes:jpg,jpeg,png,gif'
        ]);

        /* store('保存先ディレクトリ', 'ディスク') メソッドで、ファイルをstorage/public/images ディレクトリに保存する
         * ファイル名はランダム文字列になり、store()の返り値として取得できる
         * 第2引数は、config/filesystems.php で設定したdisks 配列のキーから指定する
         */
        // storageフォルダに画像を保存
        $file_path = $request->image->store('images', 'public');

        // 画像の情報はDBに保存 (モデル経由で保存する)
        /* UploadImage オブジェクトを生成 */
        $upload_image = new UploadImage();
        // $インスタンス->プロパティ名(DBのテーブルの列名) = フォームから渡ってきてる
        $upload_image->filename = $request->image->getClientOriginalName();
        $upload_image->memo = $request->memo;
        $upload_image->filepath = $file_path;

        /* データベースにレコードを追加する */
        $upload_image->save();
        


        /* 保存した画像を表示する */
        print("<img src='". asset("$file_path"). "' width='300'>");

        print("<a href='upload_form'>画像投稿フォームに戻る</a>");
    }
}
