<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\NameOutlayRequest;
use App\Http\Requests\SaveOutlayRequest;
use App\NameOutlay;
use App\RowOutlay;
use App\User;


class OutlaySaveController extends Controller
{
  public function saveOutlay(NameOutlayRequest $req)
  {
      $nameOutlay =  new NameOutlay();
      $id_user = $req->user();
      $id = $id_user['id'];
      $nameOutlay -> name = $req->input('title');
      $nameOutlay -> user_id = $id;
      $nameOutlay -> save();
      $array_input = $req->input();
      $id_query = $nameOutlay->id;


      foreach ($array_input as $input => $value) {
        if (preg_match('/(name)[0-9]/', $input)){
            $RowOutlay =  new RowOutlay();
            preg_match('/[0-9]/', $input, $matches);
            $name = "name".$matches[0];
            $amount = "size".$matches[0];
            $RowOutlay -> name = $req->input($name);
            $RowOutlay -> amount = $req->input($amount);
            $RowOutlay -> name_outlay_id = $nameOutlay -> id;
            $RowOutlay -> save();
          }
      }

      DB::table('powers')->insert(
        ['name_outlay_id' => $id_query, 'user_id' => $id, 'delete_outlay' => 1, 'update_outlay' => 1, 'look_outlay' => 1, 'ability_outlay' => 1]);

      $title = 'Смета с названием «'. $req->input('title').'» сохранена';
      return redirect()->route('home')->with('success', $title);
    }

    public function allOutlay(Request $request)
    {
      $users = DB::table('powers')->where('user_id', auth()->user()->id)->get('name_outlay_id');

      $arrayNames = $users->flatMap(function ($item) {
        $arrayName = DB::table('name_outlay')-> where('id', $item->name_outlay_id)->get();
        return $arrayName;
            });
      $itemOutlay = $users->flatMap(function ($item) {
        $itemOutlay  = DB::table('powers')
        ->where('name_outlay_id', $item->name_outlay_id)
        ->join('users', 'powers.user_id', '=', 'users.id')
        ->select('users.id', 'users.name', 'users.email','powers.id AS id_outlay', 'powers.user_id', 'powers.name_outlay_id','powers.delete_outlay','powers.update_outlay', 'powers.look_outlay', 'powers.ability_outlay' )
        ->get();
        return $itemOutlay;
            });
      $powerUser = $itemOutlay->filter(function ($item, $key) {
                return $item->user_id == auth()->user()->id;
            });

        $arrayLastData = $users->map(function ($item, $key) {
        $rowUpdate =  new RowOutlay();
        $lastUpdate = $rowUpdate->where('name_outlay_id', $item-> name_outlay_id)->get('updated_at')->max();
        preg_match('/([0-9]+\-[0-9]+\-[0-9]+)T([0-9]+:[0-9]+:[0-9]+)/', $lastUpdate, $matches);
        $matches = $matches[1] . " ". $matches[2];
        return $matches;
        });

      return view('auth.table.outlaySavedAll', ['arrayLastData' => $arrayLastData, 'arrayNames' => $arrayNames, 'itemOutlay'=>$itemOutlay,'powerUser'=>$powerUser]);
    }

    public function outlayOne($id)
    {

        if (Gate::allows('watchOutlay', $id)) {
        $nameOne =  new NameOutlay();
        $rowOutlay =  new RowOutlay();
        $collection = $rowOutlay-> where('name_outlay_id', $id)->get();
        $sum = $collection->pluck('amount')->sum();
        $rowUpdate =  new RowOutlay();
        $lastUpdate = $rowUpdate->where('name_outlay_id', $id)->get('updated_at')->max();
        preg_match('/([0-9]+\-[0-9]+\-[0-9]+)T([0-9]+:[0-9]+:[0-9]+)/', $lastUpdate, $matches);
        $matches = $matches[1] . " ". $matches[2];
        return view('auth.table.outlayOne',['data' => $rowOutlay-> where('name_outlay_id', $id)->get(),'name' => $nameOne-> where('id', $id)->get(),'sum' => $sum,'id' =>$id,'lastUpdate' => $matches]);
      } else {
        return view('auth.table.accessDenied');
      }
      exit;
    }

