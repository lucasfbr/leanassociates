@extends('layouts.site')

@section('content')

  <section class="bg-cinza section-servico">
    <div class="container">
      <p class="h4 text-center mb-5">Serviços</p>
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <p class="">
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-cinza ">
    <div class="container">
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

      <div class="row text-center">
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/desenvolvimento-de-produtos-lean.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Desenvolvimento de produtos lean</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\5" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/logistica-six-sigma.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Logística lean e six sigma</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\6" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/consultoria-juridica.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Consultoria Jurídica</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\7" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
        <div class="col-mx-12 col-md-3 mx-auto mb-2">
          <div class="card">
            <img src="{{ asset('img/consultoria-de-TI.jpg') }}" class="card-img-top img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">Consultoria de TI</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              <a href="\service\8" class="btn btn-success">Saiba mais</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>


@endsection