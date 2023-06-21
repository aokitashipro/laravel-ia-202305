<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('owner.dashboard');
})->middleware(['auth:owners', 'verified'])->name('dashboard');

// ログイン関係のルート設定ファイル
// auth.php ・・ユーザー向けの認証関係ファイル
// ownerAuth.php ・・オーナー向けの認証関係ファイル
require __DIR__.'/ownerAuth.php';

