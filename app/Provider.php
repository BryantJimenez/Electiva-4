<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	protected $table = "users";

	protected $fillable = [
		'name',
		'slug',
		'dni',
		'phone',
		'address',
		'email',
		'state',
		'type'
	];

	public function products() {
        return $this->hasMany(Product::class);
    }
}
