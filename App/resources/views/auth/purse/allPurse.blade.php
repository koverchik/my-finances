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


    <div class="container card mt-3" id="nameOneOutlay">
      <div class="container mt-3 card-header">
        <div class="d-flex justify-content-between">
          <div>
            <p class="d-inline-flex h5"> </p>
            <a class="h3 " href="#">
              Имя
            </a>
          </div>

          <button type="button" class="btn btn-light p-0 pr-2 pl-2" data-toggle="modal" data-target="#">&#10008;</button>

        </div>
        <div class="d-flex">
            <p class="mr-3">Создана: </p>
            <p>Изменена: </p>
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

          <div class="row">
            <div class="col-2 pt-2 pb-2">

             <input type="hidden" form="outlayPowers" name="nameId" value="1">
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="#" form="#"  value="1">
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="#" form="#" class="form-check-input position-static" value="1">
            </div>
            <div class=" text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="update" form="outlayPowers" class="form-check-input position-static" value="1">
            </div>
            <div class="text-center col-2 pt-2 pb-2 border-bottom border-info">
              <input type="checkbox" name="ability" form="outlayPowers" class="form-check-input position-static" value="1">
            </div>
              <div class="text-center text-danger col-2 pt-2 pb-2 border-0 btn rounded-0" type="button" data-toggle="modal" data-target="#deleteName">
                &#9003;
                <div id="deleteName" class="modal fade"  role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Удаление пользователя</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <div class="modal-body text-dark">
                            Вы действительно хотите удалить пользователя «Имя» из таблицы «Таблица»?
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

        <div id="AddUsersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Поиск</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST" id="addUsers" role="search">
              {{ csrf_field() }}
                <div class="modal-body">
                    <input class="form-control mr-sm-2 searchName" type="text" autocomplete="off" name="nameUserAndEmail" form="addUsers" placeholder="Имя или E-mail">
                    <ul class="result-search-names">
                    </ul>
                </div>
              <div class="modal-footer">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" form="addUsers" disabled>Добавить</button>
                <button type="button" class="btn btn-default cancelSearch" data-dismiss="modal">Отмена</button>
              </div>
            </form>
          </div>
        </div>
      </div>

        <div class="text-center pt-2">
          <button id="add-new-user" type="button"  class="btn btn-primary rounded-0" data-toggle="modal" data-target="#AddUsersModal"> + Пользователь</button>
        </div>
        <div class="d-flex justify-content-end">
          <form method="post" id="outlayPowers" action="#">
            @csrf
          <button id="button_Add" class="btn btn-outline-primary mt-2 mb-2 text-dark">Сохранить</button>
          </form>
        </div>

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
            Вы действительно удалить таблицу?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger"><a class="text-warning text-decoration-none alert-link" href="/home/outlay//delete">Удалить</a></button>
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
