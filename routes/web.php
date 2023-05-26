<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\FurnitureController;
use App\Models\Coach;
use App\Models\Team;


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
    Route::resource('furnitures', FurnitureController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/coach', function(){
    /* Coach モデルを通じて、coaches テーブルの内容をすべて取得 */
    $all_coaches = Coach::all();
    foreach($all_coaches as $coach){
        /* $coach->teamで、関連付けされたteams テーブルのレコードの内容を取得できる */
        print("<p>監督名： {$coach->name} (担当チーム名： {$coach->team->name})</p>");
    }
});


Route::get('/team', function(){
    /* Team モデルを通じて、teams テーブルのデータをすべて取得 */
    $all_teams = Team::all();
    // dd($all_teams); 複数のinstance Teamのinstance (複数)

    foreach($all_teams as $team){
        /* $team->playersで、関連付けされたteams テーブルのレコードの内容を取得できる */
        print("<h2>チーム名： {$team->name}</h2>");
        print("<p>所属プレイヤー</p>");
        print('<ul>');
            /* Team モデルとPlayer モデルのリレーションは一対多(hasMany)
             * 複数データが取得されるため、foreachでループしてひとつずつ処理する
             */
            // dd($team); teamのinstance １つ
            // dd($team->players); // Playeのinstance(複数)
            foreach($team->players as $player) {
                // dd($player); // Playerのinstance(1つ)
                print("<li>{$player->name}</li>");
            }
        print('</ul>');
    }
});




