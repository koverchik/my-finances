@extends('layouts.app')

@section('content')
<div class="container card">
  <h3>Сметы</h3>
  @foreach($data as $oneNote)
    <div>
      <h4>{{$oneNote-> name}}</h4>
      <p>
        Создана:  {{date('d.m.Y в g:i', strtotime($oneNote-> created_at))}}
      </p>
      <p>
        Изменена: {{date('d.m.Y в g:i', strtotime($oneNote-> updated_at))}}
      </p>
    </div>
  @endforeach
</div>
@endsection
