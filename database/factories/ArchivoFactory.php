<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Archivo;
use Faker\Generator as Faker;

$factory->define(App\Archivo::class, function (Faker $faker) {

    $name = $faker-> name;
    return [
        'user_id' => random_int(1,3),
        'name' => $name,
        'description' => $faker->text(200)
    ];
});
