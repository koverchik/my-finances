@extends('layouts.app')

@section('content')
@push('scripts')
<script src="{{ asset('js/AddUsers.js')}}" defer></script>
@endpush

@section('content')
<div class="container card pt-3 pb-3">
  @if (session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif

  <h3 class="card-header">Расходы</h3>

@forelse($dataPurses as $onePurse)

    <div class="container card mt-3" id="nameOneOutlay{{$onePurse['id']}}">
      <div class="container mt-3 card-header">
        <div class="d-flex justify-content-between">
          <div>
            <p class="d-inline-flex h5"> {{$loop->iteration}}. </p>
            <a class="h3 " href="{{route('PurseView', $onePurse['id'])}}">
              {{$onePurse['name']}}
            </a>
          </div>

          <button type="button" class="btn btn-light p-0 pr-2 pl-2" data-toggle="modal" data-target="#deleteModal{{$onePurse['id']}}">&#10008;</button>

        </div>
        <div class="d-flex">
            <p class="mr-3">Создана: {{date('d.m.Y в g:i', strtotime($onePurse['created_at']))}} </p>
            <p>Изменена: {{date('d.m.Y в g:i', strtotime($onePurse['created_at']))}}</p>
        </div>
      </div>

      <div id="table" class="table table-sm caption">
        <div class="bg-info container pt-2 pb-2">
          <div class="row">
            <div class="col-2">Пользователь</div>
            <div class="col-2 text-center">Просмотр</div>
            <div class="col-2 text-center">Удаление</div>
            <div class="col-2 text-center">Редактирование</div>
            <div class="col-2 text-center">Управление</div>
            <div class="col-2 text-center"></div>
          </div>
        </div>
        <div class="container">
          @foreach($onePurse['permission'] as $discribe)
          <div class="row">
            <div class="col-2 pt-2 pb-2">
              {{$discribe['name']}}
              <input type="hidden"  name="nameId{{$discribe['user_id']}}" form="outlayPowers{{$discribe['user_id']}}" value="{{$discribe['user_id']}}">
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="view{{$discribe['user_id']}}" form="outlayPowers{{$discribe['name_purse_id']}}"  value="1"
              @if ($discribe['look_purse'] === 1)
              checked
              @endif
              >
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="delete{{$discribe['user_id']}}" form="outlayPowers{{$discribe['name_purse_id']}}" class="form-check-input position-static" value="1"
              @if ($discribe['delete_purse'] === 1)
              checked
              @endif
              >
            </div>
            <div class=" text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="update{{$discribe['user_id']}}" form="outlayPowers{{$discribe['name_purse_id']}}" class="form-check-input position-static" value="1"
              @if ($discribe['update_purse'] === 1)
              checked
              @endif
              >
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="ability{{$discribe['user_id']}}" form="outlayPowers{{$discribe['name_purse_id']}}" class="form-check-input position-static" value="1"
              @if ($discribe['ability_purse'] === 1)
              checked
              @endif
              >
            </div>
              <div class="text-center text-danger col-2 pt-2 pb-2 border-0 btn rounded-0" type="button" data-toggle="modal" data-target="#deleteName{{$discribe['user_id']}}">
                &#9003;
                <div id="deleteName{{$discribe['user_id']}}" class="modal fade"  role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Удаление пользователя</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <div class="modal-body text-dark">
                            Вы действительно хотите удалить пользователя «{{$discribe['name']}}» из таблицы «{{$onePurse['name']}}»?
                        </div>
                      <div class="modal-footer">
                        <button class="btn btn-outline-danger my-2 my-sm-0 deleteName" id="" type="submit">Удалить</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                      </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          @endforeach
        <div id="AddUsersModal{{$onePurse['id']}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Поиск</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('PurseNewUser')}}" method="POST" id="addUsers{{$onePurse['id']}}" role="search">
                <input type="hidden"  name="namePurse" form="addUsers{{$onePurse['id']}}" value="{{$onePurse['id']}}">
              {{ csrf_field() }}
                <div class="modal-body">
                    <input class="form-control mr-sm-2 searchName" type="text" autocomplete="off" name="nameUserAndEmail" form="addUsers{{$onePurse['id']}}" placeholder="Имя или E-mail">
                    <ul class="result-search-names">
                    </ul>
                </div>
              <div class="modal-footer">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" form="addUsers{{$onePurse['id']}}" disabled>Добавить</button>
                <button type="button" class="btn btn-default cancelSearch" data-dismiss="modal">Отмена</button>
              </div>
            </form>
          </div>
        </div>
      </div>


        <div class="text-center pt-2">
          <button id="add-new-user" type="button"  class="btn btn-primary rounded-0" data-toggle="modal" data-target="#AddUsersModal{{$onePurse['id']}}"> + Пользователь</button>
        </div>
        <div class="d-flex justify-content-end">
          <form method="post" id="outlayPowers{{$onePurse['id']}}" action="#">
            @csrf
          <button id="button_Add{{$onePurse['id']}}" class="btn btn-outline-primary mt-2 mb-2 text-dark">Сохранить</button>
          </form>
        </div>

        </div>
      </div>
    </div>
@endforeach
    <div class="modal fade" id="deleteModal{{$onePurse['id']}}"  role="dialog" aria-labelledby="deleteModalLabel{{$onePurse['id']}}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <h5 class="modal-title" id="deleteModalLabel{{$onePurse['id']}}">Удаление</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Вы действительно удалить таблицу?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger"><a class="text-warning text-decoration-none alert-link" href="/home/outlay/delete">Удалить</a></button>
            <button type="button" class="btn btn-secondary alert-link" data-dismiss="modal">Отмена</button>
          </div>
        </div>
      </div>
    </div>

  <div class="d-flex justify-content-center">
    <button id="button_Add" class="btn btn-warning mt-2 mb-2"><a href="/outlay" class="text-danger alert-link">+ Создать</a></button>
  </div>
</div>
@endsection
