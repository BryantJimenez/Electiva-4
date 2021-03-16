<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Venta;
use App\Customer;
use App\Product;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {

        $category = Category::all()->count();
        $sale = Venta::all()->count();
        $customer = Customer::all()->count();
        $product = Product::all()->count();


            return view('admin.home', compact('category', 'sale', 'customer', 'product'));
    }

    
}
