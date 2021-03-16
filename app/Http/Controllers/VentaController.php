<?php 

namespace App\Http\Controllers;

use App\{Venta,User,Product,VentaProducto};
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\{SaleStoreRequest,SaleUpdateRequest};
use PDF;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.ventas.index',['ventas' => Venta::all()]);
    }

    public function create()
    {
        $products = Product::where('state', '=', '1')->get();
        $users = User::where('state', '=', '1')->get();
        $num = 1;
        $codigo = Venta::codigo();

        return view('admin.ventas.create', compact('products', 'users', 'num','codigo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $venta = new Venta;
        $venta->fill($request->all());

        if ($request->metodo_pago == 'TD') {
            $venta->metodo_pago = 'TD-'.$request->codigo_transaccion;
        }else if($request->metodo_pago == 'TC'){
            $venta->metodo_pago = 'TC-'.$request->codigo_transaccion;
        }
            
        if ($venta->save()) {

            foreach ($request->producto_id as $key => $a) {
                
                VentaProducto::create([ 'producto_id' => $a,
                                       'venta_id' => $venta->id,
                                       'cantidad' => $request->cantidad[$key],
                                       'precio_unitario' => $request->precio_unitario[$key]
                                       ]);
                //restar del stock
                $producto = Product::findOrfail($a);
                $producto->stock = $producto->stock - $request->cantidad[$key];
                $producto->save();
               
            }
            
            return redirect()->route('ventas.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La venta se hizo de manera exitosa.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        foreach ($venta->productos as $key => $a) {
                
            //sumar del stock
            $producto = Product::findOrfail($a->producto_id);
            $producto->stock = $producto->stock + $a->cantidad;
            $producto->save();
           
        }

        if ($venta->delete()) {
            return redirect()->route('ventas.index')->with(['type' => 'warning', 'title' => 'Se Elimino Correctamente', 'msg' => 'La venta se ha eliminado Correctamente.']);
        }
    }

    public function ticket($codigo)
    {
        $venta = Venta::where('codigo',decrypt($codigo))->first();

        $pdf = PDF::loadView('admin.ventas.pdf.ticket',['venta' => $venta])->setPaper('a7', 'landscape');
        return $pdf->stream('ticket.pdf');
    }

    public function factura($codigo)
    {
        $venta = Venta::where('codigo',decrypt($codigo))->first();
        
        $pdf = PDF::loadView('admin.ventas.pdf.factura',['venta' => $venta])->setPaper('a4', 'landscape');
        return $pdf->stream('factura.pdf');
    }
}
