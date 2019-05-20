@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.terms')}}">Termos do contrato</a></li>
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
                  <div class="h5 text-default">Novo Termo do contrato</div>
              </div>

              <div class="card-body">       
                  <form id="cadTerm" method="POST" action="{{route('admin.terms.store')}}" class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate>
                      {{csrf_field()}}
                      <div class="form-group">
                          <label for="title" class="text-default">Titulo</label>
                          <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('title') ? 'invalid-feedback' : ''}}">{{ $errors->first('title') }}</div>
                      </div>
                      <div class="form-group">
                          <label for="content" class="text-default">Conteúdo</label>
                          <textarea class="form-control" name="content" id="editor-texto" rows="10" required autofocus>{{ old('tipe') }}</textarea>
                          <div class="valid-feedback {{$errors->has('content') ? 'invalid-feedback' : ''}}">{{ $errors->first('content') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="type" class="text-default">Para</label>
                          <select class="custom-select" id="type" name="type" required>
                              <option value="1" selected>Consultores</option>
                              <option value="2">Empresas</option>
                          </select>
                          <div class="valid-feedback {{$errors->has('type') ? 'invalid-feedback' : ''}}">{{ $errors->first('type') }}</div>
                      </div>

                      <div class="form-group">
                          <label for="status" class="text-default">Status</label>
                          <select class="custom-select" id="status" name="status" required>
                              <option value="0" selected>Inativo</option>
                              <option value="1">Ativo</option>
                          </select>
                          <div class="valid-feedback {{$errors->has('status') ? 'invalid-feedback' : ''}}">{{ $errors->first('status') }}</div>
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
