<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateNewPurseRequest;
use App\NamePurse;
use App\Permission;


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
      $namePurse = new NamePurse;
      $namePurse -> name = $name;
      $namePurse -> user_id = $user_id;
      $namePurse->save();
      $id = $namePurse->id;

      $creatorPermission = new Permission;
      $creatorPermission -> name_purse_id = $id;
      $creatorPermission -> user_id = $user_id;
      $creatorPermission-> delete_purse = '1';
      $creatorPermission-> update_purse = '1';
      $creatorPermission-> look_purse = '1';
      $creatorPermission-> ability_purse= '1';
      $creatorPermission ->save();

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
        $users = DB::table('permission')->where('user_id', auth()->user()->id)->get('name_purse_id');

        $arrayNames = $users->flatMap(function ($item) {
          $arrayName = DB::table('name_purse')-> where('id', $item->name_purse_id)->get();
          return $arrayName;
              });
          return view('auth.purse.allPurse');
    }

}
