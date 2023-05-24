<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // 本来はバリデーション必要です。
        
        Book::create([
            'title' => $request->title,
            'price' => $request->price        
        ]);
       
        // フラッシュメッセージ
        return to_route('books.index')
        ->with('flash_message', '保存しました');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);   
        return view('books.show', compact('book'));

    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->price = $request->price;
        $book->save();
        
        return to_route('books.index')
        ->with('flash_message', '更新しました');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return to_route('books.index')
        ->with('flash_message', '削除しました');
    }
}
