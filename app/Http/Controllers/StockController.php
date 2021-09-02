<?php

namespace App\Http\Controllers;

use App\Models\stock;
use Illuminate\Http\Request;

class StockController extends Controller
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
    public function stock($id){
        $stock = stock::find($id);
        return view('pages.management')->with('stock', $stock);
    }

    public function products($id)
    {
        $stock = stock::find($id);
        $products = $stock->products;
        return view('pages.products')
            ->with('products', $products)
            ->with('stock', $stock);
    }
}
