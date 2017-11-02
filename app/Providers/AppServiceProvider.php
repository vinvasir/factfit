<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Backpack\PageManager\app\Models\Page;

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

        $this->app->singleton('App\PVMicroservices\RecipeScraper', function() {
            return new \GuzzleHttp\Client([
                'base_uri' => 'https://nfact-recipes.herokuapp.com/api/allrecipes/',
                'headers' => [
                    'Authorization' => 'Token ' . config('services.pv_recipe_scraper.key')
                ]
            ]);
        });        
    }
}
