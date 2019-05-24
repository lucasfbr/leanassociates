<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Lean Associates</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    </head>

    <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{ asset('img/logo-lean2.png') }}" width="40"/><span class="ml-1 text-logo">Lean Associates</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link2" href="/">Home</a>
                    </li>
                    @if(Request::segment(1) == '')
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link2" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        @yield('content')

    <!-- Footer -->
    <footer class="py-5 dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('img/logo-lean2.png') }}" class="img-responsive" style="max-width: 80px" />
                </div>

                <div class="col-md-4 text-white">
                    <p class="titulo-rodape">Contato</p>

                    @if($footer->isEmpty())
                        <p class="text-empty">Nenhum contato cadastrado</p>
                    @else
                        <ul class="lista list-unstyled">
                           @foreach($footer as $foot)
                              <li class="mb-1"><i class="{{$foot->icone}} mr-2"></i>  {{$foot->contato}}</li>
                           @endforeach
                        </ul>
                    @endif
                </div>


                <div class="col-md-4 text-white ">
                    <p class="titulo-rodape">Serviços</p>

                    @if($servicosFooter->isEmpty())
                        <p class="text-empty">Nenhum serviço cadastrado</p>
                    @else

                    <ul class="lista list-unstyled">
                        @foreach($servicosFooter as $servicoFoo)
                            <li><a href='{{url("service/$servicoFoo->id")}}'>{{$servicoFoo->titulo}}</a></li>
                        @endforeach
                    </ul>

                    @endif
                </div>
            </div>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/scripts.js') }}"></script>


    @stack('appindex')

    </body>

</html>