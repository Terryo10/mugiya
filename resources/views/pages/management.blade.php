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
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    <th>Status</th>
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
