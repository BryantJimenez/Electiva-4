<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users=User::all();
        $num=1;
        return view('admin.users.index', compact('users', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request) {

        // dd($request);

        $count=User::where('name', request('name'))->where('user', request('user'))->count();
        $slug=Str::slug(request('name')." ".request('user'), '-');
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
                $data=array('name' => request('name'), 'user' => request('user'), 'slug' => $slug, 'email' => request('email'), 'phone' => request('phone'), 'dni' => request('dni'), 'address' => request('address'), 'type' => request('type'), 'password' => Hash::make(request('password')));
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
            return redirect()->route('usuarios.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'El usuario ha sido registrado exitosamente.']);
        } else {
            return redirect()->route('usuarios.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $user = User::where('slug', $slug)->firstOrFail();
        $num=1;
        $num2=1;
        return view('admin.users.show', compact("user", "num", "num2"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug) {
        $user=User::where('slug', $slug)->firstOrFail();
        return view('admin.users.edit', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $slug) {
        $user=User::where('slug', $slug)->firstOrFail();
        $data=array('name' => request('name'), 'user' => request('user'), 'slug' => $slug, 'email' => request('email'), 'dni' => request('dni'), 'phone' => request('phone'), 'address' => request('address'), 'type' => request('type'));

        // Mover imagen a carpeta users y extraer nombre
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/admins/img/users/', $photo);
            $data['photo'] = $photo;
        }
        $user->fill($data)->save();

        if ($user) {
            return redirect()->route('usuarios.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'El usuario ha sido editado exitosamente.']);
        } else {
            return redirect()->route('usuarios.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($slug) {
        $user=User::where('slug', $slug)->firstOrFail();
        $user->fill(['state' => '0'])->save();

        if ($user) {
            return redirect()->route('usuarios.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El usuario ha sido desactivado exitosamente.']);
        } else {
            return redirect()->route('usuarios.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }

    public function activate($slug) {
        $user=User::where('slug', $slug)->firstOrFail();
        $user->fill(['state' => '1'])->save();

        if ($user) {
            return redirect()->route('usuarios.index')->with(['type' => 'success', 'title' => 'Modificación exitosa', 'msg' => 'El usuario ha sido activado exitosamente.']);
        } else {
            return redirect()->route('usuarios.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    } 

    public function profile() {
        $num=1;
        $num2=1;
        return view('admin.users.profile', compact("num", "num2"));
    }

    public function profileEdit() {
        return view('admin.users.profileEdit');
    }

    public function emailVerify(Request $request)
    {
        $count = User::where('email', request('email'))->count();
        if ($count>0) {
            return "false";
        } else {
            return "true";
        }
    }
}