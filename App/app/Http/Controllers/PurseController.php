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
        $client = auth()->user()->id;
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
          
          return view('auth.purse.allPurse')->with(['dataPurses' => $arrayNames, 'userAllListPurse' => $client]);
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

    public function PurseDelete(Request $request)
    {

      $NameforRespons = NamePurse::find($request->idPurse);
      $name = $NameforRespons->name;
      DB::table('name_purse')->where('id', '=', $request->idPurse)->delete();
      $text = "Таблица «".$name. "» была успешно удалена";

      return back()->with('success', $text);
    }

    public function UserPurseDelete(Request $request)
    {
      if($request->ajax()){
        $userId = $request ->get('idUser');
        $purseId = $request ->get('idPurse');
        $NameUser =  User::find($userId);
        DB::table('permission')->where('user_id', '=', $userId)->where('name_purse_id', '=', $purseId)->delete();

        return response()->json(['name'=> $NameUser->name, 'userId'=> $userId, 'purseId' => $purseId]);
      }
    }

    public function PermissionPurse(Request $request,  $id)
    {
      $collectionAll = collect($request->request);
      //Получение ID
      $collectionId = $collectionAll->filter(function ($item, $key) {
                  return preg_match('/(nameId)([0-9])/', $key, $matches);
      });
      //Получение массива с полями
      $allFildId = $collectionId->map(function ($item, $key){
        $nameId = 'nameId'. $item;
        $delete = 'delete'. $item;
        $update = 'update'. $item;
        $ability = 'ability'. $item;
        $view = 'view'. $item;
        $arrayOnePermission = collect([ $key => $item, $delete=>0, $update => 0, $ability => 0, $view => 0]);
        return $arrayOnePermission;
        });
        $allFildId = $allFildId->collapse();
        $diffFild = $allFildId->diffKeys($collectionAll);
        $AllFild = $collectionAll->merge($diffFild);
        $ArrayAllFiled = $AllFild->toArray();

        foreach ($ArrayAllFiled as $key => $value) {
          $viewItem = "/(view)([0-9])/";
          $updateItem = "/(update)([0-9])/";
          $deleteItem = "/(delete)([0-9])/";
          $abilityItem = "/(ability)([0-9])/";
      if(preg_match($viewItem, $key, $matches)){
        DB::table('permission')
                      ->where('name_purse_id', $id)
                      ->where('user_id',  $matches[2])
                      ->update(['look_purse' => $value]);
             }
       if(preg_match($updateItem, $key, $matches)){
         DB::table('permission')
                       ->where('name_purse_id', $id)
                       ->where('user_id',  $matches[2])
                       ->update(['update_purse' => $value]);
              }
        if(preg_match($deleteItem, $key, $matches)){
          DB::table('permission')
                        ->where('name_purse_id', $id)
                        ->where('user_id',  $matches[2])
                        ->update(['delete_purse' => $value]);
               }
       if(preg_match($abilityItem, $key, $matches)){
         DB::table('permission')
                       ->where('name_purse_id', $id)
                       ->where('user_id',  $matches[2])
                       ->update(['ability_purse' => $value]);
              }
         }

       $nameOutlay =  new NamePurse();
       $id_owner = $nameOutlay -> where('id', $id)->pluck('name');

       $title = 'Изменения в кошелке «'. $id_owner[0] .'» сохранены';

      return back()->with('success', $title);
    }

}
