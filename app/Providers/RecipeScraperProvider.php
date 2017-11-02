<?php

namespace App\Providers;

use App\Http\Controllers\AllRecipesController;
use Illuminate\Support\ServiceProvider;

class RecipeScraperProvider extends ServiceProvider
{
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
