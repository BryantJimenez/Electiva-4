<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellingProduct extends Model
{
	protected $table = "selling_products_27";

	protected $fillable = [
		'sale_id',
		'product_id',
		'price'
    ];
}
