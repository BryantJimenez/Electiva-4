<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $table = "sales_27";

	protected $fillable = [
		'slug',
		'user_id',
		'customer_id',
		'way_pay',
		'net', 
		'total'
	];
}
