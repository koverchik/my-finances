<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutlaySaveController extends Controller
{
  public function saveOutlay(Request $req)
  {
    $validation = $req->validate([
      'title' => 'required|max:100'
    ]);
    dd($req);
  }
}
