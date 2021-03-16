<?php

namespace App\Http\Controllers;

use App\SellingProduct;
use Illuminate\Http\Request;

class SellingProductController extends Controller
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
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellingProduct  $sellingProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SellingProduct $sellingProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellingProduct  $sellingProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SellingProduct $sellingProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellingProduct  $sellingProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellingProduct $sellingProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellingProduct  $sellingProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellingProduct $sellingProduct)
    {
        //
    }
}
