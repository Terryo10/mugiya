<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\customer;
use App\Models\paymentMethods;
use App\Models\product;
use App\Models\stock;
use App\Models\transaction;
use App\Models\transactionItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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
    public function index($id)
    {
        $stock = stock::find($id);
        $paymentMethods = paymentMethods::all();
        $total = 0;
        $products = product::where('stock_id', '=' , $id);
        return  view('pages.payments.index')
            ->with('products', $products)
            ->with('paymentMethods', $paymentMethods)
            ->with('stock', $stock)
            ->with('total', $total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $stock = stock::find($id);
        $paymentMethods = paymentMethods::all();
        $clients = customer::all();
        $total = 0;

        $products = product::where('stock_id', '=' , $id)->get();
        return  view('pages.payments.create')
            ->with('products', $products)
            ->with('paymentMethods', $paymentMethods)
            ->with('stock', $stock)
            ->with('total', $total)
            ->with('clients', $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $stock = stock::find($request->input('stock_id'));
        $user = Auth::user();
        $request->validate([
            'client_id' => 'required|numeric',
            'payment_method' => 'required|numeric',
        ]);
        $client =customer::find($request->input('client_id'));
        $payment_method = paymentMethods::find($request->input('payment_method'));
        $cart = $user->cart;
        $transaction = new transaction();
        $transaction->payment_methods_id = $request->input('payment_method');
        $transaction->client_id = $request->input('client_id');
        $transaction->stock_id = $request->input('stock_id');
        $transaction->amount = $this->total();
        $transaction->save();

        //create transaction items

        foreach ($cart->cart_items as $item){
//            dd($cart);
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

        //delete cart
        $cartToBeDeleted = cart::find($user->cart->id);
        $cartToBeDeleted->delete();
        $client = customer::find($transaction->client_id);
        $paymentMethod = paymentMethods::find($transaction->payment_methods_id);
        $total = $this->transactionTotal($transaction->id);
        return view('pages.transaction_preview')
            ->with('stock', $stock)
            ->with('total', $total)
            ->with('paymentMethod', $paymentMethod)
            ->with('client', $client)
            ->with('transaction', $transaction)
            ->withStatus('Transaction successfully made');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,int $id)
    {
        $stock = stock::find($request->nom);
        $transaction = transaction::find($id);
        return view('pages.transaction_preview')
            ->with('stock', $stock)
            ->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTransaction(Request $request){
       $stock = stock::find($request->stock_id);
        $transaction = transaction::find($request->transaction_id);
        $client = customer::find($transaction->client_id);
        $paymentMethod = paymentMethods::find($transaction->payment_methods_id);
        $total = $this->transactionTotal($request->transaction_id);
        return view('pages.transaction_preview')
            ->with('stock', $stock)
            ->with('total', $total)
            ->with('paymentMethod', $paymentMethod)
            ->with('client', $client)
            ->with('transaction', $transaction);
    }

    public function transactionTotal($id){
        $transaction = transaction::find($id);

        if ($transaction !== null) {

                $transactionItems = $transaction->transactionItems;
                if (!$transactionItems) {
                    return $total = 0;
                } else {
                    $total = 0;
                    foreach ($transactionItems as $item) {
                        $total = $total + ($item->quantity * $item->price);
                    }
                    return $total;
                }
            }
            return $total = 0;

        }

        public function stockHistory($id){
            $transaction = transaction::where('stock_id', '=', $id)->get();
            $stock = stock::find($id);
            return view('pages.stock_history')
                ->with('transaction', $transaction )
                ->with('stock', $stock);
        }


}
