@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item">Usuários</li>
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
      Dados do usuário
    </div>
    <div class="card-body">
      
      <div class="row">
        <div class="col-md-2 text-center">
          @if($user->img)<img src="{{ asset("img/logo-lean2.png") }}" class="rounded mx-auto d-block" alt="...">@else <i class="fas fa-portrait fa-9x mt-5"></i> @endif
        </div>

        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>whatsapp</th>
                <th>empresa</th>
                <th>cnpj</th>
                <th>Site</th>
              </tr>
              </thead>
              <tbody>
        
                <tr>
                  <td>{{title_case($user->name)}}</td>
                   <td>{{$user->email}}</td>
                  <td>{{$user->profile->whatsapp}}</td>
                  <td>{{$user->profile->empresa}}</td>
                  <td>{{$user->profile->cnpj}}</td>
                  <td>{{$user->profile->site}}</td>
                </tr>
            
              </tbody>
            </table>

            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>Areas de interesse</th>
                <th>CEP</th>
                <th>UF</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Endereço</th>
              </tr>
              </thead>
              <tbody>
        
                <tr>
                  <td></td>
                  <td>{{$user->profile->cep}}</td>
                  <td>{{$user->profile->uf}}</td>
                  <td>{{$user->profile->cidade}}</td>
                  <td>{{$user->profile->bairro}}</td>
                  <td>{{$user->profile->rua}}, {{$user->profile->numero}}</td>
                </tr>
            
              </tbody>
            </table>

          </div>
        </div>

        

      </div>


    </div>
    <div class="card-footer text-muted">
      
    </div>
  </div>

@endsection
