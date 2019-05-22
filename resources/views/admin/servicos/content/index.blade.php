@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item">Serviços</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">

      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="btn btn-success mb-3" href="{{ route('admin.servicosContent.create') }}">Novo</a>
        </li>
      </ul>

    </div>

    <div class="card-body">

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

      @if($servicos->isEmpty())
        <p class="text-center h4">Nenhum registro cadastrado</p>
      @else
        @foreach($servicos as $key => $servico)
          @if($key === 0 || $key === 3)
            <div class="card-deck mb-2">
              @endif

              <div class="col-md-4 card text-center">
                <img src='{{ asset("img/$servico->img") }}' class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$servico->titulo}}</h5>
                  <p class="card-text">{!! str_limit($servico->descricao, 70) !!}</p>
                  <a href='{{url("admin/servicosContent/$servico->id")}}' class="btn-sm btn-secondary">Editar</a>
                  <a href='{{url("admin/servicosContent/detail/$servico->id")}}' class="btn-sm btn-info">Detalhes</a>
                  <a href="#" class="btn-sm btn-danger" role="button" title="Excluir" data-toggle="modal" data-target="#deleteModal">Excluir</a>
                </div>
              </div>
              @if($key === 2 || $key === 5)
            </div>
          @endif
        @endforeach
      @endif
    </div>
    <div class="card-footer text-muted">
      <nav aria-label="Page navigation example">
        {{ $servicos->links() }}
      </nav>
    </div>
  </div>

  <!-- Excluir usuario Modal-->
  @if(!empty($servico->id))
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Realmente deseja excluir este serviço?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Excluir" para confirmar esta ação</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href='{{url("admin/servicosContent/delete/$servico->id")}}'>Excluir</a>
        </div>
      </div>
    </div>
  </div>
  @endif

@endsection
