@extends('layouts.app')

@push('scripts')
<script src="{{ asset('js/CreatePurse.js')}}" defer></script>
@endpush

@section('content')
<div class="container-fluid">
  <div class="h1 pt-3 container-fluid">
    {{$name}}
  </div>
   <input type="hidden" id="idPurse" value="{{$idPurse}}">
<div class="container-fluid row">
  <div class="col-8">

        <table id="tablePurse" class="table table-sm caption">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Дата</th>
              <th>Название</th>
              <th>Пользователь</th>
              <th>Сумма</th>
              <th> </th>
            </tr>
          </thead>
          <tbody id="dataPurse">

          </tbody>
          <tbody >
            <tr>
              <th class="text-right" colspan="4"> Сумма:</th>
              <th class="bg-info" colspan="2" id="countValue">0.0</th>
            </tr>
          </tbody>

          <thead id="valuePurse" data-toggle="tooltip" data-placement="bottom" title="Что-то пошло не так, попробуйте перезагрузить старницу">
            <tr>
              <th id="lastLineNumber" class="namberRow">1</th>
              <th><input id="dataNow" type="date" class="form-control"></th>
              <th><input type="text" id="nameRow" data-toggle="tooltip" data-placement="bottom" title="Название не больше 100 символов"  class="form-control" /></th>
              <th>
                <select size="1" name="users[]" id="nameUsers" class="form-control">
                  <option selected value="{{$userId}}">
                    {{$nameUser}}
                  </option>
                </select>
              </th>
              <th colspan="2"><input type="text" data-toggle="tooltip" data-placement="bottom" id="cost" class="form-control" title="Введите цифровое значение"/></th>

            </tr>
          </thead>

        </table>
          <div class="pt-3 d-flex justify-content-between">
            <div class="btn bg-success rounded-0 text-light col-3">
              + Погашение
            </div>
            <div id="wasteNewRow" class="btn btn-info rounded-0 text-light col-3">
              + Трата
            </div>
          </div>
        </div>

    <div class="col-4">
      <table class="table table-sm caption">
        <thead class="thead-dark">
          <tr>
            <th>

            </th>
            <th>
              Вклад
            </th>
            <th>
              Сумма
            </th>
          </tr>
        </thead>
        <thead class="thead-light">
          <tr>
            <th>
            {{$nameUser}}
            </th>
            <th>
              100%
            </th>
            <th>
              0.0
            </th>
          </tr>
        </thead>

      </table>
      <div class="btn btn-warning rounded-0">
        + Участник
      </div>
      <div class="h3 pt-3">
        Дебиторка
      </div>
      <table class="table table-sm caption">
        <thead class="thead-dark">
          <tr>
            <th>
              Участники
            </th>
            <th>
              {{$nameUser}}
            </th>
          </tr>
        </thead>
        <thead class="thead-light">
          <tr>
            <th>
              Алексей
            </th>
            <th>
              0.2
            </th>
          </tr>
        </thead>
      </table>
    </div>

</div>
</div>
@endsection
