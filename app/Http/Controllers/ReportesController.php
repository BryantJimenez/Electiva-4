<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Venta, VentaProducto};
use DB;

class ReportesController extends Controller
{
    public function index()
    {
    	$ventas = Venta::graphSalesMonthYear();

    	return view('admin.ventas.reportes.index',[ 'total' => json_encode($ventas->total),
    												'date' => json_encode($ventas->date,JSON_NUMERIC_CHECK),
    												'productVendidos' => VentaProducto::graphProductMoreSale(),
    												'maxVendedores' => Venta::graphSeller(),
    												'maxCompradores' => Venta::graphBuyer()]);
    }

    public function rango_fecha(Request $request)
    {

    	$ventas = Venta::select(\DB::raw("SUM(total) as count, ventas.created_at"))->groupBy(\DB::raw("Year(created_at)"),\DB::raw("Month(created_at)"))->graphSalesMonthYearDate($request->desde,$request->hasta)
    		->get();
    		$date [] = '';
    		$total[] = '';

    	foreach ($ventas as $value) {
        	$date[] = $value->created_at->format('Y-m');
        	$total[] = $value->count;
        }

       return response()->json(['total' => $total,
    							'date' => $date]);



    }
}
