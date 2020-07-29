@extends('layouts.app')

@push('scripts')
<script src="{{ asset('js/UpdateOutlay.js')}}" defer></script>
<script src="{{ asset('js/UpdateAddOutlay.js')}}" defer></script>
@endpush

@section('content')
<div class="container card pt-3 pb-3">
  <div class="d-flex justify-content-between">
    <h3 id="update_button" >
      &#9998;
    </h3>
    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#deleteModal">
        &#10008;
    </button>
  </div>

  <div class="container pt-3">
    @if (session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    @if($errors->any())
    <div id="errors-message" class="alert alert-danger">
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
          <h6 class="d-flex justify-content-end">Измененна: {{date('d.m.Y в g:i', strtotime($lastUpdate))}}</h6>
        </div>
      </div>

      <table id="table" class="table table-sm caption">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Стоимость</th>
            <th id="empty-row" class="d-none"></th>
        </thead>
      @endforeach

      @foreach($data as $one)
      <thead class="thead-light">
        <tr>
          <th class="valueNamber">{{$loop->iteration}}</th>
          <th class="valueName">{{$one->name}}</th>
          <th class="valueCost">{{$one->amount}}</th>
          <th class="trash h4 d-none">&#128465;</th>
        </tr>
      </thead>
      @endforeach
      <thead>
        <tr>
          <th class="text-right" colspan="2"> Сумма:</th>
          <th class="bg-info" id="summ-all" colspan="2">{{$sum}}</th>
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
        <button type="submit" form="outlay" class="btn btn-warning">Сохранить</button>
      </form>
    </div>
  </div>
</div>
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
        <button type="button" class="btn btn-danger"><a class="text-warning text-decoration-none alert-link" href="{{route('outlayDelete', $id)}}">Удалить</a></button>
        <button type="button" class="btn btn-secondary alert-link" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>
@endsection
