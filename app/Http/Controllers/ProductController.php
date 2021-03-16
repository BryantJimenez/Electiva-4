<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Provider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = 1;
        $products = Product::where('state', '=', '1')->get();
        $category = Category::where('state', '=', '1')->get();
        $provider = Provider::where('type', '=', '4')->orWhere('type', '=', '5')->get();
        return view('admin.products.index', compact('products', 'category', 'provider', 'num'));
    }

     public function desactivar()
    {
        $num = 1;
        $products = Product::where('state', '=', '0')->get();
        return view('admin.products.desactive', compact('products', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        //dd($request->all());
        $count=Product::where('name', request('name'))->count();
        $slug=Str::slug(request('name'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2 = Product::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $data=array('name' => request('name'), 'slug' => $slug, 'category_id' => request('category_id'), 'provider_id' => request('provider_id'), 'cod' => request('cod'), 'stock' => request('stock'), 'sale_price' => request('sale_price'), 'purchase_price' => request('purchase_price'));
                break;
            }
        }

        // Mover imagen a carpeta users y extraer nombre
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $photo = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/products/', $photo);
            $data['image'] = $photo;
        }

        $user=Product::create($data);

        if ($user) {
            return redirect()->route('productos.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El producto ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('productos.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.products.show', compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $categories = Category::where('state', '=', '1')->get();
        $providers = Provider::where('type', '=', '4')->orWhere('type', '=', '5')->get();
        return view('admin.products.edit', compact("product", "categories", "providers"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $product->fill($request->all())->save();

        if ($product) {
            return redirect()->route('productos.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Proveedor ha sido editado exitosamente.']);
        } else {
            return redirect()->route('productos.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function deactivate($slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $product->fill(['state' => '0'])->save();

        if ($product) {
            return redirect()->route('productos.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El Proveedor ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('productos.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate($slug) {
        $product=Product::where('slug', $slug)->firstOrFail();
        $product->fill(['state' => '1'])->save();

        if ($product) {
            return redirect()->route('productos.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El Proveedor ha sido activado exitosamente.']);
        } else {
            return redirect()->route('productos.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
