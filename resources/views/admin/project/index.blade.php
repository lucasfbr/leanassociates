@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('/admin/home')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{url('/admin/project')}}">Projeto</a></li>
    <li class="breadcrumb-item active">Novo</li>
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

  <div class="row justify-content-md-center mt-5">

    <div class="col-xs-12 col-md-11">
      <div id="project">
        <project user_id="{{Auth::user()->id}}"></project>
      </div>
    </div>

  </div>

  @push('appProject')
    <script src="{{ asset('admin/js/project.js') }}"></script>
  @endpush

@endsection
