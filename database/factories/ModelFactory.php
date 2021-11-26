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

$factory->define(App\Widget::class, function ($faker) {

    $name = $faker->unique()->word . ' ' . $faker->unique()->word;
    $slug = str_slug($name, "-");
    $user_id = rand(1,4);

    return [
        'name' => $name,
        'slug' => $slug,
        'user_id' => $user_id,


    ];
});

$factory->define(App\Message::class, function ($faker) {

    $message = $faker->unique()->word . ' ' . $faker->unique()->word;

    return [
        'message' => $message,
        'user_id' => 1


    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [

        'name' => $faker->unique()->word,

    ];

});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    return [

        'name' => $faker->unique()->word,
        'category_id' => $faker->numberBetween($min = 1, $max = 4),

    ];

});
