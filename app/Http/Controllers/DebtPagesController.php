<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\stock;

class DebtPagesController extends Controller
{
    public function getProducts(Request $request){
            $stock = stock::find($request->id);
            $products = product::where('stock_id', '=', $request->id);

          return $products;

    }
}
