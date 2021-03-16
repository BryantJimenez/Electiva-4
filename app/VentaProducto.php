<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model 
{

	protected $table = "venta_productos_27";

    protected $fillable = [
						  "venta_id",
						  "producto_id",
						  "cantidad",
						  "precio_unitario",
						];

	public function producto()
	{
		return $this->belongsto(Product::class);
	}


	
}
