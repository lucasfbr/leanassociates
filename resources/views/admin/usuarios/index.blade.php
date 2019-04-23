@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Usuários</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <a class="btn btn-success btn-sm" href="#" role="button" title="Novo usuário">
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
              <td>{{$user->estado}}</td>
              <td>{{$user->cidade}}</td>
              <td>{{tipoRole($user->role)}}</td>
              <td>{{data_br($user->created_at)}}</td>
              <td>
                <a class="btn btn-info btn-sm" href="#" role="button" title="Detalhes">
                  <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-success btn-sm" href="#" role="button" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="#" role="button" title="Excluir">
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

@endsection
