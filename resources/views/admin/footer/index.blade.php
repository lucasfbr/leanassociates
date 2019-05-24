@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Footer</li>
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
      <a class="btn btn-success btn-sm" href="{{route('admin.footer.create')}}" role="button" title="Novo contato">
        Novo
      </a>
    </div>
    <div class="card-body">

      @if($footer->isEmpty())
        <p class="text-center h4">Nenhum contato cadastrado</p>
      @else

        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th>Título</th>
              <th>contato</th>
              <th>icone</th>
              <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($footer as $foot)
              <tr>
                <td>{{title_case($foot->titulo)}}</td>
                <td>{{$foot->contato}}</td>
                <td><i class="{{$foot->icone}}"></i></td>
                <td>
                  <a class="btn btn-success btn-sm" href='{{url("admin/footer/$foot->id")}}' role="button" title="Editar">
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

      @endif
    </div>

  </div>

  <!-- Excluir contato Modal-->
  @if(!empty($foot->id))
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Realmente deseja excluir esse contato?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Excluir" para confirmar esta ação</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href='{{url("admin/footer/delete/$foot->id")}}'>Excluir</a>
        </div>
      </div>
    </div>
  </div>
  @endif
@endsection
