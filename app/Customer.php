<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = "users";

	protected $fillable = [
		'name',
		'slug',
		'dni',
		'phone',
		'address',
		'email',
		'sales',
		'last_sale'
	];

}
