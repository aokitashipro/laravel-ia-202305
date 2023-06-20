<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SkillStoreRequest;
use App\Http\Requests\SkillUpdateRequest;

class SkillController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());

        return view('skills.index', compact('user'));
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
