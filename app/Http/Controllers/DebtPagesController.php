<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\stock;
use App\Models\DebtProducts;
use App\Models\transaction;
use App\Models\transactionItems;

class DebtPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('allowedUsers');
    }
    public function getProducts(Request $request){
            $stock = stock::find($request->id);
            $debt = Debt::all();
            $products = product::where('stock_id', '=', $request->id)->get();
            return view('pages.debts.products')
            ->with('products', $products)
            ->with('debt', $debt)
            ->with('stock', $stock);


    }

    public function addtoDebt(Request $request){
        // return $request;
        $this->validate($request, [
            'product_id' => 'required',
            'quantity'=>'required|numeric|min:1',
            'debt_id'=>'required'
        ]);


        $product = product::find($request->input('product_id'));
        $debt = Debt::find($request->debt_id);
        if ($request->input('quantity') > $product->quantity_in_stock) {
            return redirect()->back()->withStatus('product is out of stock');
        } else {
            if ($debt_item = $this->checkProductInDebt($product->id, $debt->products ?? [])) {

                $debt_item = DebtProducts::find($debt_item->id);
                $debt_item->quantity = $debt_item->quantity + $request->input('quantity');
                $debt_item->save();
            } else {
                $debt_item = new DebtProducts();
                $debt_item->quantity = $request->input('quantity');
                $debt_item->product_id = $request->input('product_id');
                $debt_item->price = $product->price;
                $debt_item->debt_id = $debt->id;
            }
            $debt_item->save();
            $st = $debt->stock_id;
            $dt = $debt->id;
            // return 123;
            return redirect("debt_preview?stock_id=${st}&debt_id=${dt}");
        }
    }


    public function debtPreview(Request $request){
        $total = 0;
        $stock = stock::find($request->stock_id);
        $debt= Debt::find($request->debt_id);
        foreach($debt->products as $pd){
            $total = $total + $pd->price * $pd->quantity;
        }
        return view('pages.debts.show')->with('debt',$debt)->with('total',$total)->with('stock', $stock);
    }

    public function settle($id){

            $debt = Debt::find($id);
            $stock = stock::find($debt->stock_id);
            $total = 0;
            foreach($debt->products as $pr){
                $total = $total + ($pr->price * $pr->quantity);
            }


            $transaction = new transaction();
            $transaction->payment_methods_id = 1;
            $transaction->client_id = 1;
            $transaction->stock_id = $stock->id;
            $transaction->amount = $total;
            $transaction->save();
            //create transaction items

            foreach ($debt->products as $item){
                    $transaction_item = new transactionItems();
                    $transaction_item->transaction_id = $transaction->id;
                    $transaction_item->quantity = $item->quantity;
                    $transaction_item->product_id = $item->product_id;
                    $transaction_item->price = $item->price;

                    $transaction_item->save();
                    $product = product::find( $item->product_id);
                    $product->quantity_in_stock = $product->quantity_in_stock - $item->quantity;
                    $product->save();
            }

            // delete debt
            $debt->delete();

            $stock_id = $stock->id;
        return redirect("debt_history/${stock_id}");
    }


}
