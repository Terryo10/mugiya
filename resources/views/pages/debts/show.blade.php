@extends('layouts.template', ['pageSlug' => 'debt', 'page' => 'Debt', 'section' => '','StockId'=> $stock->id])
@section('content')
      @include('alerts.success')
      @include('alerts.error')
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Transaction {{ $debt->created_at->format('l jS \\of F Y h:i:s A') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="" class="btn btn-sm btn-primary">
                                amount paid ${{$debt->amount_paid}}
                            </a>
                            <a href="" class="btn btn-sm btn-primary">
                                amount to be paid ${{$total - $debt->amount_paid}}
                            </a>
                            <a href="" class="btn btn-sm btn-primary">
                                total ${{$total}}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>name</th>
                                <th>Description</th>
                                <th>total price per item</th>
                                <th>Quantity</th>
                                <th>Price</th>

                            </thead>
                            <tbody>
                                {{-- {{$debt->products}} --}}
                            @foreach($debt->products as $transaction)
                                    <tr>
                                        <td>{{$transaction->product->name}}</td>
                                        <td>{{$transaction->product->description}}</td>
                                        <td>{{$transaction->quantity * $transaction->price}}</td>
                                        <td>{{$transaction->quantity}}</td>
                                        <td>$ {{$transaction->price}}</td>

                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

       <div class="row">
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Buying Client</h4>
                        </div>
                        <div class="col-4 text-right">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>phone_number</th>
                                <th>Email</th>
                            </thead>
                            <tbody>

                                    <tr>
                                        <td>{{$debt->name}}</td>
                                        <td>{{$debt->phone_number}}</td>
                                        <td>{{$debt->email}}</td>


                                    </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Method Used To Pay</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/settle/{{$debt->id}}" class="btn btn-sm btn-primary">Settle Debt</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div
    @endsection
