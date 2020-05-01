@extends('layouts.app')

@section('content')
  <div class="container">
      <h2>Смета</h2>
      <table id="table" class="table table-sm caption">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Название</th>
            <th>Сумма</th>
          </tr>
        </thead>
    </table>
    <table class="table table-sm caption">
      <thead>
        <tr>
          <td colspan="2" class="text-right">Итоговая сумма:</td>
          <td id="sumAValues" class="bg-info">0</td>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td>
              <input id="name_cost" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Молоко">
              <small id="name_cost" class="form-text text-muted">Напишите название</small>
            </td>
            <td>
              <input id="size_cost"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="2.34">
              <small id="size_cost" class="form-text text-muted">Введите значение</small>
            </td>
          </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
      <button id="button_Add" class="btn btn-info rounded-0">+ Добавить</button>
    </div>
    @if (!Auth::check())
        <div class="row justify-content-md-center">
            Чтобы сохранить смету<p><a href="/register" class="badge badge-light">зарегистрируйтесь</a></p> или <p><a href="/login" class="badge badge-light">войдите</a></p> в систему.
        </div>
        @else
        @if($errors->any())

        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          <li>
            {{$error}}
          </li>
          @endforeach
        </div>

        @endif
        <form action="{{route('outlaySave')}}" method="post" class="container-fluid" id="outlay">
          @csrf
          <div class="col-3">
            <input class="form-control" name="title" type="text" placeholder="Название сметы" form="outlay">
          </div>
          <div class="row justify-content-md-center">
            <button type="submit" class="btn btn-success rounded-0">Сохранить смету</button>
          </div>
        </form>
      @endif
  </div>


@endsection
