<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model{
	protected $fillable = [
		'invoice_number', 'customer_id', 'product_id', 'status',
	];
}
