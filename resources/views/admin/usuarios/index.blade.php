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
      <i class="fas fa-user fa-fw"></i>
      Lista de usuários
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            <tr>
              <td>Bruno Nash</td>
              <td>Software Engineer</td>
              <td>London</td>
              <td>38</td>
              <td>2011/05/03</td>
              <td>
                <a class="btn btn-success btn-sm" href="#" role="button" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-primary btn-sm" href="#" role="button" title="Detalhes">
                  <i class="fas fa-plus"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="#" role="button" title="Excluir">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

@endsection
