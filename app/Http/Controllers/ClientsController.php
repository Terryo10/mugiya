<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\stock;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('allowedUsers');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $stock = stock::find($id);
        $clients = customer::all();
        return view('pages.clients.index')->with('stock', $stock)->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $stock = stock::find($id);
        return view('pages.clients.create')->with('stock', $stock);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = stock::find($request->nom);
        $request->validate([
            'email' => 'required',
            'phone_number' => 'required',
            'name' => 'required',
        ]);
       $client = new customer();
       $client->name = $request->input('name');
       $client->phone_number = $request->input('phone_number');
       $client->email =  $request->input('email');
       $client->save();
        $clients = customer::all();
        return view('pages.clients.index')->with('stock', $stock)->with('clients', $clients);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
