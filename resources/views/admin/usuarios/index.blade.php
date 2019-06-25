@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Usuários</li>
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
      <a class="btn btn-success btn-sm" href="{{route('admin.usuarios.create')}}" role="button" title="Novo usuário">
        Novo
      </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>Nome</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Tipo</th>
            <th>Data Cadastro</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{title_case($user->name)}}</td>
              <td>{{$user->profile->uf}}</td>
              <td>{{$user->profile->cidade}}</td>
              <td>{{tipoRole($user->role)}}</td>
              <td>{{data_br($user->created_at)}}</td>
              <td>
                <a class="btn btn-info btn-sm" href='{{url("admin/usuarios/detail/$user->id")}}' role="button" title="Detalhes">
                  <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-success btn-sm" href='{{url("admin/usuarios/$user->id")}}' role="button" title="Editar">
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
        {{ $users->links() }}
      </nav>
    </div>
  </div>

  <!-- Excluir usuario Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Realmente deseja excluir esse usuário?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Excluir" para confirmar esta ação</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href='{{url("admin/usuarios/delete/$user->id")}}'>Excluir</a>
        </div>
      </div>
    </div>
  </div>

@endsection
