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
        'editable' => rand(0, 1),
        'good_food_count' => rand(0, 15),
        'bad_food_count' => rand(0, 15),
        'exercise_minutes_count' => rand(0, 120),
        'good_health_events_count' => rand(0, 10),
        'bad_health_events_count' => rand(0, 10)
    ];
});

$factory->define(App\Food::class, function (Faker\Generator $faker) {
    return [
        'day_id' => function() {
            return factory('App\Day')->create()->id;
        },
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'processed' => rand(0, 1),
        'type' => rand(0, 5),
        'meal' => rand(0, 3)
    ];
});