@extends('layouts.template', ['pageSlug' => 'payments', 'page' => 'Create Payments ', 'section' => 'transactions','StockId'=> $stock->id])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                Add Products To Your cart
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">


                                    <div>
                                        @include('alerts.success')
                                    </div>

                                <div class="pl-lg-4">
                                    <div  >
                                        <label class="form-control-label" for="input-price">Select Products</label>
                                        <div class="container">
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
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Qty In Stock</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Enter Qty</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($products as $product)
                                                            <form method="post" action="/add_to_cart/{{$stock->id}}" autocomplete="off">
                                                                 @csrf
                                                        <tr>

                                                            <td>
                                                                <div id="myList" class="custom-control custom-checkbox">
                                                                    <label  class="custom-control-label" for="customCheck1">{{$product->name}}</label>
                                                                </div>
                                                            </td>

                                                            <td>{{$product->description}}</td>
                                                            <td>{{$product->quantity_in_stock}}</td>
                                                            <td>${{$product->price}}</td>
                                                            <td> <input type="number" name="quantity" value="1"min="1"id="input-quantity" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" value="" required></td>
                                                            <td><input type="hidden" id="invisible_id" name="product_id" value="{{$product['id']}}" > <button type="submit" >Add To cart</button></td>
                                                        </tr>
                                                              </form>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
