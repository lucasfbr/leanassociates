@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Perfil do usuário</li>
    </ol>


    <div class="row justify-content-md-center mt-5 mb-5">

        <div class="col-xs-12 col-md-10">
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
                    <div class="h5 text-default">Atualize seu perfil</div>
                </div>

                <div class="card-body">
                    <form id="perfil" method="POST" action='{{url("admin/profile/update/$user->id")}}' class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate
                          enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-row">
                            <div class="col-md-2 mb-3">
                                <img src="{{ $user->profile->foto ? asset('img/'.$user->profile->foto) : asset('img/user.png')  }}" alt="..." class="img-thumbnail">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="foto" class="text-default">Foto</label>
                                    <input type="file" class="form-control-file" name="foto" id="foto">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="text-default">Nome</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('name') ? 'invalid-feedback' : ''}}">{{ $errors->first('name') }}</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="email" class="text-default">E-mail</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('email') ? 'invalid-feedback' : ''}}">{{ $errors->first('email') }}</div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="role" class="text-default">Permissão</label>
                                    <select class="custom-select" id="role" name="role" required>
                                        <option value="" selected>Selecione</option>
                                        <option value="0" @if($user->role == 0) selected @endif>Admin</option>
                                        <option value="1" @if($user->role == 1) selected @endif>Consultor</option>
                                        <option value="2" @if($user->role == 2) selected @endif>Cliente</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="name" class="text-default">Empresa</label>
                                    <input type="text" class="form-control" name="empresa" id="empresa" value="{{ $user->profile->empresa }}">

                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="cnpj" class="text-default">CNPJ</label>
                                    <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $user->profile->cnpj }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('cnpj') ? 'invalid-feedback' : ''}}">{{ $errors->first('cnpj') }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="fone" class="text-default">Fone</label>
                                    <input type="text" class="form-control" name="fone" id="fone" value="{{ $user->profile->fone }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('fone') ? 'invalid-feedback' : ''}}">{{ $errors->first('fone') }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="whats" class="text-default">Whatsapp</label>
                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $user->profile->whatsapp }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('whatsapp') ? 'invalid-feedback' : ''}}">{{ $errors->first('whatsapp') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="site" class="text-default">Site</label>
                                    <input type="text" class="form-control" name="site" id="site" value="{{ $user->profile->site }}">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="interesse" class="text-default">Áreas de interesse</label>
                                    <input type="text" class="form-control" name="interesse" id="interesse" value="{{ $user->profile->interesse }}">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="cep" class="text-default">Cep</label>
                                    <input type="text" class="form-control" name="cep" id="cep" value="{{ $user->profile->cep }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="uf" class="text-default">UF</label>
                                    <input type="text" class="form-control" name="uf" id="uf" value="{{ $user->profile->uf }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('uf') ? 'invalid-feedback' : ''}}">{{ $errors->first('uf') }}</div>
                                </div>
                            </div>

                            <div class="col-md-5 mb-3">
                                <div class="form-group">
                                    <label for="cidade" class="text-default">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $user->profile->cidade }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('cidade') ? 'invalid-feedback' : ''}}">{{ $errors->first('cidade') }}</div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <div class="form-group">
                                    <label for="bairro" class="text-default">Bairro</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $user->profile->bairro }}" required autofocus>
                                    <div class="valid-feedback {{$errors->has('bairro') ? 'invalid-feedback' : ''}}">{{ $errors->first('bairro') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                                        <label class="text-default" for="disabledFieldsetCheck">
                                            Deseja atualizar a senha?
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="password" class="text-default">Senha</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                        <div class="valid-feedback {{$errors->has('password') ? 'invalid-feedback' : ''}}">{{ $errors->first('password') }}</div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4 mb-3">
                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="password-confirm" class="text-default">Confirme a senha</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary">Atualizar</button>

                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection
