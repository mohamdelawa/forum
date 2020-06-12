<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\comment::class, function (Faker $faker) {
    $user_id = App\user::all()->pluck('id')->toArray();
    $post_id = App\post::all()->pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($user_id),
        'post_id' => $faker->randomElement($post_id),
        'body' => $faker->text(150),

    ];
});
