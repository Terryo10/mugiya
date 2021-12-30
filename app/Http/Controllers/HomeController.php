<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_role = Auth::user()->role;
        //check roles to block unknown users
        $stocks = stock::all()->sortByDesc('created_at');;

        return view('home')->with('stocks', $stocks);

    }
}
