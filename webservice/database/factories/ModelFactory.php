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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => bcrypt(str_random(10)),
        'fk_user_status' => rand(1,5),
        'fk_user_types' => rand(1,5),
    ];
});

$factory->define(App\UserStatus::class,function (Faker\Generator $faker){
   return [
     'description' => $faker->word
   ];
});
$factory->define(App\UserType::class,function (Faker\Generator $faker){
   return [
     'description' => $faker->word
   ];
});
$factory->define(App\Business::class,function (Faker\Generator $faker){
   return [
    'name' => $faker->country
   ];
});
$factory->define(App\WorkTable::class,function (Faker\Generator $faker){
    return [
        'fk_user' => rand(1,10),
        'fk_business' => rand(1,10),
        'description' => $faker->text,
        'day' => $faker->dateTimeThisMonth,

    ];
});


