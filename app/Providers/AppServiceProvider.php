<?php

namespace App\Providers;

use App\Otdel;
use App\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        DB::listen(function ($query){
            //dump($query->sql);
            //dump($query->bindings);
        });

        view()->composer('*', function ($view){
            //$view->with('otdels', Otdel::all()->sortBy('sort'));
            //$view->with('pages', Page::all()->sortBy('sort'));
        });
    }
}
