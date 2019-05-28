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
       <h4> {{$header->titulo}} </h4>
    </div>

    <div class="card-body">
      
      <div class="row justify-content-md-center">
        <div class="col-md-4 card">
            <img src='{{ asset("img/$header->banner") }}' class="card-img-top">
            <div class="card-body">
                <h5 class="card-title text-center">Descrição banner:  {{$header->bannerDescricao}}</h5>
                <p class="text-center"><img src='{{ asset("img/$header->logo") }}' ></p>
                <h5 class="card-text text-center">Titulo logo: {{$header->logoDescricao}}</h5>
            </div>
        </div>
      </div>

    </div>
  </div>

@endsection
