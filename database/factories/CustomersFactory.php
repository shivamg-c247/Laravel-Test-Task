<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customers;
use Faker\Generator as Faker;

$factory->define(Customers::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
		'email' => preg_replace('/@example\..*/', '@gmail.com', $faker->unique()->safeEmail),
    ];
});
