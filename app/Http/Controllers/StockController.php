<?php

namespace App\Http\Controllers;

use App\Models\stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock($id){
        $stock = stock::find($id);
        return view('pages.management')->with('stock', $stock);
    }
}
