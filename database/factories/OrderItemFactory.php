<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderItems;
use Faker\Generator as Faker;

$factory->define(OrderItems::class, function (Faker $faker) {
	return [
		'order_id' => rand(1, 50),
		'product_id' => rand(1, 100),
		'quantity' => rand(1, 10),
	];
});