    public function outlayUpdate(SaveOutlayRequest $req, $id)
    {
    if(Gate::allows('updateOutlay', $id)){
      $nameOne =  new NameOutlay();
      $collectionName = collect($array_input = $req->input());
      $filteredCollectionName = $collectionName->filter(function ($value, $key) {
        return preg_match('/(name)[0-9]/', $key);})->keys()->flip()->map(function ($item, $key) {
          return $item = 'required|string|max:150|min:2';
        });
        $filteredCollectionSize = $collectionName->filter(function ($value, $key) {
          return preg_match('/(size)[0-9]/', $key);})->keys()->flip()->map(function ($item, $key) {
            return $item = 'required|numeric';
          });

          $multipliedName = $filteredCollectionName->toArray();
          $multipliedSize = $filteredCollectionSize->toArray();
          $validatedData = $req->validate($multipliedName);
          $validatedSize = $req->validate($multipliedSize);

          $name = $nameOne -> find($id);
          $name -> name = $req->input('title');
          $name -> save();

          $countImput = $filteredCollectionName->count();

          $rowOutlay =  new RowOutlay();
          $rows = collect($rowOutlay->where('name_outlay_id', $id)->get());

          $countRows = $rows->count();

          if($countImput<$countRows){
            $slice = $rows->slice($countImput);
            $rows = $rows->slice(0, $countImput);

            foreach($slice as $row => $value){
              $rowOutlay->where('id', '=', $value->id)->delete();
            }

            $i = 0;
            foreach ($array_input as $input => $value) {
              if (preg_match('/(name)[0-9]/', $input)){
                preg_match('/[0-9]/', $input, $matches);
                $name = "name".$matches[0];
                $amount = "size".$matches[0];
                $rows[$i] -> name = $req->input($name);
                $rows[$i] -> amount = $req->input($amount);
                $rows[$i] -> name_outlay_id = $id;
                $rows[$i] -> save();
                $i++;
              }
            }
          }
          if($countImput>$countRows){
            $spliceCollectionName = $filteredCollectionName->splice($countRows);
            foreach ($spliceCollectionName as $input => $value){
              $RowOutlay =  new RowOutlay();
              preg_match('/[0-9]/', $input, $matches);
              $name = "name".$matches[0];
              $amount = "size".$matches[0];
              $RowOutlay -> name = $req->input($name);
              $RowOutlay -> amount = $req->input($amount);
              $RowOutlay -> name_outlay_id = $id;
              $RowOutlay -> save();
            }
            $array_input = $filteredCollectionName->slice(0, $countRows);
            $i = 0;
            foreach ($array_input as $input => $value) {
              if (preg_match('/(name)[0-9]/', $input)){
                preg_match('/[0-9]/', $input, $matches);
                $name = "name".$matches[0];
                $amount = "size".$matches[0];
                $rows[$i] -> name = $req->input($name);
                $rows[$i] -> amount = $req->input($amount);
                $rows[$i] -> name_outlay_id = $id;
                $rows[$i] -> save();
                $i++;
              }
            }
          }
          if($countImput == $countRows){
            $i = 0;

            foreach ($filteredCollectionName as $input => $value) {
              if (preg_match('/(name)[0-9]/', $input)){
                preg_match('/[0-9]/', $input, $matches);
                $name = "name".$matches[0];
                $amount = "size".$matches[0];
                $rows[$i]-> name = $req->input($name);
                $rows[$i] -> amount = $req->input($amount);
                $rows[$i] -> name_outlay_id =$id;
                $rows[$i] -> save();
                $i++;
              }
            }
          };
          $rowUpdate =  new RowOutlay();
          $lastUpdate = $rowUpdate->where('name_outlay_id', $id)->get('updated_at')->max();
          preg_match('/([0-9]+\-[0-9]+\-[0-9]+)T([0-9]+:[0-9]+:[0-9]+)/', $lastUpdate, $matches);
          $matches = $matches[1] . " ". $matches[2];
          $collection = $rowOutlay-> where('name_outlay_id', $id)->get();
          $sum = $collection->pluck('amount')->sum();
          $title = 'Смета с названием «'. $req->input('title').'» сохранена';
          return redirect()->route('outlayOne', $id)->with(['data' => $rowOutlay-> where('name_outlay_id', $id)->get(),'name' => $nameOne-> where('id', $id)->get(), 'lastUpdate' => $lastUpdate,'sum' => $sum, 'success' => $title, 'id' =>$id]);
        }else{
          return view('auth.table.accessDeniedUpdate');
        }
      }

      public function outlayDelete($id){
        $nameOutlay =  new NameOutlay();

        if (Gate::allows('deleteOutlay', $id)){
          DB::table('powers')->where('name_outlay_id', $id)->delete();
          $name = $nameOutlay-> where('id', '=', $id)->get('name');
          $nameOutlay->where('id', '=', $id)->delete();
          $title = 'Смета с названием «'. $name[0]['name'].'» удалена';
          return redirect()-> route('outlays')->with('success', $title);
        }else{
          return view('auth.table.accessDeviedDelete');
        }
      }

