<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 50)
            ->create()
            ->each(function ($user) {
                $numberOfOrders = rand(1, 3);
                for ($i = 0; $i < rand(1, 2); $i++) {
                    # code...
                    $numberOfItems = rand(1, 3);

                    $order = factory(App\Models\Order::class)->create([
                        'user_id' => $user->id,
                        'item_count' => $numberOfItems,
                        'total' => 0,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                    $firstProduct = 4951;
                    $lastProduct = 9951;
                    $total = 0;
                    for ($j = 0; $j < $numberOfItems; $j++) {
                        # code...
                        $product = \App\Models\Product::find(
                            rand($firstProduct, $lastProduct)
                        );
                        $total += $product->price;
                        factory(App\UserPoint::class)->create([
                            'order_id' => $order->id,
                            'product_id' => $product->id,
                            'user_id' => $user->id,
                            'amount' => $product->points
                        ]);
                        $order->order_items()->save(
                            factory(App\Models\Order_Item::class)->make([
                                'order_id' => $order->id,
                                'product_id' => $product->id,
                                'count' => 1,
                                'price' => $product->price,
                                'total_price' => $product->price
                            ])
                        );
                    }
                    $order->total = $total;
                    $order->save();
                }
            });
    }
}
