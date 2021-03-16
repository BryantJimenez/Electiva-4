<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $customers = User::where('type', '6')->where('state', '=', '1')->get();
        $num = 1;
        return view('admin.customers.index', compact('customers', 'num'));
    }

    public function desactivar()
    {
        $customers = User::where('type', '6')->where('state', '=', '0')->get();
        $num = 1;
        return view('admin.customers.desactive', compact('customers', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('admin.customers.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        $count=User::where('name', request('name'))->where('dni', request('dni'))->count();
        $slug=Str::slug(request('name')." ".request('dni'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2=User::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $data=array('name' => request('name'), 'phone' => request('phone'), 'slug' => $slug, 'email' => request('email'), 'dni' => request('dni'), 'address' => request('address'), 'type' => '6');
                break;
            }
        }

        $user=User::create($data);

        if ($user) {
            return redirect()->route('clientes.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El cliente ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('clientes.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $customer=User::where('slug', $slug)->firstOrFail();
        $num=1;
        $num2=1;
        return view('admin.customers.show', compact("customer", "num", "num2"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug) {
        $customer=Customer::where('slug', $slug)->firstOrFail();

        return view('admin.customers.edit', compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $slug) {
        $customer = Customer::where('slug', $slug)->firstOrFail();
        $customer->fill($request->all())->save();

        if ($customer) {
            return redirect()->route('clientes.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El cliente ha sido editado exitosamente.']);
        } else {
            return redirect()->route('clientes.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $customer=Customer::where('slug', $slug)->firstOrFail();
        $customer->delete();

        if ($customer) {
            return redirect()->route('clientes.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El cliente ha sido eliminado exitosamente.']);
        } else {
            return redirect()->route('clientes.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function deactivate($slug) {
        $customer = User::where('slug', $slug)->firstOrFail();
        $customer->fill(['state' => '0'])->save();

        if ($customer) {
            return redirect()->route('clientes.desactivar')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El Cliente ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('clientes.desactivar')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate($slug) {
        $customer = User::where('slug', $slug)->firstOrFail();
        $customer->fill(['state' => '1'])->save();

        if ($customer) {
            return redirect()->route('productos.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El Cliente ha sido activado exitosamente.']);
        } else {
            return redirect()->route('productos.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