      public function outlayPowers(Request $reg, $id){

      $collectionAll = collect($reg->request);

      $collectionId = $collectionAll->filter(function ($item, $key) {
                  return preg_match('/(nameId)([0-9])/', $key, $matches);
      });

        function updateDataPowers($collectionAll, $collectionId, $id){

          $viewItem = "/(view)(".$collectionId.")/";
           if(preg_match($viewItem, $collectionAll, $matches)){
             DB::table('powers')
                           ->where('name_outlay_id', $id)
                           ->where('user_id', $collectionId)
                           ->update(['look_outlay' => 1]);
                  }else{
                    DB::table('powers')
                                  ->where('name_outlay_id', $id)
                                  ->where('user_id', $collectionId)
                                  ->update(['look_outlay' => 0]);
                  }

           $updateItem = "/(update)(".$collectionId.")/";
           if(preg_match($updateItem, $collectionAll, $matches)){
             DB::table('powers')
                           ->where('name_outlay_id', $id)
                           ->where('user_id', $collectionId)
                           ->update(['update_outlay' => 1]);
                  }else{
                    DB::table('powers')
                                  ->where('name_outlay_id', $id)
                                  ->where('user_id', $collectionId)
                                  ->update(['update_outlay' => 0]);
                  }


          $deleteItem = "/(delete)(".$collectionId.")/";
          if(preg_match($deleteItem, $collectionAll, $matches)){
            DB::table('powers')
                          ->where('name_outlay_id', $id)
                          ->where('user_id', $collectionId)
                          ->update(['delete_outlay' => 1]);
                 }else{
                   DB::table('powers')
                                 ->where('name_outlay_id', $id)
                                 ->where('user_id', $collectionId)
                                 ->update(['delete_outlay' => 0]);
                 }

           $abilityItem = "/(ability)(".$collectionId.")/";
            if(preg_match($abilityItem, $collectionAll, $matches)){
              DB::table('powers')
                            ->where('name_outlay_id', $id)
                            ->where('user_id', $collectionId)
                            ->update(['ability_outlay' => 1]);
                   }else{
                     DB::table('powers')
                                   ->where('name_outlay_id', $id)
                                   ->where('user_id', $collectionId)
                                   ->update(['ability_outlay' => 0]);
                   }
        }

        foreach ($collectionId as &$value) {
          updateDataPowers($collectionAll, $value, $id);
        }
        $nameOutlay =  new NameOutlay();
        $id_owner = $nameOutlay -> where('id', $id)->pluck('name');

        $title = 'Изменения полномочй в смете «'. $id_owner[0] .'» сохранены';

        return redirect()-> route('outlays')->with('success', $title);
      }

      public function searchName(Request $reg){

        if($reg->ajax()){
        $query = $reg->get('data');
          if($query != ''){
           $data = DB::table('users')
             ->where('name', 'like', '%'.$query.'%')
             ->orWhere('email', 'like', '%'.$query.'%')
             ->orderBy('name', 'desc')
             ->get();

            }
          else
          {
           $data = DB::table('users')
             ->orderBy('id', 'desc')
             ->get();
          }
        return response()->json($data);
      }

    }

    public function saveNameUser(Request $request, $id){

      if (Gate::allows('abilityOutlay', $id)){
        $data = DB::table('powers')
        ->where('user_id', '=', '$request->idUserInDB')
        ->where('name_outlay_id', '=', $id)
        ->get();
        if($data->isEmpty()){
          DB::table('powers')->insertOrIgnore(
            ['name_outlay_id' => $id, 'user_id' => $request->idUserInDB]);
          }

          $title = 'Пользователь  «'. $request->nameUserAndEmail .'» добавлен.';

          return redirect()-> route('outlays')->with('success', $title);
        }else{
        return view('auth.table.accessDeviedAbility');
              }
    }

    public function deleteName(Request $reg)
    {

        if($reg->ajax($reg)){
          $name_outlay_id = DB::table('powers')->where('id',  $reg->data)->first('name_outlay_id');
          $queryData = DB::table('name_outlay')->where('id', $name_outlay_id->name_outlay_id)->first('name');
          $query = DB::table('powers')->where('id', $reg->data)->delete();
          return response()->json($queryData);


      }
    }
}
