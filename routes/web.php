<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\MessageBoardController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ManyToManyTestController;
use App\Http\Controllers\SkillController;
use App\Models\Coach;
use App\Models\Team;
use App\Models\Player;

// ログインしてたら表示できる
// middleware('auth')
// ガード設定したので
// ユーザーとしてログインしてたら見れる
// middleware('auth:ガード名')
// middleware('auth:users')
Route::middleware('auth:users')->prefix('skills')
->name('skills.')->group(function () {
    Route::get('/', [SkillController::class, 'index'])->name('index');
    Route::get('/{id}/edit', [SkillController::class, 'edit'])->name('edit');    
    Route::post('/{id}', [SkillController::class, 'update'])->name('update');
    // スキル持ってなければ0表示
    Route::get('/zero-index', [SkillController::class, 'zeroIndex'])->name('zeroIndex');
    Route::get('/{id}/zero-edit', [SkillController::class, 'zeroEdit'])->name('zeroEdit');
    Route::post('/{id}/zero-update', [SkillController::class, 'zeroUpdate'])->name('zeroUpdate');
});

Route::middleware(['auth:users', 'can:manager'])
->prefix('skills')->name('skills.')->group(function () {
    Route::get('/skills-all', [SkillController::class, 'showSkillsAll'])->name('skillsAll');
    Route::get('/create', [SkillController::class, 'create'])->name('create');
    Route::post('/', [SkillController::class, 'store'])->name('store');
});


Route::middleware('auth:users')->prefix('items')
->name('items.')->group(function () {
    Route::get('/', [ManyToManyTestController::class, 'index'])->name('index');
    Route::get('/purchase', [ManyToManyTestController::class, 'purchase'])->name('purchase');    
    Route::post('/', [ManyToManyTestController::class, 'store'])->name('store');
    Route::get('/purchase-history', [ManyToManyTestController::class, 'purchaseHistory'])->name('purchaseHistory');
    Route::get('/point-history', [ManyToManyTestController::class, 'pointHistory'])->name('pointHistory');
});

Route::middleware(['auth:user', 'can:paid-user'])->get('items/paid', function(){
    return '有料ユーザーだけ見えるよ';
});


Route::get('/sale-training', [SaleController::class, 'index']);
Route::get('/sale-trainingA', [SaleController::class, 'trainingA']);
Route::get('/sale-trainingB', [SaleController::class, 'trainingB']);
Route::get('/sale-trainingC', [SaleController::class, 'trainingC']);
Route::get('/sale-trainingD', [SaleController::class, 'trainingD']);

Route::get('/sale-collectionA', [SaleController::class, 'collectionA']);
Route::get('/sale-collectionB', [SaleController::class, 'collectionB']);

Route::get('/sale-relation', [SaleController::class, 'relation']);


Route::get('/sample', [SampleController::class, 'index'])->name('sample.index');

Route::resource('messages', MessageBoardController::class);

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
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
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


Route::get('/team-to-coach', function(){
    /* Team モデルを通じて、teams テーブルのデータをすべて取得 */
    $all_teams = Team::all();
    foreach($all_teams as $team){
        /* nullの場合があるので、ifでチェック */
        if ($team->coach != null){
            $coach = $team->coach->name; // Teamから belongsToで coachに繋いでる
        } else {
            $coach = '';
        }
        print("<h2>チーム名： {$team->name} (監督：{$coach}) </h2>");
        print("<p>所属プレイヤー</p>");
        print('<ul>');
            /* $team->playersで、関連付けされたteams テーブルのレコードの内容を取得できる
             * Team モデルとPlayer モデルのリレーションは一対多(hasMany)
             * 複数データが取得されるため、foreachでループしてひとつずつ処理する
             */
            foreach($team->players as $player) {
                print("<li>{$player->name}</li>");
            }
        print('</ul>');
    }
});


// 多対多
Route::get('player', function(){
    /* Player モデルを通じて、players テーブルのデータをすべて取得 */
    $all_players = Player::all();
    foreach($all_players as $player){
        /* null の場合があるので、if でチェック */
        if ($player->team != null){
            $team = $player->team->name;
        } else {
            $team = '';
        }
        print("<h2>プレイヤー名： {$player->name} (所属チーム: {$team})</h2>");
        print("<p>得意ポジション</p>");
        print('<ul>');
            /* $player->positionsで、関連付けされたpositions テーブルのレコードの内容を取得できる
            * Player モデルとPosition モデルのリレーションは多対多(belongsToMany)
            * 複数データが取得されるため、foreachでループしてひとつずつ処理する
            */
            foreach($player->positions as $position){
                print("<li>{$position->name}</li>");
            }
        print('</ul>');
    }
});



/* 画像アップロードフォームを表示するルーティング */
Route::get('upload_form', function(){
    return view('upload_form');
});

/* POST 送信された画像を受け取って保存するルーティング */
Route::post('upload_form', [UploadImageController::class, 'upload'])->name('image.store');

/* アップロードされた画像の一覧を表示するルーティング */
Route::get('upload_images', [UploadImageController::class, 'index']);




/* Storage ファサードを使ってファイルの操作をしてみる */
Route::get('storage_test', function(){
    /* タイムスタンプを含めたテキストファイル名を作成 */
    $filename = time(). '.txt';
    /* テキストファイルの内容を作成 */
    $content = "ファイル名: {$filename}";

    /* Storage::put(<ファイルパス>, <内容>) で、ファイルを作成
     * ファイル名だけ記載した場合は、操作対象のdisk の直下に作成される
     */
    Storage::put($filename, $content);

    /* Storage::files(ファイルパス) で、ファイルの一覧を取得 */
    $files = Storage::files();
    dump($files);
});


