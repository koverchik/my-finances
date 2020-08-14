<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateNewPurseRequest;


class PurseController extends Controller
{
    public function base()
    {
        // return view('auth.purse.main');

    }

    public function newPurse(CreateNewPurseRequest $request)
    {

      $name = $request->createNamePurse;
      $user_id = auth()->user()->id;
      $user_name = auth()->user()->name;
      $id = DB::table('name_purse')->insertGetId(
            ['name' => $name, 'user_id' => $user_id]
        );
      return view('auth.purse.main')->with(['name' =>  $name, 'idPurse' =>  $id, 'userId' => $user_id, 'nameUser' => $user_name] );
    }

    public function newRowsPurse(Request $request)
    {

      if($request->ajax()){
        $id = DB::table('rows_purse')->insertGetId([
          'name'=> $request ->get('name'),
          'amount' => $request ->get('amount'),
          'created_at_time'=> $request ->get('createdTime'),
          'name_purse_id' => $request ->get('namePurseId'),
          'user_id' => $request ->get('userId')
        ]);

        return response()->json(['msg'=> $id]);
      }
    }
    public function DeleteOneRow(Request $request)
    {
      if($request->ajax()){
        $idRow = $request ->get('name');
        DB::table('rows_purse')->where('id', '=', $idRow)->delete();
          return response()->json(['msg'=> $idRow]);
      }

    }
}
