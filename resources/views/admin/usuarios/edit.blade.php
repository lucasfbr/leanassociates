@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('admin.usuarios')}}">Usuários</a></li>
        <li class="breadcrumb-item">Editar</li>
    </ol>


    <div class="row justify-content-md-center mt-5 mb-5">

        <div class="col-xs-12 col-md-8">
            @if (session('sucesso'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('sucesso') }}
                </div>
            @elseif(session('erro'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('erro') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header personal">
                    <div class="h5 text-default">Editar Usuário</div>
                </div>

                <div class="card-body">
                    <form id="cadUsario" method="POST" action='{{url("admin/usuarios/update/$user->id")}}' class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="text-default">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required autofocus>
                            <div class="valid-feedback {{$errors->has('name') ? 'invalid-feedback' : ''}}">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-default">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" required autofocus>
                            <div class="valid-feedback {{$errors->has('email') ? 'invalid-feedback' : ''}}">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="text-default">Permissão</label>
                            <select class="custom-select" id="role" name="role" required>
                                <option value="" selected>Selecione</option>
                                <option value="0" @if($user->role == 0) selected @endif>Admin</option>
                                <option value="1" @if($user->role == 1) selected @endif>Consultor</option>
                                <option value="2" @if($user->role == 2) selected @endif>Cliente</option>
                            </select>
                            <div class="valid-feedback {{$errors->has('role') ? 'invalid-feedback' : ''}}">{{ $errors->first('role') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-default">Senha</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                            <div class="valid-feedback {{$errors->has('password') ? 'invalid-feedback' : ''}}">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="text-default">Confirme a senha</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                        </div>

                        <button type="submit" class="btn btn-secondary">Editar</button>

                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection
