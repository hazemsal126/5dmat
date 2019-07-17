<?php
$faker_ar = \Faker\Factory::create('ar_SA');
$faker_fr = \Faker\Factory::create('fr');
$faker_ar->addProvider(new \Faker\Provider\Lorem($faker_ar));
$faker_ar->addProvider(new \Faker\Provider\Miscellaneous($faker_ar));
$faker_fr->addProvider(new \Faker\Provider\Lorem($faker_fr));
$faker_fr->addProvider(new \Faker\Provider\Miscellaneous($faker_fr));

$factory->define(\App\Models\Product::class, function (
    Faker\Generator $faker
) use ($faker_ar, $faker_fr) {
    $faker->addProvider(new \Faker\Provider\Lorem($faker));
    $faker->addProvider(new \Faker\Provider\Miscellaneous($faker));
    $required = rand(100, 100000);
    $acquired = rand(0, $required);
    return [
        'name' => [
            'en' => $faker->realText(50),
            'fr' => $faker_fr->realText(50),
            'ar_SA' => $faker_ar->realText(50)
        ],
        'description' => [
            'en' => $faker->realText(200),
            'fr' => $faker_fr->realText(200),
            'ar_SA' => $faker_ar->realText(200)
        ],
        'price' => $faker->randomNumber(2),
        'containsGift' => $faker->boolean(),
        'product_image' => "uploads/images/" . rand(1, 5) . ".jpg",
        'active' => true,
        'acquired_amount' => $acquired,
        'target_amount' => $required,
        'product_type' => rand(1, 5)
    ];
});
