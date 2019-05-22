@extends('layouts.site')

@section('content')

  <section class="bg-cinza section-servico">
    <div class="container">
      <p class="h4 text-center mb-5">{{$serviceHeader[0]->title}}</p>
      <div class="row justify-content-center">
        <div class="col-8 text-center">
          <p class="">
            {!! $serviceHeader[0]->content !!}
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-cinza ">
    <div class="container">
     
     @foreach($servicos as $key => $servico)
        
        @if($key === 0 || $key === 4)
        <div class="row text-center">
        @endif  
        
          @if($servicos->isEmpty())
            <p class="h4">Nenhum registro cadastrado</p>
          @else
        
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
          @endif
        
        @if($key === 3 || $key === 7)
        </div>
        @endif

      @endforeach 

    </div>
  </section>


@endsection