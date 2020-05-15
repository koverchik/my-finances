<?php

namespace App\Http\Controllers;
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

      $title = 'Смета с названием «'. $req->input('title').'» сохранена';
      return redirect()-> route('home')->with('success', $title);
    }

    public function allOutlay(Request $request)
    {
      $namesOutlay =  new NameOutlay();
      $userId = auth()->user()->id;
      return view('auth.table.saveOutlay', ['data' => $namesOutlay -> where('user_id', $userId)->get()]);
    }

    public function outlayOne($id)
    {
    $nameOne =  new NameOutlay();
    $rowOutlay =  new RowOutlay();
    $collection = $rowOutlay-> where('name_outlay_id', $id)->get();
    $sum = $collection->pluck('amount')->sum();
    return view('auth.table.outlayOne',['data' => $rowOutlay-> where('name_outlay_id', $id)->get(),'name' => $nameOne-> where('id', $id)->get(),'sum' => $sum,'id' =>$id]);
    }

    public function outlayUpdate(SaveOutlayRequest $req, $id)
    {
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
        $nameOne =  new NameOutlay();
        $name = $nameOne -> find($id);
        $name -> name = $req->input('title');
        $name -> save();

        $countImput = $filteredCollectionName->count();

        $rowOutlay =  new RowOutlay();
        $rows = collect($rowOutlay->where('name_outlay_id', $id)->get());
        $countRows = $rows->count();
        $i = 0;
        foreach ($rows as $row => $value){
          $name = "name".$i;
          $amount = "size".$i;
          $value -> name = $array_input[$name];
          $value -> amount = $array_input[$amount];
          $value -> save();
          $i++;}

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
        }
        $collection = $rowOutlay-> where('name_outlay_id', $id)->get();
        $sum = $collection->pluck('amount')->sum();
        $title = 'Смета с названием «'. $req->input('title').'» сохранена';
        return redirect()-> route('outlayOne', $id)->with(['data' => $rowOutlay-> where('name_outlay_id', $id)->get(),'name' => $nameOne-> where('id', $id)->get(),'sum' => $sum, 'success' => $title, 'id' =>$id]);
      }
    }
