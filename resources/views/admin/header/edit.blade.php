@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.header')}}">Cabeçalho</a></li>
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
                  <div class="h5 text-default">Edição de cabeçalho</div>
              </div>

                <div class="card-body">
                    <form id="cadServico" method="POST" action='{{url("admin/header/update/$header->id")}}' class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="titulo" class="text-default">Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $header->titulo }}" required autofocus>
                            <div class="valid-feedback {{$errors->has('titulo') ? 'invalid-feedback' : ''}}">{{ $errors->first('titulo') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="logoDescricao" class="text-default">Titulo Logo</label>
                            <input type="text" class="form-control" name="logoDescricao" id="logoDescricao" value="{{ $header->logoDescricao }}" required autofocus>
                            <small id="statusHelp" class="form-text text-muted">Será exibido ao lado do logo</small>
                            <div class="valid-feedback {{$errors->has('logoDescricao') ? 'invalid-feedback' : ''}}">{{ $errors->first('logoDescricao') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="logo" class="text-default">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" required>
                            <div class="valid-feedback {{$errors->has('logo') ? 'invalid-feedback' : ''}}">{{ $errors->first('logo') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="bannerDescricao" class="text-default">Titulo Banner</label>
                            <input type="text" class="form-control" name="bannerDescricao" id="bannerDescricao" value="{{ $header->bannerDescricao }}" required autofocus>
                            <small id="statusHelp" class="form-text text-muted">Será exibido no centro do banner</small>
                            <div class="valid-feedback {{$errors->has('bannerDescricao') ? 'invalid-feedback' : ''}}">{{ $errors->first('bannerDescricao') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="banner" class="text-default">Banner</label>
                            <input type="file" class="form-control" name="banner" id="banner" required>
                            <div class="valid-feedback {{$errors->has('banner') ? 'invalid-feedback' : ''}}">{{ $errors->first('banner') }}</div>
                        </div>

                        <div class="custom-control custom-switch mb-3">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="{{$header->status}}" {{$header->status == 1 ? "checked" : ''}}>
                            <label class="custom-control-label" for="customSwitch1">Definir como principal</label>
                            <small id="statusHelp" class="form-text text-muted">Ao definir este campo como principal logo e banner serão exibidos na home do site</small>
                        </div>

                        <button type="submit" class="btn btn-secondary">Editar</button>

                    </form>
                </div>

            </div>

        </div>

  </div>

  @push('profile')
      <script>
          $( document ).ready(function() {

              function definirPrincipal() {

                  var status = $('#customSwitch1');

                  status.click(function () {

                      if( status.prop("checked") ){

                          if(status.val() == '1'){
                              status.val('0')
                          }else{
                              status.val('1')
                          }

                      }else{

                          if(status.val() == '1'){
                              status.val('0')
                          }else{
                              status.val('1')
                          }
                      }

                  })

              }

              definirPrincipal();

          });
      </script>
  @endpush
@endsection
