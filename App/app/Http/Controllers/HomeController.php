<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NameOutlay;

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
    public function index(Request $req)
    {
        $id_user = $req->user();
        $id = $id_user['id'];
        return view('home',  ['data' => NameOutlay::all(), $id => $id]);
    }

}
