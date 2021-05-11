<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Orders;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Orders::class, function (Faker $faker) {
    return [
    	'invoice_number' => Str::random(10),
		'customer_id' => rand(1, 200),
		'product_id' => rand(1, 100),
		'status' => rand(1, 2),
    ];
});