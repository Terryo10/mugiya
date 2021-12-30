<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\product;
use App\Models\stock;
use App\Models\transaction;
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
        $productsLeftInStock =0;
        $totalAmountSold = 0;
        $productsSold = 0;
        $totalDebt = 0;
        $totalDebtProducts = 0;

        $products = product::where('stock_id', '=', $stock->id)->get();
        $transactions = transaction::where('stock_id','=', $stock->id)->get();
        foreach ($transactions as $transaction){
            foreach ($transaction->transactionItems as $transactionItem){
                $totalAmountSold = $totalAmountSold + ($transactionItem->quantity * $transactionItem->price);
                    $productsSold = $productsSold + $transactionItem->quantity;
            }
        }
        $debtProducts = Debt::where('stock_id','=',$stock->id)->get();
        // return $debtProducts;
        foreach ($products as $product){
        $productsLeftInStock = $productsLeftInStock + $product->quantity_in_stock;
        }

        foreach($debtProducts as $pr){
            foreach($pr->products as $pd){
            $totalDebt =  $totalDebt + ($pd->price * $pd->quantity);
            $totalDebtProducts = $totalDebtProducts + $pd->quantity;
            }

        }


        return view('pages.management')
            ->with('stock', $stock)
            ->with('productsSold',$productsSold)
            ->with('totalAmountSold',$totalAmountSold)
            ->with('productsLeftInStock',$productsLeftInStock)
            ->with('totalDebt',$totalDebt)
            ->with('totalDebtProducts',$totalDebtProducts);
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
