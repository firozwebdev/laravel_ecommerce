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

/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/


$factory->define(App\Ecategory::class, function (Faker\Generator $faker) {
    return [
        'category_name' => $faker->name,
        'category_description' => $faker->paragraph(random_int(1,10)),
        'publication_status' =>1,

    ];
});


$factory->define(App\Eproduct::class, function (Faker\Generator $faker) {


    return [
        'ecategory_id'=> App\Ecategory::all()->random()->id,
        'product_title' => $faker->name,
        'product_description' => $faker->paragraph(random_int(1,20)),

        'product_image' => 'img1.jpg',
        'product_price' =>  $faker->randomFloat(2,1,100),
        'product_type' => 'Regular',
        'product_quantity' => $faker->randomDigit(),
        'publication_status' => 1,
    ];
});

