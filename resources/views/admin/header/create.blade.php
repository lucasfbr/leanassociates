@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.header')}}">Cabeçalho</a></li>
    <li class="breadcrumb-item">Novo</li>
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
                  <div class="h5 text-default">Novo Cabeçalho</div>
              </div>

              <div class="card-body">       
                  <form id="cadServico" method="POST" action="{{route('admin.header.store')}}" class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate
                    enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                          <label for="titulo" class="text-default">Titulo</label>
                          <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('titulo') ? 'invalid-feedback' : ''}}">{{ $errors->first('titulo') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="logoDescricao" class="text-default">Titulo Logo</label>
                          <input type="text" class="form-control" name="logoDescricao" id="logoDescricao" value="{{ old('logoDescricao') }}" required autofocus>
                          <small id="statusHelp" class="form-text text-muted">Será exibido ao lado do logo</small>
                          <div class="valid-feedback {{$errors->has('logoDescricao') ? 'invalid-feedback' : ''}}">{{ $errors->first('logoDescricao') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="logo" class="text-default">Logo</label>
                          <input type="file" class="form-control-file" name="logo" id="logo" required>
                          <div class="valid-feedback {{$errors->has('logo') ? 'invalid-feedback' : ''}}">{{ $errors->first('logo') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="bannerDescricao" class="text-default">Titulo Banner</label>
                          <input type="text" class="form-control" name="bannerDescricao" id="bannerDescricao" value="{{ old('bannerDescricao') }}" required autofocus>
                          <small id="statusHelp" class="form-text text-muted">Será exibido no centro do banner</small>
                          <div class="valid-feedback {{$errors->has('bannerDescricao') ? 'invalid-feedback' : ''}}">{{ $errors->first('bannerDescricao') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="banner" class="text-default">Banner</label>
                          <input type="file" class="form-control-file" name="banner" id="banner" required>
                          <div class="valid-feedback {{$errors->has('banner') ? 'invalid-feedback' : ''}}">{{ $errors->first('banner') }}</div>
                      </div>

                      <div class="custom-control custom-switch mb-3">
                          <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="1">
                          <label class="custom-control-label" for="customSwitch1">Definir como principal</label>
                          <small id="statusHelp" class="form-text text-muted">Ao definir este campo como principal logo e banner serão exibidos na home do site</small>
                      </div>

                      <button type="submit" class="btn btn-secondary">Cadastrar</button>

                  </form>                 
              </div>

            </div>

        </div>

  </div>

@endsection
