@extends('layouts.template', ['pageSlug' => 'cart', 'page' => 'Cart Page ', 'section' => 'transactions','StockId'=> $stock->id])
@section('content')
    <div>
        <div class="pl-lg-4">
            @include('alerts.success')
            @include('alerts.error')

        </div>
            <div  >
                <label class="form-control-label" for="input-price">Products in cart Products</label>
                <div class="container">
                    <div class="col-4 text-right">
                        <a href="/payments/{{$stock->id}}/create" class="btn btn-sm btn-primary">Add more Products in Debt Cart</a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div >
                                <table class="table table-bordered">
                                    <thead>
                                    <div>
                                        <p>Products Search</p>
                                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                        <br>
                                    </div>
                                    <tr>
                                        <th scope="col">Product Name</th>

                                        <th scope="col">Qty In Cart</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Total per item</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @if($cart == null || $cart->cart_items == [])
                                     @else
                                          @foreach($cart->cart_items as $product)
                                        <tr>
                                            <td>
                                                <div id="myList" class="custom-control custom-checkbox">
                                                    <label  class="custom-control-label" for="customCheck1">{{$product->product->name}}</label>
                                                </div>
                                            </td>

                                            <td>{{$product->quantity}}</td>
                                            <td>${{$product->price}}</td>
                                            <td>${{$product->price * $product->quantity}}</td>
                                            <td><form method="post" action="/delete_cart_item">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->id}}" name="cart_item_id">
                                                    <button class="btn-sm btn-success">Remove from cart</button></form>
                                                <form method="post" action="/decrement">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->product->id}}" name="product_id">
                                                <button class="btn-sm btn-danger">Decrement</button>
                                                </form>
                                                <form method="post" action="/increment">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->product->id}}" name="product_id">
                                                    <button class="btn-sm btn-default">increment</button>
                                                </form> </td>
                                        </tr>
                                    @endforeach
                                     @endif

                                    </tbody>

                                </table>
                            </div>
                            <div>
                                <div class="alert alert-success" role="alert">
                                    <center>Total $ {{$total}}</center>
                                </div>
                            </div>

                            @if($cart == null || $cart->cart_items == [])
                                    <div>
                                <div class="alert alert-success" role="alert">
                                    <center>You dont have products in cart</center>
                                </div>
                            </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                              <input type="hidden" name="stock_id" value="{{$stock->id}}">
                                          <button type="submit" class="btn btn-primary">Make Transaction</button>
                                          </div>
                                        </form>
                                        </div>
                                    </div>


                            @endif
                            <div></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
