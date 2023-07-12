<?php

namespace App\Providers;

use App\Models\Page;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ViewServiceProvider::class, function ($app) {
            return new ViewServiceProvider($app);
        });
    }

    protected function sharedItems()
    {

        $sharedItems = [

        ];

        return $sharedItems;

    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share(self::sharedItems());
    }
}
