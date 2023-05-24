<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // モデルファイル Eloquent ORM phpでdb操作

class ContactFormController extends Controller
{
    public function index(){
        // 変数(複数形)
        // モデル
        $contacts = Contact::all();
        // dd($contacts);

        // 変数をcontroller->viewに渡す compact()
        return view('contact_form.index', compact('contacts'));
    }

    public function confirm(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:20']
        ]);
        // dd($request);

        return view('contact_form.confirm', compact('request'));
    }

    public function store(Request $request){
        //本来はバリデーション
        // dd($request);

        // DB保存処理
        // インスタンス化するパターン
        // phpだったら
        // ステートメント、bindValue, placeholderなどがいった
        // ORM使うとこれだけになる
        // 裏側でPDO動いてるけどきにしないでok
        $contact = new Contact;
        // インスタンスのプロパティ(変数) = フォームから渡ってきている情報
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->gender = $request->gender;
        $contact->age = $request->age;
        $contact->message = $request->message;
        // 保存 save()
        $contact->save();

        // 保存の後はredirectかけないとうまく表示されない
        return redirect('contact_form'); // ContactForm
    }

    public function show($id){

        // $id でidが1番なら1という数字が入ってる
        // DBから情報を取りたい
        // 1件の情報だから 単数系で書く
        // find()かfindOrFail()
        // select * from contacts where id = x;
        $contact = Contact::find($id);
        // dd($contact);

        return view('contact_form.show', compact('contact'));

    }

    public function edit($id){
        $contact = Contact::find($id);
        return view('contact_form.edit', compact('contact'));
    }

    // 更新は引数2つ formの値と,ルートパラメータ
    public function update(Request $request, $id){
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->gender = $request->gender;
        $contact->age = $request->age;
        $contact->message = $request->message;
        $contact->save();

        // 保存の後はredirectかけないとうまく表示されない
        // フラッシュメッセージ (1回だけ表示する機能「更新しました」)
        return redirect('contact_form'); // ContactForm

    }

    public function delete($id){
        $contact = Contact::find($id);
        // これだけで消える
        // 本来は 消してもいいですか？的な
        // メッセージをださないと
        // 誤操作がありえる。
        // JSでアラート出すとか
        $contact->delete();

        return redirect('contact_form'); // ContactForm
    }

}
