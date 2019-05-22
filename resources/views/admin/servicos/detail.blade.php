@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{route('admin.servicos')}}">Serviços</a></li>
    <li class="breadcrumb-item">Detalhes</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
     Detalhes do Serviço
    </div>

    <div class="card-body">
      
      <div class="row justify-content-md-center">
        <div class="col-md-8">


                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">Titulo</th>
                        <td>{{$servico->title}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Descricao</th>
                        <td>{!! $servico->content !!}</td>
                    </tr>
                    </tbody>
                </table>

        </div>
      </div>

    </div>
  </div>

@endsection
