<?php

use Faker\Generator as Faker;
$faker_ar = \Faker\Factory::create('ar_SA');
$faker_ar->addProvider(new \Faker\Provider\Lorem($faker_ar));
$users = \App\User::has('orders', '>', '0')->pluck('id');
$products = \App\Models\Product::has('order_items', '>', 0)->pluck('id');
$orders = \App\Models\Order::has('order_items', '>', 0)->pluck('id');
$factory->define(\App\ProductRating::class, function (Faker $faker) use (
    $users,
    $products,
    $faker_ar
) {
    $faker->addProvider(new \Faker\Provider\Lorem($faker));

    $value = rand(1, 5);
    return [
        //
        'user_id' => $faker->randomElement($users),
        'product_id' => $faker->randomElement($products),
        'random_id' => $faker->randomElement($products),
        'message' => $faker_ar->realText(rand(100, 500)),
        'value' => $value
    ];
});
