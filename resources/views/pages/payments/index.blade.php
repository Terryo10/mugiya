@extends('layouts.template', ['pageSlug' => 'payments', 'page' => 'Payments', 'section' => 'transactions','StockId'=> $stock->id])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                Total sales for {{ $stock->name }} are ${{ number_format($total, 2, ',', '.') }}
                            </div>
                            <div class="col-4 text-right">
                                <a href="/payments/{{$stock->id}}/create" class="btn btn-sm btn-primary">Create A New Transaction</a>
                            </div>
                        </div>

                    </div>

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
