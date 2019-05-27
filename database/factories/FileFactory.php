<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Archivos;
use Faker\Generator as Faker;

$factory->define(App\Archivos::class, function (Faker $faker) {

    $name = $faker-> name;

    return [
        'user_id' => random_int(1,3),
        'name' => $name,
        'slug' => str_slug($name, "-"),
        'description' => $faker->text(200)
    ];
});
