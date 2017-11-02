<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RecipeScraperProvider extends ServiceProvider
{
    protected $defer = true;

    protected $controllers = [
        'App\Http\Controllers\AllRecipesController',
        'App\Http\Controllers\BBCGoodFoodController',
        'App\Http\Controllers\TwoPeasController'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\GuzzleHttp\Client::class, function() {
            return new \GuzzleHttp\Client([
                'base_uri' => 'https://nfact-recipes.herokuapp.com/api/',
                'headers' => [
                    'Authorization' => 'Token ' . config('services.pv_recipe_scraper.key')
                ]
            ]);
        });

        // foreach ($this->controllers as $controller) {
        //     $this->app->when($controller)
        //          ->needs(\GuzzleHttp\Client::class)
        //          ->give('PVRecipeScraper');
        // }
    }
}
