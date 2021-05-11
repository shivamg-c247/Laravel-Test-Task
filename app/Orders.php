<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model{
	protected $fillable = [
		'invoice_number', 'total_amount', 'status',
	];
}
