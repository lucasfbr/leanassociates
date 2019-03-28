@extends('layouts.site')

@section('content')

  <header class="banner img-responsive text-white">
      <div class="container text-center">
        <h1>Milhares de consultores prontos para</h1>
        <h1>trabalhar no seu projeto</h1>
        <br>
        <button type="button" class="btn btn-success btn-lg btn-banner mb-2">Publique suas dúvidas</button>
        <button type="button" class="btn btn-success btn-lg btn-banner mb-2">Trabalhe como consultor</button>
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
          <button type="button" class="btn btn-success btn btn-banner mb-2">Publique suas dúvidas</button>
          <button type="button" class="btn btn-success btn btn-banner mb-2">Trabalhe como consultor</button>
        </div>
        </div>
      </div>


  </section>

  <section id="services" class="laranja-fundo">
    <div class="container">
      <h3 class="text-center mb-5">Serviços de sonsultoria</h3>
      <div class="row text-center">
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/manufatura-lean2.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Manufatura lean</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\1" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/gestão-de-negocios.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Gestão de negócios</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\2" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/gestao-de-qualidade.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Gestão da qualidade</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\3" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/gestao-estrategica2.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Gestão estratégica</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\4" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-8 mx-auto text-center">
          <a href="/service" class="btn btn-success btn btn-banner">Conheça todos nossos serviços</a>
        </div>
      </div>
    </div>

  </section>

  <section id="contact" class="bg-cinza">
      <form-contato></form-contato>
  </section>


  </div>

@push('appindex')
    <script src="{{ asset('js/index.js') }}"></script>
@endpush

@endsection