@extends('layouts.site')

@section('content')

  <header class="banner img-responsive text-white">
      <div class="container text-center">
        <h1>Milhares de consultores prontos para</h1>
        <h1>trabalhar no seu projeto</h1>
        <br>
        <a href="/registerTipo/2"  class="btn btn-success btn-lg btn-banner mb-2">Publique suas dúvidas</a>
        <a href="/registerTipo/1" class="btn btn-success btn-lg btn-banner mb-2">Trabalhe como consultor</a>
      </div>
  </header>

<div id="appindex">
  <section id="about" class="bg-cinza ">
    <div class="container">
        <p class="h4 text-center">Como Funciona?</p>
        <p class="text-center mb-5 "><a href="/sobre" class="text-success">Saiba mais</a></p>
        <div class="row text-center">
          <div class="col-md-3 mx-auto mb-2">
            <i class="far fa-address-card fa-7x"></i>
            <p class="h6 mt-2">Publicar</p>
            <p>Conte-nos em poucas palavras qual o seu problema. É grátis e sem compromisso!</p>
        </div>
        <div class="col-md-3 mx-auto mb-2">
            <i class="fas fa-users fa-7x"></i>
            <p class="h6 mt-2">Indicação</p>
            <p>Indicaremos o consultor mais adequado para resolver seu problema</p>
        </div>
        <div class="col-md-3 mx-auto mb-2">
            <i class="fas fa-chart-pie fa-7x"></i>
            <p class="h6 mt-2">Projeto</p>
            <p>Será enviado um projeto especificando em quais pontos sua empresa pode melhorar</p>
        </div>
        <div class="col-md-3 mx-auto mb-2">
            <i class="fas fa-check-double fa-7x"></i>
            <p class="h6 mt-2">Aceitar</p>
            <p>Você aceita o projeto e iniciaremos o trabalho focados em atender seus interesses</p>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-8 mx-auto text-center">
          <a href="/registerTipo/2" class="btn btn-success btn btn-banner mb-2">Publique suas dúvidas</a>
          <a href="/registerTipo/1" class="btn btn-success btn btn-banner mb-2">Trabalhe como consultor</a>
        </div>
      </div>
    </div>


  </section>

  <section id="services" class="laranja-fundo">
    <div class="container">
      <h3 class="text-center mb-5">Serviços de sonsultoria</h3>

       @if($servicos->isEmpty())
            <p class="h4 text-center">Nenhum serviço cadastrado</p>
       @else

          <div class="row text-center">

          @foreach($servicos as $servico)

                <div class="col-mx-12 col-md-3 mx-auto mb-2">
                  <div class="card">
                    <img src='{{ asset("img/$servico->img") }}' class="card-img-top img-responsive" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$servico->titulo}}</h5>
                      <p class="card-text">{!! str_limit($servico->descricao, 70) !!}</p>
                      <a href="\service\{{$servico->id}}" class="btn btn-success">Saiba mais</a>
                    </div>
                  </div>
                </div>

          @endforeach

          </div>

          <div class="row mt-5">
            <div class="col-md-8 mx-auto text-center">
              <a href="/service" class="btn btn-success btn btn-banner">Conheça todos nossos serviços</a>
            </div>
          </div>
        </div>

      @endif

  </section>

  <section id="contact" class="bg-cinza">
      <form-contato></form-contato>
  </section>


  </div>

@push('appindex')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush

@endsection