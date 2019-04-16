@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Serviços</li>
  </ol>



  <div class="card mb-3">
    <div class="card-header">
      Lista de serviços
    </div>
    <div class="card-body">

      @if (session('sucesso'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{ session('sucesso') }}
        </div>
        <br><br>
      @elseif(session('erro'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{ session('erro') }}
        </div>
        <br><br>
      @endif


      <form action="{{url('admin/servicos')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id }}" >
        <input type="text" name="titulo" id="titulo" >
        <input type="text" name="descricao" id="descricao" >
        <input type="file" name="img" id="img">
        <input type="submit" value="Enviar">
      </form>

    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

@endsection
