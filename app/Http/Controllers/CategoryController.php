<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
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
     	$categories=Category::all();
     	$num=1;
     	return view('admin.categories.index', compact('categories', 'num'));
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
    public function store(CategoryStoreRequest $request)
    {
    	$count=Category::where('name', request('name'))->where('name', request('name'))->count();
    	$slug=Str::slug(request('name'), '-');
    	if ($count>0) {
    		$slug=$slug."-".$count;
    	}

        // Validación para que no se repita el slug
    	$num=0;
    	while (true) {
    		$count2=Category::where('slug', $slug)->count();
    		if ($count2>0) {
    			$slug=$slug."-".$num;
    			$num++;
    		} else {
    			$data=array('name' => request('name'), 'slug' => $slug, 'description' => request('description'));
    			break;
    		}
    	}

    	$category=Category::create($data);

    	if ($category) {
    		return redirect()->route('categorias.index')->with(['type' => 'success', 'title' => 'Registro exitoso', 'msg' => 'La Categoría ha sido registrada exitosamente.']);
    	} else {
    		return redirect()->route('categorias.index')->with(['type' => 'error', 'title' => 'Registro fallido', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug) {

    	$category=Category::where('slug', $slug)->firstOrFail();
    	return view('admin.categories.edit', compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $slug)
    {
    	$category = Category::where('slug', $slug)->firstOrFail();

    	$category->fill($request->all())->save();

    	if ($category) {
    		return redirect()->route('categorias.edit', ['slug' => $slug])->with(['type' => 'success', 'title' => 'Edición exitosa', 'msg' => 'La Categoría ha sido editada exitosamente.']);
    	} else {
    		return redirect()->route('categorias.edit', ['slug' => $slug])->with(['type' => 'error', 'title' => 'Edición fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category=Category::where('slug', $slug)->firstOrFail();
        $category->delete();

        if ($category) {
            return redirect()->route('categorias.index')->with(['type' => 'success', 'title' => 'Eliminación exitosa', 'msg' => 'La Categoría ha sido eliminada exitosamente.']);
        } else {
            return redirect()->route('categorias.index')->with(['type' => 'error', 'title' => 'Modificación fallida', 'msg' => 'Ha ocurrido un error durante el proceso, intentelo nuevamente.']);
        }
    }
}
