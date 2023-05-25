<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cafes = Cafe::select('id', 'name', 'is_visible')
        ->where('is_visible', true)
        ->get();

        return view('cafes.index', compact('cafes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cafes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'prefecture' => ['required'],
            'address' => ['required', 'max:100'],
            'review' => ['required', 'numeric', 'between:1,5', 'decimal:0,1'],
            'is_visible' => ['required', 'boolean'],
        ]);

        Cafe::create([
            'name' => $request->name,
            'prefecture' => $request->prefecture,
            'address' => $request->address,
            'review' => $request->review,
            'is_visible' => $request->is_visible,
        ]);
       
        // フラッシュメッセージ
        return to_route('cafes.index')
        ->with('flash_message', '保存しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cafe = Cafe::findOrFail($id);
        return view('cafes.show', compact('cafe'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cafe = Cafe::findOrFail($id);
        return view('cafes.edit', compact('cafe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'prefecture' => ['required'],
            'address' => ['required', 'max:100'],
            'review' => ['required', 'numeric', 'between:1,5', 'decimal:0,1'],
            'is_visible' => ['required', 'boolean'],
        ]);
        
        $cafe = Cafe::findOrFail($id);
        $cafe->name = $request->name;
        $cafe->prefecture = $request->prefecture;
        $cafe->address = $request->address;
        $cafe->review = $request->review;
        $cafe->is_visible = $request->is_visible;
        $cafe->save();

        // フラッシュメッセージ
        return to_route('cafes.index')
        ->with('flash_message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
