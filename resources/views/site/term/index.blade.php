@extends('layouts.site')

@section('content')

  <section class="bg-cinza section-servico">
    <div class="container">
      @if(isset($term[0]->status) AND $term[0]->status == 1)
      <p class="h4 text-center mb-5">Termos de serviço para {{$term[0]->type == 1 ? 'Consultores' : 'Empresas'}}</p>
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <p class="">
            {{$term[0]->content}}
          </p>
          <a href="/registerTipo/{{$term[0]->type}}" class="btn btn-success btn-banner mb-2" title="Voltar para o cadastro">Voltar</a>
        </div>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <p class="h4">
            Nenhum termo de contrato registrado até o momento
          </p>
        </div>
      </div>
      @endif
    </div>
  </section>

@endsection