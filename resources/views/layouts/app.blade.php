<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lean Associates</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lean Associates</title>

    <!-- Styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>



        <nav class="navbar navbar-expand-lg navbar-dark dark fixed-top mb-5">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{ asset('img/logo-lean2.png') }}" width="40"/><span class="ml-1 text-logo">Lean Associates</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ url('/login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ url('/register') }}">Cadastro</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')



    <!-- Scripts -->
    <script src="admin/js/scripts.js"></script>
</body>
</html>
