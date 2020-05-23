@extends('layouts.app')

@section('content')
<div class="container card pt-3 pb-3">
  <h3>Сметы</h3>
  <table id="table" class="table table-sm caption">
    <thead class="thead-dark">
      <tr>
        <th>Нзвание</th>
        <th>Создана</th>
        <th>Измененна</th>
      </tr>
    </thead>
    <thead class="thead-light">
       @foreach($data as $oneNote)
      <tr>
        <th><a href="{{route('outlayOne',  $oneNote->id)}}">{{$oneNote->name}}</a></th>
        <th>
          {{date('d.m.Y в g:i', strtotime($oneNote-> created_at))}}
        </th>
        <th>
          {{date('d.m.Y в g:i',strtotime($arrayLastData[$loop->index]))}}
        </th>
        @endforeach
      </tr>
    </thead>
</table>
  <div class="d-flex justify-content-center">
    <button id="button_Add" class="btn btn-warning"><a href="/outlay" class="text-danger">+ Создать</a></button>
  </div>
</div>
@endsection
