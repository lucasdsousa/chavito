<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Olá, {{ Auth::user()->name }}</a>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Painel Administrativo</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('admin.administradores') }}">Administradores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.chavitos') }}">Chavitos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ route('admin.pedidos') }}" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pedidos
              </a>
              <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                <li><a class="dropdown-item" href="{{ route('admin.pedidos') }}">Todos os Pedidos</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('pedidos-aprovados') }}">Aprovados</a></li>
                <li><a class="dropdown-item" href="{{ route('pedidos-aprovacao') }}">Aguardando Aprovação</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('pedidos-enviado') }}">Enviados</a></li>
                <li><a class="dropdown-item" href="{{ route('pedidos-envio') }}">Aguardando Envio</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('pedidos-cancelados') }}">Cancelados</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>