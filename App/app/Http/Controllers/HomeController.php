<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $tables = collect(DB::table('powers')->where('user_id', auth()->user()->id)->get('name_outlay_id'));
        $namesOutlay = $tables->flatMap(function ($values) {
          $values = collect(DB::table('name_outlay')->where('id', $values->name_outlay_id)->get());
          return $values;
        });

        $id_user = $req->user();
        $id = $id_user['id'];
          return view('home',  ['data' => $namesOutlay, $id => $id]);
    }

}
