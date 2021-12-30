<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cart_items;
use App\Models\customer;
use App\Models\paymentMethods;
use App\Models\product;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('allowedUsers');
    }
    public function index($id){
        $paymentMethods = paymentMethods::all();
        $clients = customer::all();
        $user = Auth::user();
        $stock = stock::find($id);
        $total = $this->total();
        if ($user->cart) {
            $cart = cart::find($user->cart->id);
            return view('pages.cart')
                ->with('cart', $cart)
                ->with('clients', $clients)
                ->with('paymentMethods', $paymentMethods)
                ->with('stock', $stock)
                ->with('total', $total);

        } else {
            $cart = [];
            return view('pages.cart')
                ->with('clients', $clients)
                ->with('paymentMethods', $paymentMethods)
                ->with('cart', $cart)
                ->with('stock', $stock)
             ->with('total', $total);
        }
    }

    public function addToCart(Request $request, $id){

        $this->validate($request, [
            'product_id' => 'required',
            'quantity'=>'required|numeric|min:1'
        ]);

        $user = Auth::user();
        if ($user->cart !== null){
            $cart = cart::find($user->cart->id);
        } else {
            $cart = new cart();
            $cart->stock_id = $id;
            $cart->user_id = $user->id;
            $cart->save();
        }

        $product = product::find($request->input('product_id'));

        if ($request->input('quantity') > $product->quantity_in_stock) {
            return redirect()->back()->withStatus('product is out of stock');
        } else {
            if ($cart_item = $this->checkProductInCart($product->id, $cart->cart_items ?? [])) {

                $cart_item = cart_items::find($cart_item->id);
                $cart_item->quantity = $cart_item->quantity + $request->input('quantity');
                $cart_item->save();
            } else {
                $cart_item = new cart_items();
                $cart_item->quantity = $request->input('quantity');
                $cart_item->product_id = $request->input('product_id');
                $cart_item->price = $product->price;
                $cart_item->cart_id = $cart->id;
            }
            $cart_item->save();
            return redirect()->back()->withStatus('product added to cart');
        }
    }

    public function deleteCartItem(Request $request)
    {
        $this->validate($request, [
            'cart_item_id' => 'required',
        ]);
        $user = Auth::user();
        $cart_item = cart_items::find($request->input('cart_item_id'));
        if ($cart_item != null) {
            $cart_item->delete();
            return redirect()->back()->withStatus('success', 'item removed Succesfully');
        } else {
            return redirect()->back()->withError('success', 'failed to remove');
        }

    }

    public function increment(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required'
        ]);
        $user = auth::user();

        if ($cart_item = $this->checkProductInCart($request->input('product_id'), $user->cart->cart_items)) {
            $cart_item = cart_items::find($cart_item->id);
            //quantity in stock
            $cart_item->quantity++;
            $cart_item->save();
            return redirect()->back()->withStatus( 'incremented successfully');
        }
        return redirect()->back()->withError( 'failure to increment');
    }

    //decrement product in cart through authenticated Api
    public function decrement(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',

        ]);
        $user = auth::user();

        if ($cart_item = $this->checkProductInCart($request->input('product_id'), $user->cart->cart_items)) {
            $cart_item = cart_items::find($cart_item->id);
            if($cart_item->quantity == 1){
                return redirect()->back()->withError( 'product can not be less than 1 ');
            }
            $cart_item->quantity--;
            $cart_item->save();
        }
        return redirect()->back()->withStatus('decremented successfully');
    }
}
