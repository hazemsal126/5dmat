<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\ar_SA\Person($faker));
    $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));

    $faker->addProvider(new \Faker\Provider\Miscellaneous($faker));

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->phoneNumber,
        'mobileCountry' => '966',
        'password' => Hash::make($faker->realText(10)), // secret
        'remember_token' => str_random(10)
    ];
});
