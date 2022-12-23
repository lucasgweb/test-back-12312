<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>{{$title}} - Supera Inovação e Tecnologia</title>
    <link rel="icon" type="image/x-icon"
          href="{{asset('assets/img/favicon.ico')}}"/>
    <script data-search-pseudo-elements defer
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    @livewireStyles
</head>
<body class="nav-fixed">
<nav
    class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-gray-900"
    id="sidenavAccordion">
    <button class="btn btn-icon btn-transparent-light order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
            data-feather="menu"></i></button>
    <a class=" pe-3 ps-4 ps-lg-2"
       href="{{route('home.index')}}"><img
            src="{{asset('assets/img/logo.png')}}" width="190"></a>
    <ul class="navbar-nav align-items-center ms-auto">
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
               href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false"><img class="img-fluid"
                                          src="{{asset('assets/img/avatar.png')}}"/></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                 aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img"
                         src="{{asset('assets/img/avatar.png')}}"/>
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{Auth::user()->name}}</div>
                        <div class="dropdown-user-details-email">{{Auth::user()->email}}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#!">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Conta
                </a>
                <a class="dropdown-item" href="{{route('logout')}}">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Sair
                </a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-dark  bg-gray-900">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Menu</div>

                    <a class="nav-link"
                       href="{{ route("home.index") }}">
                        <div class="nav-link-icon"><i data-feather="home"></i></div>
                        Home
                    </a>
                    <a class="nav-link"
                       href="{{ route("vehicle.index") }}">
                        <div class="nav-link-icon"><i class="bi bi-car-front-fill"></i></div>
                        Veiculos
                    </a>
                    <a class="nav-link"
                       href="{{ route('maintenance.index') }}">
                        <div class="nav-link-icon"><i class="bi bi-wrench-adjustable"></i></div>
                        Manutenções
                    </a>
                </div>
            </div>
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logado como:</div>
                    <div class="sidenav-footer-title">{{Auth::user()->name}}</div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        @yield('content')
        <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; Oficina Máximo</div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#">Políticas de privacidade</a>
                        &middot;
                        <a href="#">Termos &amp; Condições</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stack('scripts')
@livewireScripts
</body>
</html>
