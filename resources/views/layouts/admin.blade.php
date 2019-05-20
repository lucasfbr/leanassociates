<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

  <title>Lean Associates</title>

  <!-- Scripts -->
  <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
  </script>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    @if (Auth::check())
      <a class="navbar-brand mr-1" href="{{ route('admin.home') }}"><img src="{{ asset('img/logo-lean2.png') }}" width="40"/><span class="ml-1 text-default">Lean Associates</span></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{route('admin.profile')}}">Perfil do usuário</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>

    @else
      <a class="navbar-brand mr-1" href="/"><img src="{{ asset('img/logo-lean2.png') }}" width="40"/><span class="ml-1 text-default">Lean Associates</span></a>
    @endif

  </nav>

  <div id="wrapper">
    
    @if (Auth::check())  
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Configurações</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header"><i class="color-icon fas fa-fw fa-file"></i>Geral</h6>
          <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Conteudo exibido no cabeçalho do site">Cabeçalho</a>
          <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Conteudo exibido no rodapé do site">Rodapé</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header"><i class="color-icon fas fa-fw fa-file"></i> Serviços</h6>
          <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Titulo e descrição de cabeçalho da página">Titulo/Descrição</a>
          <a class="dropdown-item" href="{{ route('admin.servicos') }}" data-toggle="tooltip" data-placement="top" title="Conteúdo da página">Conteúdo</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header"><i class="color-icon fas fa-fw fa-file"></i> Como funciona</h6>
          <a class="dropdown-item" href="" data-toggle="tooltip" data-placement="top" title="Conteudo exibido na home do site">Resumo</a>
          <a class="dropdown-item" href="{{ route('admin.comofunciona') }}" data-toggle="tooltip" data-placement="top" title="Conteúdo exibido ao entrar na página">Página</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header"><i class="color-icon fas fa-fw fa-file"></i> Termos de contrato</h6>
          <a class="dropdown-item" href="{{ route('admin.terms') }}" data-toggle="tooltip" data-placement="top" title="Contratos que serão exibidos para o consultor ou empresa">Conteúdo</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.usuarios') }}">
          <i class="fas fa-user fa-fw"></i>
          <span>Usuários</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.mensagens') }}">
          <i class="fas fa-envelope fa-fw"></i>
          <span>Mensagens</span></a>
      </li>
    </ul>

    @endif

    <div id="content-wrapper">
    
      <div class="container-fluid">
        
        <!-- Page Content -->

         @yield('content')

      </div>
      <!-- /.container-fluid -->
      
       @if (Auth::check())  
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container-fluid my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>
      @endif 
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Realmente deseja sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" para terminar com sua sessão atual</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> 
                {{ csrf_field() }} 
            </form> 
        </div>
      </div>
    </div>
  </div>
  
  <script src="{{ asset('admin/js/scripts.js') }}"></script>

  @stack('applogin')
  @stack('appregister')
  @stack('appemail')
  @stack('appresetpassword')
  @stack('appformation')
  @stack('ckeditor')
  @stack('profile')
  @stack('mask')

</body>

</html>