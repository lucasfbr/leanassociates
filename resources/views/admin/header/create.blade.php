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
                          <label for="logo" class="text-default">Logo</label>
                          <input type="file" class="form-control-file" name="logo" id="logo" required>
                          <div class="valid-feedback {{$errors->has('logo') ? 'invalid-feedback' : ''}}">{{ $errors->first('logo') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="logo-desc" class="text-default">Titulo Logo</label>
                          <input type="text" class="form-control" name="logo-desc" id="logo-desc" value="{{ old('logo-desc') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('logo-desc') ? 'invalid-feedback' : ''}}">{{ $errors->first('logo-desc') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="banner" class="text-default">Banner</label>
                          <input type="file" class="form-control-file" name="banner" id="banner" required>
                          <div class="valid-feedback {{$errors->has('banner') ? 'invalid-feedback' : ''}}">{{ $errors->first('banner') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="banner-desc" class="text-default">Titulo Banner</label>
                          <input type="text" class="form-control" name="banner-desc" id="banner-desc" value="{{ old('banner-desc') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('banner-desc') ? 'invalid-feedback' : ''}}">{{ $errors->first('banner-desc') }}</div>
                      </div>

                      <button type="submit" class="btn btn-secondary">Cadastrar</button>

                  </form>                 
              </div>

            </div>

        </div>

  </div>


  @push('ckeditor')
      <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
      <script src="{{ asset('admin/js/script_default.js') }}"></script>
  @endpush
@endsection
