<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
		'price' => rand(10,100),
		'in_stock' => 'In Stock',
    ];
});