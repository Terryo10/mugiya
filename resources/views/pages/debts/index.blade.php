@extends('layouts.template', ['pageSlug' => 'debt', 'page' => 'Create New Debt ', 'section' => 'debt','StockId'=> $stock->id])
@section('content')
      @include('alerts.success')
      @include('alerts.error')
      @include('alerts.success')
      @include('alerts.error')
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Transaction for {{$stock->name}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="" class="btn btn-sm btn-primary">
                                Stock Expenses
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>name</th>
                                <th>for</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($debts as $debt)
                                    <tr>
                                        <td>{{ $debt->created_at->format('l jS \\of F Y h:i:s A') }}</td>
                                        <td>{{ $debt->name}}</td>
                                    <td><a href="/debt_preview?stock_id={{$stock->id}}&debt_id={{$debt->id}}" class="btn btn-sm btn-primary">
                                preview
                            </a></td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
