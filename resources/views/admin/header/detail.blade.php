@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.header')}}">Cabeçalho</a></li>
    <li class="breadcrumb-item">Detalhes</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
     Detalhes do Cabeçalho
    </div>

    <div class="card-body">
      
      <div class="row justify-content-md-center">
        <div class="col-md-8 card">
            <img src='{{ asset("img/$header->banner") }}' class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$header->titulo}}</h5>
                <p class="card-text"></p>
            </div>
        </div>
      </div>

    </div>
  </div>

@endsection
