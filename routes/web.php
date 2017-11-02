<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin group
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    CRUD::resource('customer', 'Admin\CustomerCrudController');
});

// App group
Route::group(['prefix' => 'app', 'middleware' => 'auth'], function() {
		Route::get('/days', 'DaysController@index');
		Route::post('/days', 'DaysController@store');

		Route::get('/days/create', 'DaysController@create');

		Route::get('/days/{day}', 'DaysController@show');

		Route::get('/days/{day}/foods', 'FoodsController@index');
		Route::post('/days/{day}/foods', 'FoodsController@store');

		Route::get('/days/{day}/foods/create', 'FoodsController@create');

		Route::get('/profiles', 'ProfilesController@index')->name('profiles');
		Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
		Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->name('edit_profile');
		Route::post('/profiles/{user}', 'ProfilesController@update')->name('update_profile');

		Route::get('/profiles/{user}/notifications', 'ProfilesController@notifications');
		Route::delete('/profiles/{user}/notifications/{notificationId}', 'ProfilesController@destroyNotification');

		Route::post('/users/my-settings', 'SettingsController@store');

		Route::post('/friendships/{user}', 'FriendshipsController@store');
		Route::get('/friendships/{user}/accept', 'FriendshipsController@confirmation');
		Route::post('/friendships/{user}/accept', 'FriendshipsController@accept');

		Route::get('/recipes-api/allrecipes/{slug}', 'AllRecipesController@show');
		Route::get('/recipes-api/bbcgoodfood/{slug}', 'BBCGoodFoodController@show');
		Route::get('/recipes-api/twopeasandtheirpod/{slug}', 'TwoPeasController@show');
});

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);