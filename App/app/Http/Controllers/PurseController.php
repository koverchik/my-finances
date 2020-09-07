<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateNewPurseRequest;
use App\User;
use App\NamePurse;
use App\Permission;
use App\RowPurse;


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

      if($request->ajax()){
          $rowPurse = new RowPurse;
          $rowPurse-> name = $request ->get('name');
          $rowPurse -> amount = $request ->get('amount');
          $rowPurse -> created_at_time = $request ->get('createdTime');
          $rowPurse -> name_purse_id = $request ->get('namePurseId');
          $rowPurse -> user_id = $request ->get('userId');
          $rowPurse ->save();
          $id = $rowPurse->id;

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
        $users = collect(DB::table('permission')->where('user_id', auth()->user()->id)->get('name_purse_id'));

        $arrayNames = $users->map(function ($values) {
          $NamePurse = NamePurse::find($values->name_purse_id);
          $name = $NamePurse->toArray();
          $permission = $NamePurse->Permission;
          $permission = $permission->map(function ($values){
            $user = (User::find($values->user_id, ['name', 'email']))->toArray();
            $values = $values->toArray();
            $marge = array_merge($values, $user);
            return array_merge($values, $user);
          });
          $permission = $permission->toArray();
          $arrayPermission = ['permission' => $permission];
          return array_merge($name,$arrayPermission);
              });

          return view('auth.purse.allPurse', )->with('dataPurses', $arrayNames);
    }

    public function PurseNewUser(Request $request)
    {

      $NamePurse = NamePurse::find($request->namePurse);
      $NameUser =  User::find($request->idUserInDB);
      $creatorPermission = new Permission;
      $creatorPermission -> name_purse_id = $request->namePurse;
      $creatorPermission -> user_id = $request->idUserInDB;
      $creatorPermission-> delete_purse = '0';
      $creatorPermission-> update_purse = '0';
      $creatorPermission-> look_purse = '1';
      $creatorPermission-> ability_purse= '0';
      $creatorPermission ->save();
      $text = "Пользователь ".$NameUser->name." был успешно добавлен в таблицу «". $NamePurse->name. "»";
      return back()->with('success', $text);
    }

}
