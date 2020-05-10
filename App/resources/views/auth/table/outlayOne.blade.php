@extends('layouts.app')

@section('content')
<div class="container card">
  <h3 id="update_button">
    &#9998;
  </h3>
  <div class="container">
    @if (session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </div>

    @endif
      @foreach($name as $nameOne)
      <div class="container row">
        <div class="col-6">
          <h3 id="name-outlay">{{$nameOne-> name}}</h3>
        </div>
        <div class="col-6">
          <h6 class="d-flex justify-content-end">Создана: {{date('d.m.Y в g:i', strtotime($nameOne->created_at))}}</h6>
          <h6 class="d-flex justify-content-end">Измененна: {{date('d.m.Y в g:i', strtotime($nameOne->updated_at))}}</h6>
        </div>
      </div>

      <table id="table" class="table table-sm caption">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Стоимость</th>
          </tr>
        </thead>
      @endforeach

      @foreach($data as $one)
      <thead class="thead-light">
        <tr>
          <th class="valueNamber">{{ $loop->iteration }}</th>
          <th class="valueName">{{$one->name}}</th>
          <th class="valueCost">{{$one->amount}}</th>
        </tr>
      </thead>
      @endforeach
      <thead>
        <tr>
          <th class="text-right" colspan="2"> Сумма:</th>
          <th class="bg-info">{{$sum}}</th>
        </tr>
      </thead>
    </table>
    <div id="button-add" class="d-none">
      <div class="d-flex justify-content-end">
        <button id="button-add-update" class="btn btn-info rounded-0" >+ Добавить</button>
      </div>
    </div>
    <div id="button-update" class="d-none">
      <form method="post" id="outlay" action="{{route('outlayUpdate', $id)}}">
        @csrf
        <button type="submit" class="btn btn-warning">Сохранить</button>
      </form>
    </div>
  </div>
</div>
@endsection
