@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.servicos')}}">Serviços</a></li>
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
                  <div class="h5 text-default">Edição do Serviço</div>
              </div>

              <div class="card-body">       
                  <form id="cadServico" method="POST" action='{{url("admin/servicos/update/$servico->id")}}' class="needs-validation {{ $errors->any() ? ' was-validated' : '' }}" novalidate
                    enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="user_id" id="user_id" value={{auth()->user()->id}}>
                      <div class="form-group">
                          <label for="title" class="text-default">Titulo</label>
                          <input type="text" class="form-control" name="title" id="title" value="{{ $servico->title }}" required autofocus>
                          <div class="valid-feedback {{$errors->has('title') ? 'invalid-feedback' : ''}}">{{ $errors->first('title') }}</div>
                      </div>
                      <div class="form-group">
                          <label for="content" class="text-default">Descrição</label>
                          <textarea id="editor-texto" class="form-control" name="content" cols="30" rows="10" required>{!! $servico->content !!}</textarea>
                         <div class="valid-feedback {{$errors->has('content') ? 'invalid-feedback' : ''}}">{{ $errors->first('content') }}</div>
                      </div>
                      <button type="submit" class="btn btn-secondary">Editar</button>

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
