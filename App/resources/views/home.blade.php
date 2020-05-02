@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name }}, ты уже в системе!
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
                @endif
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-6">
                      <a href="/outlay/all/{{ Auth::user()->id }}" class="row justify-content-center h3">Семеты</a>
                      <ul>
                      @foreach ($data as $el)
                        <li><a href="#">{{$el->name}}</a></li>
                      @endforeach
                    </ul>
                      <div class="row justify-content-center">
                        <button type="button" class="btn btn-warning"><a target="_blank" class="text-danger" href="/outlay">+ Добавить</a></button>
                      </div>
                    </div>
                    <div class="col-6">
                      <a href="#" class="row justify-content-center h3">Кошельки</a>
                      <div class="row justify-content-center">
                        <button type="button" class="btn btn-warning"><a href="#" class="text-danger">+ Добавить</a></button>
                      </div>
                    </div>
                  </div>
                </div>
                @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                  <li>
                    {{$error}}
                  </li>
                  @endforeach
                </div>

                @endif


            </div>
        </div>
    </div>
</div>
@endsection
