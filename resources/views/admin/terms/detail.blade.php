@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="" class="text-default">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.terms')}}">Termos do contrato</a></li>
    <li class="breadcrumb-item active">Detalhes</li>
  </ol>

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
  
  <div class="card mb-3">
    <div class="card-header">
     Status: {!!termStatus($term->status)!!}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$term->title}}</h5>
      <p class="card-text">{!! $term->content !!}</p>
    </div>
    <div class="card-footer text-muted">
      Data de Criação: {{data_br($term->created_at)}}
    </div>
  </div>

@endsection
