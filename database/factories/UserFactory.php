<?php

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'phone'             => $faker->phoneNumber,
        'type'              => $faker->randomElement([1, 2, 3]),
        'active'              => $faker->randomElement([1, 2]),
        'email'             => $faker->unique()->safeEmail,
        'remember_token'    => Str::random(10),
        'password' => '12345678', // password
        
    ];
});
