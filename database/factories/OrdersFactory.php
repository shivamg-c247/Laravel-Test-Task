<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Orders;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Orders::class, function (Faker $faker) {
    return [
    	'invoice_number' => Str::random(10),
		'total_amount' => rand(100, 1000),
		'status' => 'new',
    ];
});