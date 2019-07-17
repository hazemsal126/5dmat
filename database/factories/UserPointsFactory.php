<?php

use Faker\Generator as Faker;
$orders = \App\Models\Order::has('order_items', '>', 0)->pluck('id');

$factory->define(\App\UserPoint::class, function (Faker $faker) use ($orders) {
    $the_order = \App\Models\Order::with("order_items.product")->find(
        $faker->randomElement($orders)
    );
    $order_item = $faker->randomElement($the_order->order_items);
    return [
        //
        "order_id" => $the_order->id,
        "user_id" => $the_order->user_id,
        "product_id" => $order_item->product->id,
        "amount" => $order_item->product->points
    ];
});
