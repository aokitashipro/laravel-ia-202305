<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// DBに保存する時はpostです
// ルートは上から処理される 
Route::get('/contact_form', [ContactFormController::class, 'index'])->name('contact.index');
Route::post('/contact_form/confirm', [ContactFormController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact_form/complete', [ContactFormController::class, 'store'])->name('contact.store');
 
Route::get('/contact_form/{id}', [ContactFormController::class, 'show'])->name('contact.show');
Route::get('/contact_form/{id}/edit', [ContactFormController::class, 'edit'])->name('contact.edit');
Route::post('/contact_form/{id}', [ContactFormController::class, 'update'])->name('contact.update');
Route::post('/contact_form/{id}/delete', [ContactFormController::class, 'delete'])->name('contact.delete');


Route::get('/', function () {
    return view('welcome');
});
