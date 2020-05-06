@extends('layouts.app')

@section('content')
<div class="container card">
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
        <th><a href="{{route('outlayOne',  $oneNote->id)}}">{{$oneNote-> name}}</a></th>
        <th>
          {{date('d.m.Y в g:i', strtotime($oneNote-> created_at))}}
        </th>
        <th>
          {{date('d.m.Y в g:i', strtotime($oneNote-> updated_at))}}
        </th>
      </tr>
      @endforeach
    </thead>
</table>
  <div class="d-flex justify-content-center">
    <button id="button_Add" class="btn btn-warning rounded-0"><a href="/outlay" class="text-danger">+ Создать</a></button>
  </div>
</div>
@endsection
