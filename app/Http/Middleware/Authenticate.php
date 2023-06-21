<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // こっちはコメントアウト
        // return $request->expectsJson() ? null : route('login');

        // やりたい事
        // urlが owner.*** で、ログインしてなかったら
        // owner.login ページにリダイレクト
        // urlに ownerがなければ loginにリダイレクト

        if (! $request->expectsJson()) {
            if(Route::is('owner.*')){
                return route('owner.login');
            } else {
                return route('login');
            }
        }




    }
}
