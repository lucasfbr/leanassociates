@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.comofunciona')}}">Como Funciona</a></li>
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
                  <div class="h5 text-default">Novo Registro</div>
              </div>

              <div class="card-body">       
                  <form id="cadServico" method="POST" action="{{route('admin.comofunciona.store')}}" class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate 
                    enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="user_id" id="user_id" value={{auth()->user()->id}}>

                      <div class="form-group">
                          <label for="titulo_resumo" class="text-default">Titulo do resumo</label>
                          <input type="text" class="form-control" name="titulo_resumo" id="titulo_resumo" value="{{ old('titulo_resumo') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('titulo_resumo') ? 'invalid-feedback' : ''}}">{{ $errors->first('titulo_resumo') }}</div>
                          <small id="tituloResumoHelp" class="form-text text-muted">Titulo do resumo que será exibido na home</small>
                      </div>

                      <div class="form-group">
                          <label for="resumo" class="text-default">Descrição do resumo</label>
                          <textarea class="form-control" id="resumo" name="resumo" cols="30" rows="10" required>{{ old('resumo') }}</textarea>
                         <div class="valid-feedback {{$errors->has('resumo') ? 'invalid-feedback' : ''}}">{{ $errors->first('resumo') }}</div>
                         <small id="ResumoHelp" class="form-text text-muted">Conteúdo resumido que será exibido na home, maximo 100 caracteres</small>
                      </div>

                      <div class="form-group">
                          <label for="titulo" class="text-default">Titulo</label>
                          <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('titulo') ? 'invalid-feedback' : ''}}">{{ $errors->first('titulo') }}</div>
                          <small id="tituloHelp" class="form-text text-muted">Titulo que será exibido ao entrar na página: "como funciona"</small>
                      </div>

                      <div class="form-group">
                          <label for="texto" class="text-default">Texto</label>
                          <textarea class="form-control" id="editor-texto" name="texto" cols="30" rows="10" required>{{ old('texto') }}</textarea>
                         <div class="valid-feedback {{$errors->has('texto') ? 'invalid-feedback' : ''}}">{{ $errors->first('texto') }}</div>
                         <small id="DescricaoHelp" class="form-text text-muted">Conteúdo que será exibido ao entrar na página: "como funciona"</small>
                      </div>

                      <div class="form-group">
                          <label for="img" class="text-default">Icone</label>
                          <input type="text" class="form-control" name="img" id="img" required>
                          <small id="iconeHelp" class="form-text text-muted">Digite a classe do icone ex: <strong>fas fa-address-book</strong>. <a target="_blank" href="https://fontawesome.com/icons?d=gallery">Icones disponíveis</a> </small>
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
