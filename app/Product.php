<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";

	protected $fillable = [
		'category_id',
		'provider_id',
		'cod',
		'image',
		'slug', 
		'name',
		'stock',
		'sale_price',
		'purchase_price',
		'state'
	];

	public function getNameAttribute($value)
	{
		return strtoupper($value);
	}

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function provider() {
		return $this->belongsTo(Provider::class);
	}


}
