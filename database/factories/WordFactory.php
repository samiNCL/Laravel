<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'word' => $faker->colorName
        //
    ];
});
