@extends('layouts.app')

@section('content')
<div class="container card pt-3 pb-3">
  @if (session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif
  <h3 class="pb-3">Сметы</h3>
        @forelse($data as $oneNote)
    <table id="table" class="table table-sm caption">
      <thead class="thead-dark">
        <tr>
          <th></th>
          <th>Нзвание</th>
          <th>Создана</th>
          <th>Измененна</th>
        </tr>
      </thead>
      <thead class="thead-light">
        <tr>
          <th>
            {{$loop->iteration}}
          </th>
          <th><a href="{{route('outlayOne',  $oneNote->id)}}">{{$oneNote->name}}</a></th>
          <th>
            {{date('d.m.Y в g:i', strtotime($oneNote-> created_at))}}
          </th>
          <th>
            {{date('d.m.Y в g:i',strtotime($arrayLastData[$loop->index]))}}
          </th>
          </tr>
      </thead>
    </table>
        @empty
        <p class="alert alert-danger">Здесь пока ничего нет. Попробуйте <a href="/outlay" class="alert-link">создать</a></p>
        @endforelse
  <div class="d-flex justify-content-center">
    <button id="button_Add" class="btn btn-warning"><a href="/outlay" class="text-danger">+ Создать</a></button>
  </div>
</div>
@endsection
