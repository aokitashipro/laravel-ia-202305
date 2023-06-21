<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // ログインしている人が
        // login/registerページ表示しようとしたら
        // リダイレクトかける (セッションの絡み)

        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        // config/auth.phpでガード設定をかけたので
        // Auth::guard('users');
        // Auth::guard('owners');


        if(Auth::guard('users')->check() && $request->routeIs('user.*')){
            return redirect(RouteServiceProvider::HOME);
          }
  
          if(Auth::guard('owners')->check() && $request->routeIs('owner.*')){
            return redirect(RouteServiceProvider::OWNER_HOME);
          }


        return $next($request);
    }
}
