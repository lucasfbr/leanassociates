@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.servicosContent')}}">Serviços</a></li>
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
                  <div class="h5 text-default">Novo Serviço</div>
              </div>

              <div class="card-body">       
                  <form id="cadServico" method="POST" action="{{route('admin.servicosContent.store')}}" class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate
                    enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                          <label for="titulo" class="text-default">Titulo</label>
                          <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('titulo') ? 'invalid-feedback' : ''}}">{{ $errors->first('titulo') }}</div>
                      </div>
                      <div class="form-group">
                          <label for="descricao" class="text-default">Descrição</label>
                          <textarea id="editor-texto" class="form-control" name="descricao" id="descricao" cols="30" rows="10" required>{{ old('descricao') }}</textarea>
                         <div class="valid-feedback {{$errors->has('descricao') ? 'invalid-feedback' : ''}}">{{ $errors->first('descricao') }}</div>
                      </div>
                      <div class="form-group">
                          <label for="img" class="text-default">Foto</label>
                          <input type="file" class="form-control" name="img" id="img" required>
                          <div class="valid-feedback {{$errors->has('img') ? 'invalid-feedback' : ''}}">{{ $errors->first('img') }}</div>
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
