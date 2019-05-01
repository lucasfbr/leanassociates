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
                    <ul class="nav nav-pills text-default" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-interesse-tab" data-toggle="pill" href="#pills-interesse" role="tab" aria-controls="pills-interesse" aria-selected="false">Areas de interesse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-formation-tab" data-toggle="pill" href="#pills-formation" role="tab" aria-controls="pills-formation" aria-selected="false">Formação</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form id="perfil" method="POST" action='{{url("admin/profile/update/$user->id")}}' class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate
                                  enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-row">
                                    <div class="col-md-2 mb-3">
                                        <img src="{{ $user->profile->foto ? asset('img/'.$user->profile->foto) : asset('img/user.png')  }}" alt="..." class="img-thumbnail">
                                    </div>

                                </div>

                                @if($user->role === 0)
                                    <div class="form-row">

                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="foto" class="text-default">Foto</label>
                                                <input type="file" class="form-control-file" name="foto" id="foto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="name" class="text-default">Nome</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ title_case($user->name) }}" required autofocus>
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

                                        <div class="col-md-4 mb-3">
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
                                                <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $user->profile->cnpj }}">

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
                                                <input type="text" class="form-control" name="cep" id="cep" value="{{ $user->profile->cep }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('cep') ? 'invalid-feedback' : ''}}">{{ $errors->first('cep') }}</div>
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
                                                <label for="rua" class="text-default">Rua</label>
                                                <input type="text" class="form-control" name="rua" id="rua" value="{{ $user->profile->rua }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('rua') ? 'invalid-feedback' : ''}}">{{ $errors->first('rua') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="numero" class="text-default">Número</label>
                                                <input type="text" class="form-control" name="numero" id="numero" value="{{ $user->profile->numero }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('numero') ? 'invalid-feedback' : ''}}">{{ $errors->first('numero') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="habilitaPassword" name="habilitaPassword" {{$errors->has('password') ? 'checked' : ''}}>
                                                    <label class="text-default" for="disabledFieldsetCheck">
                                                        Deseja atualizar a senha?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <fieldset id="fieldPassword" disabled>
                                                <div class="form-group">
                                                    <label for="password" class="text-default">Senha</label>
                                                    <input type="password" class="form-control" name="password" id="password" required>
                                                    <div class="valid-feedback {{$errors->has('password') ? 'invalid-feedback' : ''}}">{{ $errors->first('password') }}</div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <fieldset id="fieldPasswordConfirmation" disabled>
                                                <div class="form-group">
                                                    <label for="password-confirm" class="text-default">Confirme a senha</label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                @elseif($user->role === 1)

                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="foto" class="text-default">Foto</label>
                                                <input type="file" class="form-control-file" name="foto" id="foto">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="name" class="text-default">Nome</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ title_case($user->name) }}" required autofocus>
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

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="name" class="text-default">Empresa</label>
                                                <input type="text" class="form-control" name="empresa" id="empresa" value="{{ $user->profile->empresa }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

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

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="interesse" class="text-default">Áreas de interesse</label>
                                                <input type="text" class="form-control" name="interesse" id="interesse" value="{{ $user->profile->interesse }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-3 mb-3">
                                             <div class="form-group">
                                                <label for="cep" class="text-default">Cep</label>
                                                <input type="text" class="form-control" name="cep" id="cep" value="{{ $user->profile->cep }}" required autofocus>
                                                 <div class="valid-feedback {{$errors->has('cep') ? 'invalid-feedback' : ''}}">{{ $errors->first('cep') }}</div>
                                             </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                           <div class="form-group">
                                                <label for="uf" class="text-default">UF</label>
                                                <input type="text" class="form-control" name="uf" id="uf" value="{{ $user->profile->uf }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('uf') ? 'invalid-feedback' : ''}}">{{ $errors->first('uf') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="cidade" class="text-default">Cidade</label>
                                                <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $user->profile->cidade }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('cidade') ? 'invalid-feedback' : ''}}">{{ $errors->first('cidade') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="bairro" class="text-default">Bairro</label>
                                                <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $user->profile->bairro }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('bairro') ? 'invalid-feedback' : ''}}">{{ $errors->first('bairro') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="rua" class="text-default">Rua</label>
                                                <input type="text" class="form-control" name="rua" id="rua" value="{{ $user->profile->rua }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('rua') ? 'invalid-feedback' : ''}}">{{ $errors->first('rua') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="numero" class="text-default">Número</label>
                                                <input type="text" class="form-control" name="numero" id="numero" value="{{ $user->profile->numero }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('numero') ? 'invalid-feedback' : ''}}">{{ $errors->first('numero') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="habilitaPassword" name="habilitaPassword" {{$errors->has('password') ? 'checked' : ''}}>
                                                    <label class="text-default" for="disabledFieldsetCheck">
                                                        Deseja atualizar a senha?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <fieldset id="fieldPassword" disabled>
                                                <div class="form-group">
                                                    <label for="password" class="text-default">Senha</label>
                                                    <input type="password" class="form-control" name="password" id="password" required>
                                                    <div class="valid-feedback {{$errors->has('password') ? 'invalid-feedback' : ''}}">{{ $errors->first('password') }}</div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <fieldset id="fieldPasswordConfirmation" disabled>
                                                <div class="form-group">
                                                    <label for="password-confirm" class="text-default">Confirme a senha</label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="foto" class="text-default">Foto</label>
                                                <input type="file" class="form-control-file" name="foto" id="foto">
                                                <div class="valid-feedback {{$errors->has('foto') ? 'invalid-feedback' : ''}}">{{ $errors->first('foto') }}</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="name" class="text-default">Nome</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ title_case($user->name) }}" required autofocus>
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

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="name" class="text-default">Empresa</label>
                                                <input type="text" class="form-control" name="empresa" id="empresa" value="{{ $user->profile->empresa }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="cnpj" class="text-default">CNPJ</label>
                                                <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $user->profile->cnpj }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('cnpj') ? 'invalid-feedback' : ''}}">{{ $errors->first('cnpj') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="fone" class="text-default">Site</label>
                                                <input type="text" class="form-control" name="site" id="site" value="{{ $user->profile->site }}">
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

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="interesse" class="text-default">Áreas de interesse</label>
                                                <input type="text" class="form-control" name="interesse" id="interesse" value="{{ $user->profile->interesse }}">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="cep" class="text-default">Cep</label>
                                                <input type="text" class="form-control" name="cep" id="cep" value="{{ $user->profile->cep }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('cep') ? 'invalid-feedback' : ''}}">{{ $errors->first('cep') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="uf" class="text-default">UF</label>
                                                <input type="text" class="form-control" name="uf" id="uf" value="{{ $user->profile->uf }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('uf') ? 'invalid-feedback' : ''}}">{{ $errors->first('uf') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="cidade" class="text-default">Cidade</label>
                                                <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $user->profile->cidade }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('cidade') ? 'invalid-feedback' : ''}}">{{ $errors->first('cidade') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="bairro" class="text-default">Bairro</label>
                                                <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $user->profile->bairro }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('bairro') ? 'invalid-feedback' : ''}}">{{ $errors->first('bairro') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="rua" class="text-default">Rua</label>
                                                <input type="text" class="form-control" name="rua" id="rua" value="{{ $user->profile->rua }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('rua') ? 'invalid-feedback' : ''}}">{{ $errors->first('rua') }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label for="numero" class="text-default">Número</label>
                                                <input type="text" class="form-control" name="numero" id="numero" value="{{ $user->profile->numero }}" required autofocus>
                                                <div class="valid-feedback {{$errors->has('numero') ? 'invalid-feedback' : ''}}">{{ $errors->first('numero') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="habilitaPassword" name="habilitaPassword" {{$errors->has('password') ? 'checked' : ''}}>
                                                    <label class="text-default" for="disabledFieldsetCheck">
                                                        Deseja atualizar a senha?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <fieldset id="fieldPassword" disabled>
                                                <div class="form-group">
                                                    <label for="password" class="text-default">Senha</label>
                                                    <input type="password" class="form-control" name="password" id="password" required>
                                                    <div class="valid-feedback {{$errors->has('password') ? 'invalid-feedback' : ''}}">{{ $errors->first('password') }}</div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <fieldset id="fieldPasswordConfirmation" disabled>
                                                <div class="form-group">
                                                    <label for="password-confirm" class="text-default">Confirme a senha</label>
                                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-secondary">Atualizar</button>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-interesse" role="tabpanel" aria-labelledby="pills-interesse-tab">INTERESSE</div>
                        <div class="tab-pane fade" id="pills-formation" role="tabpanel" aria-labelledby="pills-formation-tab">FORMATION</div>
                </div>

            </div>

         </div>

      </div>

    </div>

@push('profile')
      <script>
          $( document ).ready(function() {

                $("#habilitaPassword").on('click', function () {    

                        if($('#habilitaPassword').prop("checked")) {

                            $("#fieldPassword").prop("disabled",false);
                            $("#fieldPasswordConfirmation").prop("disabled",false);         
                                                                 
                        }else{

                            $("#fieldPassword").prop("disabled",true); 
                            $("#fieldPasswordConfirmation").prop("disabled",true);
                            
            
                        }

                });

                //Quando voltar da validação precisará manter os inputs habilitados
                if($('#habilitaPassword').prop("checked")) {
                    
                   $("#fieldPassword").prop("disabled",false);
                   $("#fieldPasswordConfirmation").prop("disabled",false);

                }

              function limpa_formulário_cep() {
                  // Limpa valores do formulário de cep.
                  $("#rua").val("");
                  $("#bairro").val("");
                  $("#cidade").val("");
                  $("#uf").val("");
              }

              //Quando o campo cep perde o foco.
              $("#cep").blur(function() {

                  //Nova variável "cep" somente com dígitos.
                  var cep = $(this).val().replace(/\D/g, '');

                  //Verifica se campo cep possui valor informado.
                  if (cep != "") {

                      //Expressão regular para validar o CEP.
                      var validacep = /^[0-9]{8}$/;

                      //Valida o formato do CEP.
                      if(validacep.test(cep)) {

                          //Preenche os campos com "..." enquanto consulta webservice.
                          $("#rua").val("...");
                          $("#bairro").val("...");
                          $("#cidade").val("...");
                          $("#uf").val("...");

                          //Consulta o webservice viacep.com.br/
                          $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                              if (!("erro" in dados)) {
                                  //Atualiza os campos com os valores da consulta.
                                  $("#rua").val(dados.logradouro);
                                  $("#bairro").val(dados.bairro);
                                  $("#cidade").val(dados.localidade);
                                  $("#uf").val(dados.uf);
                              } //end if.
                              else {
                                  //CEP pesquisado não foi encontrado.
                                  limpa_formulário_cep();
                                  alert("CEP não encontrado.");
                              }
                          });
                      } //end if.
                      else {
                          //cep é inválido.
                          limpa_formulário_cep();
                          alert("Formato de CEP inválido.");
                      }
                  } //end if.
                  else {
                      //cep sem valor, limpa formulário.
                      limpa_formulário_cep();
                  }
              });

           });
      </script>
@endpush


@push('mask')
    <script src="{{ asset('admin/js/mask.js') }}"></script>
@endpush

@endsection


