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
                    {{ session('status') }}
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
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-interesse-tab" data-toggle="pill" href="#pills-interesse" role="tab" aria-controls="pills-interesse" aria-selected="false">Areas de interesse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-formation-tab" data-toggle="pill" href="#pills-formation" role="tab" aria-controls="pills-formation" aria-selected="false">Formação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-experiencia-tab" data-toggle="pill" href="#pills-experiencia" role="tab" aria-controls="pills-experiencia" aria-selected="false">Experiência Proficional</a>
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
                        <div class="tab-pane fade" id="pills-formation" role="tabpanel" aria-labelledby="pills-formation-tab">
                            <div id="appFormation">
                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#formFormationModal" onclick="hidebtn('edit','1')">Add</button>
                                <hr>
                                <div id="listFormations"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-experiencia" role="tabpanel" aria-labelledby="pills-experiencia-tab">
                            <div id="appExperiencia">
                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#formExperienciaModal" onclick="hidebtn('edit','2')">Add</button>
                                <hr>
                                <div id="listExperiences"></div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>

         </div>

      </div>

    </div>


    <!-- Adicionar formacao modal-->
    <div class="modal fade" id="formFormationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicione uma nova formação ao seu curriculo</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="formFormation" method="post" class="needs-validation" novalidate >
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="instituicao" class="text-default">Instituição</label>
                            <input type="text" class="form-control" name="instituicao" id="instituicao" required>
                            <div class="valid-feedback"></div>
                            <small id="instHelp" class="form-text text-muted">Instituição de ensino</small>
                        </div>
                        <div class="form-group">
                            <label for="formacao" class="text-default">Formação</label>
                            <input type="text" class="form-control" name="formacao" id="formacao" required>
                            <div class="valid-feedback"></div>
                            <small id="formacaoHelp" class="form-text text-muted">Nome da formação</small>
                        </div>
                        <div class="form-group">
                            <label for="de" class="text-default">De</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" name="de" id="de" class="form-control" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <div class="valid-feedback"></div>
                            <small id="deHelp" class="form-text text-muted">Início da formação</small>
                        </div>
                        <div class="form-group">
                            <label for="ate" class="text-default">Até</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" name="ate" id="ate" class="form-control" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <div class="valid-feedback"></div>
                            <small id="ateHelp" class="form-text text-muted">Término da formação</small>
                        </div>
                        <div class="form-group">
                            <label for="descricao" class="text-default">Descrição</label>
                            <textarea name="descricao" id="descricao" class="form-control" cols="10" rows="6"></textarea>
                            <div class="valid-feedback"></div>
                            <small id="descHelp" class="form-text text-muted">Especifique em detalhes sua formação</small>
                        </div>
                        <div class="form-group">
                            <label for="link" class="text-default">Link</label>
                            <input type="text" class="form-control" name="link" id="link">
                            <div class="valid-feedback"></div>
                            <small id="linkHelp" class="form-text text-muted">link para documentos, sites, apresentações e vídeos externos</small>
                        </div>
                        <input type="hidden" id="user_id" class="user_id" value="{{$user->id}}">
                        <input type="hidden" id="formation_id" class="formation_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button id="cadFormacao" class="btn btn-primary">Salvar</button>
                        <button id="editFormacao" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Adicionar experiencia modal-->
    <div class="modal fade" id="formExperienciaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicione uma nova experiência ao seu curriculo</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="formExperiencia" method="post" class="needs-validation" novalidate >
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cargo" class="text-default">Cargo</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" required>
                            <div class="valid-feedback"></div>
                            <small id="cargotHelp" class="form-text text-muted">Cargo ocupado na empresa</small>
                        </div>
                        <div class="form-group">
                            <label for="expEmpresa" class="text-default">Empresa</label>
                            <input type="text" class="form-control" name="expEmpresa" id="expEmpresa" required>
                            <div class="valid-feedback"></div>
                            <small id="expEmpresaHelp" class="form-text text-muted">Nome da empresa</small>
                        </div>
                         <div class="form-group">
                            <label for="localidade" class="text-default">Localidade</label>
                            <input type="text" class="form-control" name="localidade" id="localidade" required>
                            <div class="valid-feedback"></div>
                            <small id="localHelp" class="form-text text-muted">local da empresa</small>
                        </div>
                        <div class="form-group">
                            <label for="expDe" class="text-default">De</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" name="expde" id="expde" class="form-control" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <div class="valid-feedback"></div>
                            <small id="expDeHelp" class="form-text text-muted">Início da experiência</small>
                        </div>
                        <div class="form-group">
                            <label for="expate" class="text-default">Até</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" name="expate" id="expate" class="form-control" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <div class="valid-feedback"></div>
                            <small id="expateHelp" class="form-text text-muted">Término da experiência</small>
                        </div>
                        <div class="form-group">
                            <label for="expdescricao" class="text-default">Descrição</label>
                            <textarea name="expdescricao" id="expdescricao" class="form-control" cols="10" rows="6"></textarea>
                            <div class="valid-feedback"></div>
                            <small id="expdescricaoHelp" class="form-text text-muted">Especifique em detalhes sua experiência</small>
                        </div>
                        <div class="form-group">
                            <label for="esplink" class="text-default">Link</label>
                            <input type="text" class="form-control" name="esplink" id="esplink">
                            <div class="valid-feedback"></div>
                            <small id="esplinkHelp" class="form-text text-muted">link para documentos, sites, apresentações e vídeos externos</small>
                        </div>
                        <input type="hidden" id="experience_user_id" class="experience_user_id" value="{{$user->id}}">
                        <input type="hidden" id="experience_id" class="experience_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button id="cadExperiencia" class="btn btn-primary">Salvar</button>
                        <button id="editExperiencia" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Excluir formacao modal-->
    <div class="modal fade" id="delFormacaoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realmente deseja excluir essa formação?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Excluir" para confirmar esta ação</div>
                <input type="hidden" id="idFormation" class="idFormation" value="">
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="delFormation" class="btn btn-primary" href="#">Excluir</a>
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

              /*********************************************************************
              * Inicio Requisições AJAX responsaveis pelos formulários de Formação *
              **********************************************************************/
              $(function () {


                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                  function list() {

                      $.ajax({
                          type: "GET",
                          dataType: "json",
                          url: "formation",
                          success: function (response) {

                              var formations = "";

                              if(response.length == 0){

                                formations = "<h4 class='text-center'>Nenhum registro encontrado</h4>";
                                 $('#listFormations').html(formations);

                              }else{


                              $.each(response, function (key, value) {

                                  formations += "<div class='card mb-3 cardFormation'>";
                                  formations += "<div class='row no-gutters'>";
                                  formations += "<div class='col-md-4 text-center mt-4'>";
                                  formations += "<i class='fas fa-university fa-6x'></i>";
                                  formations += "</div>";
                                  formations += "<div class='col-md-8'>";
                                  formations += "<div class='card-body'>";
                                  formations += "<h5 class='card-title mb-0'>"+value.instituicao+"</h5>";
                                  formations += "<p class='card-text mb-0'>"+value.formacao+"</p>";
                                  formations += "<p class='card-text mb-2'>"+year(value.de)+ " - " +year(value.ate)+ "</p>";
                                  formations += "<p class='font-weight-light card-text mb-0'>"+value.descricao+"</p>";
                                  formations += "<p class='card-text mb-0'>"+value.link+"</p>";
                                  formations += "<p class='card-text d-flex justify-content-end'>";
                                  formations += "<button type='button' class='btn btn-outline-success btn-sm mr-1' data-toggle='modal' data-target='#formFormationModal' onclick='editFormation("+value.id+")'>Editar</button>";
                                  formations += "<button type='button' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#delFormacaoModal' onclick='deletFormation("+value.id+")'>Excluir</button>";
                                  formations += "</p>";
                                  formations += "</div>";
                                  formations += "</div>";
                                  formations += "</div>";
                                  formations += "</div>";
                                  formations += "<hr>";
                              });

                              $('#listFormations').html(formations);
                            }
                          },
                          error: function (response) {
                              console.log(response)
                          }
                      });
                  }
                  list();

                  $('#cadFormacao').click(function (e) {

                      e.preventDefault();

                      var user_id = $('#user_id').val();
                      var instituicao = $('#instituicao').val();
                      var formacao = $('#formacao').val();
                      var de = formatDate($('#de').val());
                      var ate = formatDate($('#ate').val());
                      var descricao = $('#descricao').val();
                      var link = $('#link').val();

                      if(!validate(instituicao,formacao,de,ate)) return false;

                      $.ajax({
                          type: 'POST',
                          dataType: 'json',
                          data: {
                              user_id:user_id,
                              instituicao:instituicao,
                              formacao:formacao,
                              de:de,
                              ate:ate,
                              descricao:descricao,
                              link:link
                          },
                          url: "formation/store",
                          success: function (response) {
                              $('#formFormationModal').modal('hide');
                              list();
                              clearData();

                          },
                          error: function (response) {
                              console.log('ocorreu um erro');
                              console.log(response);
                          }

                      });
                  });

                  $('#editFormacao').click(function (e) {

                      e.preventDefault();

                      var formation_id = $("#formation_id").val();
                      var instituicao = $('#instituicao').val();
                      var formacao = $('#formacao').val();
                      var de = formatDate($('#de').val());
                      var ate = formatDate($('#ate').val());
                      var descricao = $('#descricao').val();
                      var link = $('#link').val();

                      if(!validate(instituicao,formacao,de,ate)) return false;

                      $.ajax({
                          type: 'POST',
                          dataType: 'json',
                          data: {
                              instituicao:instituicao,
                              formacao:formacao,
                              de:de,
                              ate:ate,
                              descricao:descricao,
                              link:link
                          },
                          url: "formation/update/"+formation_id,
                          success: function (response) {
                              console.log(response)

                              $('#formFormationModal').modal('hide');
                              list();
                              clearData();

                          },
                          error: function (response) {
                              console.log('ocorreu um erro');
                              console.log(response);
                          }

                      });
                  });

                  $('#delFormation').click(function (e) {

                      e.preventDefault();
                      var idFormation = $('#idFormation').val();

                      $.ajax({
                          type: 'GET',
                          dataType: 'json',
                          url: "formation/delete/"+idFormation,
                          success: function (response) {
                              $('#delFormacaoModal').modal('hide');
                              list();
                              console.log(response)
                          },
                          error: function (response) {
                              console.log(response)
                          }
                      })

                  });

                  function validate(instituicao,formacao,de,ate){

                        if(instituicao == '' || formacao == '' || de == '' || ate == ''){

                            $('#formFormation').addClass('was-validated');

                            return false;
                        }

                        return true;
                  }

              });

              /*********************************************************************
               * Fim Requisições AJAX responsaveis pelos formulários de Formação   *
               *********************************************************************/


               /*********************************************************************
              * Inicio Requisições AJAX responsaveis pelos formulários de experiencias*
              **********************************************************************/
              $(function () {


                     function listExperiencias() {

                      $.ajax({
                          type: "GET",
                          dataType: "json",
                          url: "experience",
                          success: function (response) {

                              var experiencias = "";

                              if(response.length == 0){

                                experiencias = "<h4 class='text-center'>Nenhum registro encontrado</h4>";
                                $('#listExperiences').html(experiencias);

                              }else{

                                  $.each(response, function (key, value) {

                                      experiencias += "<div class='card mb-3 cardFormation'>";
                                      experiencias += "<div class='row no-gutters'>";
                                      experiencias += "<div class='col-md-4 text-center mt-4'>";
                                      experiencias += "<i class='fas fa-university fa-6x'></i>";
                                      experiencias += "</div>";
                                      experiencias += "<div class='col-md-8'>";
                                      experiencias += "<div class='card-body'>";
                                      experiencias += "<h5 class='card-title mb-0'>"+value.empresa+"</h5>";
                                      experiencias += "<p class='card-text mb-0'>"+value.cargo+"</p>";
                                      experiencias += "<p class='card-text mb-0'>"+value.localidade+"</p>";
                                      experiencias += "<p class='card-text mb-2'>"+year(value.de)+ " - " +year(value.ate)+ "</p>";
                                      experiencias += "<p class='font-weight-light card-text mb-0'>"+value.descricao+"</p>";
                                      experiencias += "<p class='font-weight-light card-text mb-0'>"+value.link+"</p>";
                                      experiencias += "<p class='card-text d-flex justify-content-end'>";
                                      experiencias += "<button type='button' class='btn btn-outline-success btn-sm mr-1' data-toggle='modal' data-target='#formFormationModal' onclick='editFormation("+value.id+")'>Editar</button>";
                                      experiencias += "<button type='button' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#delFormacaoModal' onclick='deletFormation("+value.id+")'>Excluir</button>";
                                      experiencias += "</p>";
                                      experiencias += "</div>";
                                      experiencias += "</div>";
                                      experiencias += "</div>";
                                      experiencias += "</div>";
                                      experiencias += "<hr>";
                                  });

                                  $('#listExperiences').html(experiencias);

                            }
                          },
                          error: function (response) {

                              console.log('Erro ao fazer uma requisição a base de dados!');
                          }
                      });
                   }
                   listExperiencias(); 


                   $('#cadExperiencia').click(function (e) {

                      e.preventDefault();

                      var user_id = $('#user_id').val();
                      var empresa = $('#expempresa').val();
                      var cargo = $('#cargo').val();
                      var localidade = $('#localidade').val();
                      var de = formatDate($('#expde').val());
                      var ate = formatDate($('#expate').val());
                      var descricao = $('#expdescricao').val();
                      var link = $('#explink').val();

                      if(!validate(empresa,cargo,localidade,de,ate)) return false;

                      $.ajax({
                          type: 'POST',
                          dataType: 'json',
                          data: {
                              user_id:user_id,
                              empresa:empresa,
                              cargo:cargo,
                              localidade:localidade,
                              de:de,
                              ate:ate,
                              descricao:descricao,
                              link:link
                          },
                          url: "experience/store",
                          success: function (response) {
                              $('#formExperienceModal').modal('hide');
                              listExperiencias(); 
                              clearDataExperience();

                          },
                          error: function (response) {
                              console.log('ocorreu um erro');
                              console.log(response);
                          }

                      });
                  });

                  $('#editExperiencia').click(function (e) {

                      e.preventDefault();

                      var formation_id = $("#formation_id").val();
                      var empresa = $('#expempresa').val();
                      var cargo = $('#cargo').val();
                      var localidade = $('#localidade').val();
                      var de = formatDate($('#expde').val());
                      var ate = formatDate($('#expate').val());
                      var descricao = $('#expdescricao').val();
                      var link = $('#explink').val();

                      if(!validate(empresa,cargo,localidade,de,ate)) return false;

                      $.ajax({
                          type: 'POST',
                          dataType: 'json',
                          data: {
                              empresa:empresa,
                              cargo:cargo,
                              localidade:localidade,
                              de:de,
                              ate:ate,
                              descricao:descricao,
                              link:link
                          },
                          url: "experience/update/"+experience_id,
                          success: function (response) {
                              console.log(response)

                              $('#formExperienceModal').modal('hide');
                              listExperiencias(); 
                              clearDataExperience();

                          },
                          error: function (response) {
                              console.log('ocorreu um erro');
                              console.log(response);
                          }

                      });
                  });

                  $('#delExperiencia').click(function (e) {

                      e.preventDefault();
                      var idExperiencia = $('#idExperiencia').val();

                      $.ajax({
                          type: 'GET',
                          dataType: 'json',
                          url: "formation/delete/"+idExperiencia,
                          success: function (response) {
                              $('#delExperienciaModal').modal('hide');
                              listExperiencias();
                              console.log(response)
                          },
                          error: function (response) {
                              console.log(response)
                          }
                      })

                  });

                  function validateExperience(empresa,cargo,localidade,de,ate){

                        if(empresa == '' || cargo == '' || localidade == '' || de == '' || ate == ''){

                            $('#formExperience').addClass('was-validated');

                            return false;
                        }

                        return true;
                  }

              }); 
              /*********************************************************************
               * Fim Requisições AJAX responsaveis pelos formulários de experiecias*
               *********************************************************************/


              /*********************
              * Ínicio datapicker   *
              **********************/

              $.fn.datepicker.dates['en'] = {
                  days: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado", "Domingo"],
                  daysShort: ["Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"],
                  daysMin: ["Se", "Te", "Qu", "Qu", "Se", "Sa", "Do"],
                  months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                  monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                  today: "Hoje",
                  clear: "Clear",
                  format: "dd/mm/yyyy",
                  titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                  weekStart: 0
              };

              /*********************
               * Fim datapicker   *
               **********************/

           });
            
            function deletFormation(id){
              document.getElementById('idFormation').value = id
            }  

            function editFormation(id) {

              hidebtn('add')

              $.ajax({
                  type: 'GET',
                  dataType: 'json',
                  url: "formation/edit/" + id,
                  success: function (response) {

                      $('#formation_id').val(response.id);
                      $('#instituicao').val(response.instituicao);
                      $('#formacao').val(response.formacao);
                      $('#de').val(formatDate(response.de, 'pt-br'));
                      $('#ate').val(formatDate(response.ate, 'pt-br'));
                      $('#descricao').val(response.descricao);
                      $('#link').val(response.link);

                  },
                  error: function (response) {
                      console.log(response)
                  }
              });
           }

          function clearData() {
              $('#instituicao').val('');
              $('#formacao').val('');
              $('#de').val('');
              $('#ate').val('');
              $('#descricao').val('');
              $('#link').val('');
              $('#formFormation').removeClass('was-validated');
          }

          function clearDataExperience() {
              $('#empresa').val('');
              $('#cargo').val('');
              $('#localidade').val('');
              $('#de').val('');
              $('#ate').val('');
              $('#descricao').val('');
              $('#link').val('');
              $('#formExperience').removeClass('was-validated');
          }              

          //btn = qual botao vai ser escondido
          //tipo = defini se o botao é para formacao ou experiencia
          function hidebtn(btn, tipo) {

              console.log(btn, tipo)

              if(tipo === '1'){

                  clearData();

                  if(btn === 'edit'){
                    $('#cadFormacao').show();
                    $('#editFormacao').hide();  
                  }else{
                    $('#cadFormacao').hide();
                    $('#editFormacao').show();  
                  }
                  
              }else{
                  if(btn === 'add'){
                    $('#cadExperiencia').hide();
                    $('#editExperiencia').show();  
                  }else{
                    $('#cadExperiencia').show();
                    $('#editExperiencia').hide();  
                  }
              }

          }
    

          function formatDate(data, formato) {
              if (formato == 'pt-br') {
                  return (data.substr(0, 10).split('-').reverse().join('/'));
              } else {
                  return (data.substr(0, 10).split('/').reverse().join('-'));
              }
          }

        

          function year(date) {
              return date.split('-')[0];
          }


      </script>
@endpush


@push('mask')
    <script src="{{ asset('admin/js/mask.js') }}"></script>
@endpush


@endsection


