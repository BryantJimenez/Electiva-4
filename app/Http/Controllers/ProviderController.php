<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProviderStoreRequest;
use App\Http\Requests\ProviderUpdateRequest;

class ProviderController extends Controller
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
       $providers = User::where([ ['type', '=', '4'], ['state', '=', '1'], ])
                           ->orWhere([ ['type', '=', '5'], ['state', '=', '1'], ])         
                           ->get();
        $num=1;
        return view('admin.providers.index', compact('providers', 'num'));
    }

    public function desactivar()
    {
        $providers = User::where([ ['type', '=', '4'], ['state', '=', '0'], ])
                           ->orWhere([ ['type', '=', '5'], ['state', '=', '0'], ])         
                           ->get();
        $num = 1;
        return view('admin.providers.desactive', compact('providers', 'num'));
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
    public function store(ProviderStoreRequest $request)
    {
        $count=User::where('name', request('name'))->where('phone', request('phone'))->count();
        $slug=Str::slug(request('name')." ".request('phone'), '-');
        if ($count>0) {
            $slug=$slug."-".$count;
        }

        // Validación para que no se repita el slug
        $num=0;
        while (true) {
            $count2 = User::where('slug', $slug)->count();
            if ($count2>0) {
                $slug=$slug."-".$num;
                $num++;
            } else {
                $data=array('name' => request('name'), 'slug' => $slug, 'email' => request('email'), 'phone' => request('phone'), 'dni' => request('dni'), 'address' => request('address'), 'type' => request('type'));
                break;
            }
        }

        // Mover imagen a carpeta users y extraer nombre
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/users/', $photo);
            $data['photo'] = $photo;
        }

        $user=User::create($data);

        if ($user) {
            return redirect()->route('proveedores.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El proveedor ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('proveedores.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $provider = User::where('slug', $slug)->firstOrFail();
        return view('admin.providers.show', compact("provider"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($slug) {

        $provider=User::where('slug', $slug)->firstOrFail();
        return view('admin.providers.edit', compact("provider"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderUpdateRequest $request, $slug)
    {
        $provider = User::where('slug', $slug)->firstOrFail();

        $provider->fill($request->all())->save();

        if ($provider) {
            return redirect()->route('proveedores.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El Proveedor ha sido editado exitosamente.']);
        } else {
            return redirect()->route('proveedores.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        //
    }

    public function deactivate($slug) {
        $provider=User::where('slug', $slug)->firstOrFail();
        $provider->fill(['state' => '0'])->save();

        if ($provider) {
            return redirect()->route('proveedores.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El Proveedor ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('proveedores.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate($slug) {
        $provider=User::where('slug', $slug)->firstOrFail();
        $provider->fill(['state' => '1'])->save();

        if ($provider) {
            return redirect()->route('proveedores.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El Proveedor ha sido activado exitosamente.']);
        } else {
            return redirect()->route('proveedores.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

}
