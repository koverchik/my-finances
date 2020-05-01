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
                    {{ Auth::user()->name }} are logged in!

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

                @if (session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
