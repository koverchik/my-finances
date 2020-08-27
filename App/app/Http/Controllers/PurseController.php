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
      $ldate = date('Y-m-d H:i:s');
      $id = DB::table('name_purse')->insertGetId(
            ['name' => $name, 'user_id' => $user_id, 'created_at' => $ldate]
        );

      return redirect()->route('PurseView',$id);
    }



    public function newRowsPurse(Request $request)
    {
      $ldate = date('Y-m-d H:i:s');
      if($request->ajax()){
        $id = DB::table('rows_purse')->insertGetId([
          'name'=> $request ->get('name'),
          'amount' => $request ->get('amount'),
          'created_at_time'=> $request ->get('createdTime'),
          'name_purse_id' => $request ->get('namePurseId'),
          'user_id' => $request ->get('userId'),
          'created_at' => $ldate
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
    
    public function viewOnePurse($id)
    {

      $user_id = auth()->user()->id;
      $user_name = auth()->user()->name;
      $name = DB::table('name_purse')->where('id', '=', $id)->pluck('name');

      return view('auth.purse.main', ['name' =>  $name[0], 'idPurse' =>  $id,'userId' => $user_id, 'nameUser' => $user_name]);

    }

    public function allPurse()
    {
          return view('auth.purse.allPurse');
    }

}
