<?php

namespace App\Providers;

use App\Http\Controllers\AllRecipesController;
use Backpack\PageManager\app\Models\Page;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view) {
            return $view->with('nav_links', Page::where(['template' => 'root_pages'])->get()->all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }

        $this->app->singleton('PVRecipeScraper', function() {
            return new \GuzzleHttp\Client([
                'base_uri' => 'https://nfact-recipes.herokuapp.com/api/',
                'headers' => [
                    'Authorization' => 'Token ' . config('services.pv_recipe_scraper.key')
                ]
            ]);
        });

        $this->app->when(AllRecipesController::class)
             ->needs(\GuzzleHttp\Client::class)
             ->give('PVRecipeScraper');
    }
}
