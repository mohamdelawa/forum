<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\user;

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

$factory->define(user::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'dob' => $faker->date(),
        'phone' =>$faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password,
        'role_id' => '2',
        'image_path' => "../../assets/images/users/1.jpg",
        'deleted_at' => null,
        'remember_token' => Str::random(10),
    ];
});
