@extends('layouts.app')

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

  <h3 class="card-header">Сметы</h3>

        @forelse($arrayNames as $oneNote)
    <div class="container card mt-3" id="nameOneOutlay{{$oneNote->id}}">
      <div class="container mt-3 card-header">
        <div class="d-flex justify-content-between">
          <div>
            <p class="d-inline-flex h5">{{$loop->iteration}}. </p>
            <a class="h3 " href="{{route('outlayOne', $oneNote->id )}}">
              {{$oneNote->name}}
            </a>
          </div>
          <button type="button" class="btn btn-light p-0 pr-2 pl-2" data-toggle="modal" data-target="#deleteModal{{$loop->iteration}}">&#10008;</button>
        </div>
        <div class="d-flex">
            <p class="mr-3">Создана: {{date('d.m.Y в g:i', strtotime($oneNote->created_at))}}</p>
            <p>Изменена: {{date('d.m.Y в g:i',strtotime($arrayLastData[$loop->index]))}}</p>
        </div>
      </div>

      <div id="table" class="table table-sm caption">
        <div class="bg-info container pt-2 pb-2">
          <div class="row">
            <div class="col-4">Пользователь</div>
            <div class="col-2 text-center">Просмотр</div>
            <div class="col-2 text-center">Удаление</div>
            <div class="col-2 text-center">Редактирование</div>
            <div class="col-2 text-center">Управление</div>
          </div>
        </div>
        <div class="container">
        @foreach($itemOutlay as $discribe)
          @if ($oneNote->id === $discribe->name_outlay_id)
          <div class="row
           @if ($discribe->user_id === $oneNote->user_id)
           bg-light
           @endif
           ">
            <div class="col-4 pt-2 pb-2">
            {{$discribe->name}}

             <input type="hidden" form="outlayPowers{{$oneNote->id}}" name="nameId{{$discribe->user_id}}" value="{{$discribe->id}}">
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="view{{$discribe->id}}" form="outlayPowers{{$oneNote->id}}"  value="1"
              @if ($discribe->ability_outlay != 1||$discribe->user_id === $oneNote->user_id)
              readonly
              @endif
              @if ($discribe->look_outlay === 1)
              checked
              @endif
              >
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="delete{{$discribe->id}}" form="outlayPowers{{$oneNote->id}}" class="form-check-input position-static" value="1"
              @if ($discribe->delete_outlay === 1)
              checked
              @endif
              @if ($discribe->ability_outlay != 1||$discribe->user_id === $oneNote->user_id)
              readonly
              @endif
               >
            </div>
            <div class=" text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="update{{$discribe->id}}" form="outlayPowers{{$oneNote->id}}" class="form-check-input position-static" value="1"
              @if ($discribe->ability_outlay != 1|| $discribe->user_id === $oneNote->user_id)
              readonly
              @endif
              @if ($discribe->update_outlay  === 1)
              checked
              @endif
              >
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="ability{{$discribe->id}}" form="outlayPowers{{$oneNote->id}}" class="form-check-input position-static" value="1"
              @if ($discribe->ability_outlay != 1|| $discribe->user_id === $oneNote->user_id)
              readonly
              @endif
              @if ($discribe->ability_outlay  === 1)
              checked
              @endif
              >
            </div>
          </div>
            @endif

        @endforeach

        @if ($discribe->ability_outlay === 1)
        <div id="AddUsersModal{{$oneNote->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Поиск</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('searchName') }}" method="POST" id="addUsers" role="search">
              {{ csrf_field() }}
                <div class="modal-body">
                    <input class="form-control mr-sm-2 searchName" type="text" autocomplete="off" form="addUsers" placeholder="Имя или E-mail">
                    <ul class="result-search-names">
                    </ul>
                </div>
              <div class="modal-footer">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" form="addUsers">Добавить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
              </div>
            </form>
          </div>
        </div>
      </div>

        <div class="text-center pt-2">
          <button id="add-new-user" type="button"  class="btn btn-primary rounded-0" data-toggle="modal" data-target="#AddUsersModal{{$oneNote->id}}"> + Пользователь</button>
        </div>
        <div class="d-flex justify-content-end">
          <form method="post" id="outlayPowers{{$oneNote->id}}" action="{{route('outlayPowers', $oneNote->id)}}">
            @csrf
          <button id="button_Add" class="btn btn-outline-primary mt-2 mb-2 text-dark">Сохранить</button>
          </form>
        </div>
        @endif

        </div>
      </div>
    </div>

    <div class="modal fade" id="deleteModal{{$loop->iteration}}"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header alert alert-danger">
            <h5 class="modal-title" id="deleteModalLabel">Удаление</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Вы действительно удалить таблицу?
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
    <button id="button_Add" class="btn btn-warning mt-2 mb-2"><a href="/outlay" class="text-danger alert-link">+ Создать новую</a></button>
  </div>
</div>


@endsection
