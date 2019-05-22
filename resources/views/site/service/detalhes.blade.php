@extends('layouts.site')

@section('content')


  <section class="bg-cinza section-servico">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <div class="detalhes">
          <img src='{{ asset("img/$servico->img") }}' class="img-fluid" alt="Responsive image">
          <p class="h4 text-center mb-4">{{$servico->titulo}}</p>
          <p class="mb-5">
            {!! $servico->descricao !!}
          </p>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection