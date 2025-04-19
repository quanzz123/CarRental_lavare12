<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Chỉ dùng IDE Helper trong môi trường không phải production
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $view->with('cart', $cart);
        });
    }
}
