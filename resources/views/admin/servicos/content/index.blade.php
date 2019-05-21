@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item">Serviços</li>
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
      <a class="btn btn-success btn-sm" href="{{route('admin.servicos.create')}}" role="button" title="Novo usuário">
        Novo
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>
          @foreach($servicos as $servico)
            <tr>
              <td>{{title_case($servico->title)}}</td>
              <td>{{$servico->content}}</td>
              <td>
                <a class="btn btn-success btn-sm" href='{{url("admin/servicos/$servico->id")}}' role="button" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm"  href='{{url("admin/servicos/delete/$servico->id")}}' role="button" title="Excluir">
                  <i class="fas fa-trash-alt"></i>
                </a>

              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div> 

  </div>

@endsection
