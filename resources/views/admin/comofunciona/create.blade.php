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
                          <label for="titulo" class="text-default">Titulo</label>
                          <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('titulo') ? 'invalid-feedback' : ''}}">{{ $errors->first('titulo') }}</div>
                      </div>
                      <div class="form-group">
                          <label for="descricao" class="text-default">Descrição</label>
                          <textarea class="form-control" name="texto" id="texto" cols="30" rows="10" required>{{ old('descricao') }}</textarea>
                         <div class="valid-feedback {{$errors->has('texto') ? 'invalid-feedback' : ''}}">{{ $errors->first('texto') }}</div>
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



@endsection
