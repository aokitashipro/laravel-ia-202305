<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\CafeController;

Route::get('/sample', [SampleController::class, 'index'])->name('sample.index');

// DBに保存する時はpostです
// ルートは上から処理される 
Route::get('/contact_form', [ContactFormController::class, 'index'])->name('contact.index');
Route::post('/contact_form/confirm', [ContactFormController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact_form/complete', [ContactFormController::class, 'store'])->name('contact.store');
 
Route::get('/contact_form/{id}', [ContactFormController::class, 'show'])->name('contact.show');
Route::get('/contact_form/{id}/edit', [ContactFormController::class, 'edit'])->name('contact.edit');
Route::post('/contact_form/{id}', [ContactFormController::class, 'update'])->name('contact.update');
Route::post('/contact_form/{id}/delete', [ContactFormController::class, 'delete'])->name('contact.delete');

Route::resource('books', BookController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('cafes', CafeController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
