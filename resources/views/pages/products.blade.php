@extends('layouts.template', ['pageSlug' => 'products', 'page' => 'Products', 'section' => '','StockId'=> $stock->id])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">You are currently products in {{ $stock->name }}</div>

                    <div class="card-body">
                        <div class="card-body">
                            <div class="">
                                <table class="table">
                                    <thead>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Quantity in Stock</th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>

                                    @foreach($stock->products  as $products)
                                        <tr>
                                            <td>{{$products->name}}</td>
                                            <td>{{$products->created_at}}</td>
                                            <td>{{$products->quantity_in_stock}}</td>
                                            <td>$ {{$products->price}}</td>


                                        </tr>
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
@endsection
