@extends('layouts.site')

@section('content')

    <section class="bg-cinza section-servico">
        <div class="container">
            @foreach($comoFunciona as $key => $comofun)
                <div class="row justify-content-center mb-5">
                    <div class="d-flex flex-nowrap bd-highlight">
                        <div class="{{order($key)[0]}} p-2 bd-highlight ml-5">
                            <div class="small text-small">{{$comofun->titulo}}</div>
                            {!!$comofun->texto!!}
                        </div>
                        <div class="{{order($key)[1]}} p-2 bd-highlight ml-5">
                          <span style="font-size: 48px;">
                            <i class="{{$comofun->img}} fa-7x"></i>
                          </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection