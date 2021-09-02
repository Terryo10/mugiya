@extends('layouts.template', ['pageSlug' => 'clients', 'page' => 'Client Creation', 'section' => '','StockId'=> $stock->id])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"> Create Client</h3>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                        <div class="card-body">
                            <form method="post" action="/clients/{{$stock->id}}" autocomplete="off">
                                @csrf

                                <div class="pl-lg-4">

                                    <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-price">Name Of Client</label>
                                        <input type="name" name="name" id="input-price" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="" required>
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-price">Email Of Client</label>
                                        <input type="email" name="email" id="input-price" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" required>
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qty">Phone Number</label>
                                        <input type="tel" name="phone_number" id="input-qty" class="form-control form-control-alternative{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"  required>
                                        @include('alerts.feedback', ['field' => 'phone_number'])
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
