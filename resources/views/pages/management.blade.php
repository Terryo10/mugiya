@extends('layouts.template', ['pageSlug' => 'stock', 'page' => 'Stock Management', 'section' => '','StockId'=> $stock->id])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">You are currently managing {{ $stock->name }}</div>

                    <div class="card-body">
                        <div class="card-body">
                            <div class="">
                                <table class="table">
                                    <thead>
                                    <th>currently sold</th>
                                    <th>Anticipated in stock</th>
                                    <th>Total Amount Earned</th>
                                    <th>Total Debt </th>
                                    <th>Products debted</th>
                                    <th>Products in stock after debt</th>

                                    <th>Status</th>
                                    </thead>
                                    <tbody>
                                    <td>{{$productsSold}}</td>
                                    <td>{{$productsLeftInStock}}</td>
                                    <td>$ {{ number_format($totalAmountSold, 2, ',', '.') }}</td>
                                  <td>$ {{ number_format($totalDebt, 2, ',', '.') }}</td>
                                  <td>{{$totalDebtProducts}}</td>
                                  <td>{{$productsLeftInStock - $totalDebtProducts}}</td>

                                    <td>@if($stock->status)
                                    Products Available in stock
                                        @else

                                        No Products in stock
                                        @endif
                                    </td>


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

