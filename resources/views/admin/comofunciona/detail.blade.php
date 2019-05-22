@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.comofunciona')}}">Como Funciona</a></li>
    <li class="breadcrumb-item">Detalhes</li>
  </ol>



  <div class="card mb-3">
    <div class="card-header">
     Detalhes do Registro
    </div>

    <div class="card-body">
      
      <div class="row justify-content-md-center">
        <div class="col-md-8 card text-center">
            <div class="card-img-top">
                <span id="icone"><i class="{{$comofunciona->img}} fa-7x"></i></span>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $comofunciona->titulo }}</h5>
                <p class="card-text">{!! $comofunciona->texto !!}</p>
                <p class="card-text">{{ $comofunciona->resumo_titulo }}</p>
                <p class="card-text">{!! $comofunciona->resumo !!}</p>
            </div>
        </div>
      </div>

    </div>
  </div>

@endsection
