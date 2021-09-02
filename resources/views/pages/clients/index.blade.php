@extends('layouts.template', ['pageSlug' => 'clients', 'page' => 'Clients', 'section' => '','StockId'=> $stock->id])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Clients</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/clients/{{$stock->id}}/create" class="btn btn-sm btn-primary">Add Client</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <div class="">
                                <table class="table">
                                    <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Purchases</th>
                                    </thead>
                                    <tbody>

                                    @foreach($clients  as $client)
                                        <tr>
                                            <td>{{$client->name}}</td>
                                            <td>{{$client->email}}</td>
                                            <td>{{$client->phone_number}}</td>
                                            <td>{{$client->purchases}}</td>
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
