<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Oficina de Motos')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600&family=Barlow+Condensed:wght@600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/oficina.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg app-navbar mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fa-solid fa-motorcycle"></i>Oficina<span>Motos</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                @auth
                <ul class="navbar-nav ms-auto gap-lg-2 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('cliente.*') ? 'active' : '' }}" href="{{ route('cliente.index') }}"><i class="bi bi-people-fill"></i> Clientes</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('moto.*') ? 'active' : '' }}" href="{{ route('moto.index') }}"><i class="fa-solid fa-motorcycle"></i> Motos</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('servico.*') ? 'active' : '' }}" href="{{ route('servico.index') }}"><i class="bi bi-tools"></i> Serviços</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('agendamento.*') && ! request()->routeIs('agendamento.calendario') ? 'active' : '' }}" href="{{ route('agendamento.index') }}"><i class="bi bi-calendar2-check-fill"></i> Agendamentos</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('agendamento.calendario') ? 'active' : '' }}" href="{{ route('agendamento.calendario') }}"><i class="bi bi-calendar3"></i> Calendário</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear"></i> Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Sair</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Entrar</a></li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container pb-5">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i> Corrija os erros abaixo:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @yield('content')

    </div>

    <footer class="text-center text-muted small pb-4">
        &copy; {{ date('Y') }} Oficina de Motos — Sistema de Gestão
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>