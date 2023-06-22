<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use App\Mail\TestMail; // メールのクラス(Mailable)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // メール送信用
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SkillStoreRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Jobs\SendMailJob; // ジョブを読み込む

class SkillController extends Controller
{
    public function index()
    {

        // 同期 宛先、Mailableクラスを送信
        // Mail::to('test@gmail.com')->send(new TestMail());

        // 非同期 Job を使ってメール送信
        SendMailJob::dispatch();


        $user = User::find(Auth::id());

        // paginationを使うには
        // get()の箇所を paginate() に変える
        // 件数を指定する
        $skills = Skill::select('id', 'name')->paginate(3);

        return view('skills.index', compact('user', 'skills'));
    }
    public function edit($id)
    {
        $user = User::find(Auth::id());
        $skill = Skill::find($id);

        return view('skills.edit', compact('user', 'skill'));
    }
    public function update(SkillUpdateRequest $request, $id)
    {
        // dd($request, $id);
        $user = User::find(Auth::id());
        $user->skills()->attach($id, ['score' => $request->score ]);

        return to_route('skills.index');
    }
    public function showSkillsAll()
    {
        $users = User::all();
        return view('skills.skills-all', compact('users'));
    }
    public function create()
    {
        return view('skills.create');
    }
    public function store(SkillStoreRequest $request )
    {
        Skill::create([
            'name' => $request->name
        ]);

        return to_route('skills.index');
    }

    // スキル値 設定してなければ0表示
    public function zeroIndex()
    {
        $user = User::find(Auth::id());
        $skills = Skill::all();
        
        // ググりまくってどうにか・・
        $userSkill = $user->skills->groupBy(function($item, $key){
            return $item->pivot->skill_id;
        })->map(function($item, $key){
            return $item->max('pivot.score');
        })->toArray();
        
        return view('skills.zeroIndex', 
        compact('user', 'skills', 'userSkill'));
    }

    public function zeroEdit($id)
    {
        $skill = Skill::find($id);

        return view('skills.zeroEdit', compact('skill'));
    }

    public function zeroUpdate(SkillUpdateRequest $request, $id)
    {
        $user = User::find(Auth::id());

        // ここは要検証
        $user->skills()->syncWithoutDetaching([ $id => ['score' => $request->score]]);
        return to_route('skills.zeroIndex');
    }
}
