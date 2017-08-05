<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Day::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->date,
        'user_id' => function() {
        	return factory('App\User')->create()->id;
        },
        'editable' => $faker->boolean,
        'good_food_count' => $faker->integer,
        'bad_food_count' => $faker->integer,
        'exercise_minutes_count' => $faker->integer,
        'good_health_events_count' => $faker->integer,
        'bad_health_events_count' => $faker->integer
    ];
});