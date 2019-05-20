<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Archivo;
use Faker\Generator as Faker;

$factory->define(App\Archivo::class, function (Faker $faker) {

    $name = $faker-> name;
    return [
        'name' => $name,
    ];
});
