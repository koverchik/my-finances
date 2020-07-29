@extends('layouts.app')

@push('scripts')
<script src="{{ asset('js/CreatePurse.js')}}" defer></script>
@endpush

@section('content')
<div class="container-fluid">
  <div class="h1 pt-3 container-fluid">
    Домашний бюджет
  </div>
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
              <th class="bg-info" colspan="2">0.0</th>
            </tr>
          </tbody>
        
          <thead id="valuePurse">
            <tr>
              <th id="lastLineNumber">1</th>
              <th><input id="dataNow" type="date" class="form-control"></th>
              <th><input type="text" id="nameRow" class="form-control" /></th>
              <th>
                <select size="1" name="users[]" id="nameUsers" class="form-control">
                  <option selected value="Алексей">
                    Алексей
                  </option>
                  <option  value="Саша">
                    Саша
                  </option>
                </select>
              </th>
              <th><input type="text" id="cost" class="form-control"/></th>
              <th class="h4">
                &#128465;
              </th>
            </tr>
          </thead>
          
        </table>
          <div class=" d-flex justify-content-between">
            <div class="btn bg-success rounded-0 text-light col-3">
              + Погашение
            </div>
            <div class="btn btn-info rounded-0 text-light col-3">
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
              Алексей 
            </th>
            <th>
              50%
            </th>
            <th>
              0.2
            </th>
          </tr>       
        </thead>
        <thead class="thead-light">
          <tr>
            <th>
              Саша
            </th>
            <th>
              50%
            </th>
            <th>
              0.3
            </th>
          </tr>       
        </thead>
      </table>
      <div class="btn btn-warning rounded-0">
        + Пользователь
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
              Саша
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