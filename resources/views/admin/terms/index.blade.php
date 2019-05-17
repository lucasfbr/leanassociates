@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Termos do contrato</li>
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
      <a class="btn btn-success btn-sm" href="{{route('admin.terms.create')}}" role="button" title="Novo termo">
        Novo
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>Titulo</th>
            <th>Conteúdo</th>
            <th>Para</th>
            <th>status</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>
          @foreach($terms as $term)
            <tr>
              <td>{{title_case($term->title)}}</td>
              <td>{{str_limit($term->content, 150)}}</td>
              <td>{{termTipe($term->type)}}</td>
              <td>{!!termStatus($term->status)!!}</td>
              <td>
                <a class="btn btn-info btn-sm" href='{{url("admin/terms/detail/$term->id")}}' role="button" title="Detalhes">
                  <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-success btn-sm" href='{{url("admin/terms/$term->id")}}' role="button" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="#" role="button" title="Excluir" data-toggle="modal" data-target="#deleteModal">
                  <i class="fas fa-trash-alt"></i>
                </a>

              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer text-muted">
      <nav aria-label="Page navigation example">
        {{ $terms->links() }}
      </nav>
    </div>
  </div>

  <!-- Excluir usuario Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Realmente deseja excluir esse termo de contrato?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Excluir" para confirmar esta ação</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href='{{url("admin/terms/delete/$term->id")}}'>Excluir</a>
        </div>
      </div>
    </div>
  </div>

@endsection
