@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => '', ])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Select Stock') }}</div>

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
                                @foreach($stocks  as $stock)
                                    <tr>
                                    <td>{{$stock->name}}</td>
                                    <td>{{$stock->created_at}}</td>
                                        @if($stock->status == 0)
                                            <td> <a href="" class="btn btn-sm btn-primary">Preview Stock History</a></td>
                                        @else
                                            <td> <a href="/stock/managment/{{$stock->id}}" class="btn btn-sm btn-primary">Manage</a></td>
                                        @endif

                                        @if($stock->status == 0)
                                    <td>Sold Out</td>
                                        @else
                                            <td>Products For Sale Still Available</td>
                                        @endif
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
