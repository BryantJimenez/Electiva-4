<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categories_27";

	protected $fillable = [
		'name', 
		'slug',
		'description'
	];

	public function products() {
        return $this->hasMany(Product::class);
    }
}
