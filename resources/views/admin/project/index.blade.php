@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Projeto</li>
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
    <div class="card-body">
      <h3 class="mb-4 text-secondary">Publique seus projetos</h3>
      <h5 class="mb-3 text-secondary">Quais seus problemas? Queremos soluciona-los para você</h5>
      <p class="text-secondary">Ao selecionar uma categoria para seu projeto, poderemos encaminha-lo ao consultor mais indicado</p>
    </div>
  </div>

@endsection
