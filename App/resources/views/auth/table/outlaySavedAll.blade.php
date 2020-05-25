@extends('layouts.app')

@section('content')
<div class="container card pt-3 pb-3">
  @if (session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif
  <h3 class="card-header">Сметы</h3>
        @forelse($data as $oneNote)
    <table id="table" class="table table-sm caption">
      <thead class="bg-info">
        <tr>
          <th></th>
          <th>Название</th>
          <th>Создана</th>
          <th>Измененна</th>
          <th></th>
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
          <th><div class="d-flex justify-content-end"><button type="button" class="btn btn-light p-0 pr-2 pl-2" data-toggle="modal" data-target="#deleteModal">&#10008;</button>
          </div></th>
          </tr>
      </thead>
    </table>
    <div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <h5 class="modal-title" id="deleteModalLabel">Удаление</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Вы действительно хотите удалить таблицу?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger"><a class="text-warning text-decoration-none alert-link" href="/home/outlay/{{$oneNote->id}}/delete">Удалить</a></button>
            <button type="button" class="btn btn-secondary alert-link" data-dismiss="modal">Отмена</button>
          </div>
        </div>
      </div>
    </div>
        @empty
        <p class="alert alert-danger">Здесь пока ничего нет. Попробуйте <a href="/outlay" class="alert-link">создать</a></p>
        @endforelse
  <div class="d-flex justify-content-center">
    <button id="button_Add" class="btn btn-warning"><a href="/outlay" class="text-danger alert-link">+ Создать</a></button>
  </div>
</div>


@endsection
