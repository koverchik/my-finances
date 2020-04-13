@extends('layouts.app')

@section('content')
  <div class="container">
      <h2>Смета</h2>
      <table class="table table-sm caption">
      <thead class="thead-dark">
        <tr>
          <th>Дата</th>
          <th>Название</th>
          <th>Сумма</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>data</td>
          <td>data</td>
          <td>data</td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td colspan="2" class="text-right">Итоговая сумма:</td>
          <td class="bg-info">Сумма</td>
        </tr>
      </tbody>
    </table>
    <div class="d-flex justify-content-end">
      <button class="btn btn-info rounded-0">+ Добавить</button>
    </div>
  </div>
@endsection
