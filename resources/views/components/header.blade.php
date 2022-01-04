<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #6c63ff;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img class="mylogo" src="{{asset('src/img/logo_app.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" id="dashboard" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="veiculos"  href="{{route('veiculos')}}">Veículos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="usuarios"  href="{{route('usuarios')}}">Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="relatorio"  href="{{route('relatorio')}}">Relatório</a>
            </li>
        </ul>
        <form class="d-flex" method="POST" action="{{ route('logout') }}">
            @csrf

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('logout')}}"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">Logout</a></li>
                    </ul>
                    </li>
            </ul>
        </form>
        </div>
    </div>
    </nav>
    <script>
        let url = window.location.href
        let active = 'na'
        if(url.match('usuarios')){
            active = 'usuarios'
        }
        if(url.match('veiculos')){
            active = 'veiculos'
        }
        if(url.match('dashboard')){
            active = 'dashboard'
        }
        if(url.match('relatorio')){
            active = 'relatorio'
        }
        const headerActive = document.getElementById(active)
        if (headerActive.classList) headerActive.classList.add("active")
            else headerActive.className += " active";
    </script>
