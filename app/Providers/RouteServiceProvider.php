<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';
    public const OWNER_HOME = 'owner/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // どのルートファイルを使うか書いてる
            // ユーザーは routes/web.phpを使ってる
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // prefix urlの頭につける
            // asは名前
            // ルートの名前空間(いらないかも)
            // bash_path(ベースのルートファイル)
            Route::middleware('web')
            ->prefix('owner')
            ->as('owner.')
            ->namespace($this->namespace)
            ->group(base_path('routes/owner.php'));

        });
    }
}
