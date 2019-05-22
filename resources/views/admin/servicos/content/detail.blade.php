@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.servicosContent')}}">Serviços</a></li>
    <li class="breadcrumb-item">Detalhes</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
     Detalhes do Serviço
    </div>

    <div class="card-body">
      
      <div class="row justify-content-md-center">
        <div class="col-md-8 card">
            <img src='{{ asset("img/$servico->img") }}' class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$servico->titulo}}</h5>
                <p class="card-text">{!! $servico->descricao !!}</p>
            </div>
        </div>
      </div>

    </div>
  </div>

@endsection
