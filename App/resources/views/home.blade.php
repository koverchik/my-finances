@extends('layouts.app')
@push('scripts')
<script src="{{ asset('js/mainPage.js')}}" defer></script>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pb-3">
                <div class="card-header">Мой аккаунт</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status')}}
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
                      <a href="{{route('outlays')}}" class="row justify-content-center h3">Семеты</a>
                      <ul class="list-group pt-3 pb-3">
                      @foreach ($data as $el)
                        <li class="list-group-item"><a href="{{route('outlayOne', $el->id)}}">{{$el->name}}</a></li>
                      @endforeach
                    </ul>
                      <div class="row justify-content-center">
                        <button type="button" class="btn btn-warning"><a target="_blank" class="text-danger alert-link text-decoration-none" href="/outlay">+ Добавить</a></button>
                      </div>
                    </div>
                    <div class="col-6">
                      <a href="#" class="row justify-content-center h3">Расходы</a>
                      <div class="row justify-content-center">
                        <button type="button" class="btn btn-warning text-danger alert-link text-decoration-none" data-toggle="modal" data-target="#createPuse">+ Добавить</button>
                      </div>
                      <div class="modal" tabindex="-1" id="createPuse" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Создание</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @if($errors->any())
                            <div class="alert alert-danger mr-3 ml-3 mt-3 mb-0" id="modalPurse">
                              @foreach($errors->all() as $error)
                              <li>
                                {{$error}}
                              </li>
                              @endforeach
                            </div>
                            @endif

                            <form action="{{route('newPurse')}}" method="post" id="newPurse" >
                                @csrf
                              <div class="modal-body">
                                <input type="text" class="form-control" placeholder="Расходы" name="createNamePurse" form="newPurse"/ >
                                <small class="form-text text-muted">Придумате название</small>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                              <button class="btn btn-success" type="submit"  form="newPurse" type="button">Создать </button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
