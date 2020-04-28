<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NameOutlayRequest;


class OutlaySaveController extends Controller
{
  public function saveOutlay(NameOutlayRequest $req)
  {
      dd($req);
  }
}
