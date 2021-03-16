<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Venta extends Model
{

	protected $table = "ventas_27";

	protected $fillable = [
						  "codigo",
						  "vendedor_id",
						  "cliente_id",
						  "total",
						  "neto",
						  "impuestos",
						  "metodo_pago",
						];


	public function vendedor()
	{
		return $this->belongsto(User::class);
	}

	public function cliente()
	{
		return $this->belongsto(User::class);
	}

	public function productos()
	{
		return $this->hasMany(VentaProducto::class);
	}


	public static function codigo()
    {
        $lastId = self::latest()->first();

        if (!$lastId) {
            $codigo = (str_pad((int) 1, 4, '0', STR_PAD_LEFT));
        } else {
            $codigo = (str_pad((int) $lastId->id + 1, 4, '0', STR_PAD_LEFT));
        }

        return $codigo;
    }

   
}
