<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Product::class, 5000)->create();

        // $faker = new \Faker\Generator();
        // $faker->addProvider(new \Faker\Provider\Lorem($faker));
        // $faker->addProvider(new \Faker\Provider\Miscellaneous($faker));

        // DB::table('product')->insert([
        //     'name' => ucfirst($faker->sentence(2)),
        //     'description' => $faker->sentence(15),
        //     'price' => $faker->randomNumber(2),
        //     'containsGift' => $faker->boolean(),
        //     'active' => true,
        //     'product_type' => rand(1, 5)
        // ]);
    }
}
