<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNewPurseRequest;


class PurseController extends Controller
{
    public function base()
    {
        // return view('auth.purse.main');

    }

    public function newPurse(CreateNewPurseRequest $request)
    {
      // $validated = $request->validated();
      return view('auth.purse.main');
    }
}
