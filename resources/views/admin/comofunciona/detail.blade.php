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
            <img src='{{ asset("img/$comofunciona->img") }}' class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$comofunciona->titulo}}</h5>
                <p class="card-text">{{$comofunciona->texto}}</p>
            </div>
        </div>
      </div>

    </div>
  </div>

@endsection
