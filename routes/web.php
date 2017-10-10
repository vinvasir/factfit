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

		Route::post('/days/{day}/foods', 'FoodsController@store');

		Route::get('/days/{day}/foods/create', 'FoodsController@create');

		Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

		Route::post('/users/my-settings', 'SettingsController@store');
});

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);