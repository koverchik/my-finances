@extends('layouts.app')

@section('content')
<div class="container card">
  <div class="container-fluid">
      @foreach($name as $nameOne)
      <h3>{{$nameOne-> name}}</h3><h6>Дата создания: {{date('d.m.Y в g:i', strtotime($nameOne->created_at))}}</h6><h6>Изменена: {{date('d.m.Y в g:i', strtotime($nameOne->updated_at))}}</h6>
      <table id="table" class="table table-sm caption">
        <thead class="thead-dark">
          <tr>
            <th>Наименование</th>
            <th>Стоимость</th>
          </tr>
        </thead>
      @endforeach

      @foreach($data as $one)
      <thead class="thead-light">
        <tr>
          <th>{{$one->name}}</th>
          <th>{{$one->amount}}</th>
        </tr>
      </thead>
      @endforeach
      <thead>
        <tr>
          <th class="text-right"> Сумма:</th>
          <th class="bg-info">{{$sum}}</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
