<?php

namespace App\Providers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\MovieType;
use App\Models\Production;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['movies.movie-create', 'movies.movie-edit'], function(ViewView $view){
            $view->with([
                'types' => MovieType::all(),
                'directors' => Director::all(),
                'productions' => Production::all(),
                'males' => Actor::where('gender','Male')->get(),
                'females' => Actor::where('gender','Female')->get(),
                'genres' => Genre::all(),
            ]);
        });


        Paginator::useBootstrap();
    }
}
