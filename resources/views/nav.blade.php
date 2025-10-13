<nav class="navbar custom navbar-expand-lg">
    <div class="container-fluid">
        <img src="https://cdn.discordapp.com/attachments/721077787842052136/1151364999751684127/logo_1.png" alt="" height="50">
      <button class="navbar-toggler color" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="btn_nav_menu">
        <img src="{{ asset('images\menu.svg') }}" alt="Menu" class="menu">
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if($permiso == 'full')
          <li class="nav-item">
            <a class="nav-link letras" id="nav-item" aria-current="page" href="{{ route('menuadmin') }}">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link letras" id="nav-item" aria-current="page" href="{{ route('inicioadmin') }}">Agentes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link letras" id="nav-item" href="{{ route('verstatsglobales') }}">Estadisticas-Globales</a>
          </li>
          @endif
          @if($permiso == 'limited')
          <li class="nav-item">
            <a class="nav-link letras" id="nav-item" aria-current="page" href="{{ route('menu') }}">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link letras" id="nav-item" aria-current="page" href="{{ route('agendas') }}">Agenda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link letras" id="nav-item" aria-current="page" href="{{ route('contactos') }}">Contactos</a>
          </li>
          @endif
        </ul>
        <div class="d-flex">
          <div class="dropdown" id="menu-dropdown">
            <div class="perfil" onclick="toggleMenu()">
              <div class="imagenperfil">
                <img src="{{ auth()->check() ? auth()->user()->nombre_archivo_foto : 'ruta/por/defecto/si/no/hay/imagen' }}" alt="Imagen de perfil">
              </div>
              <p class="po">{{ auth()->check() ? auth()->user()->sir : 'Invitado' }}</p>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
              </svg>
            </div>
            <div class="dropdown-content" id="menu-content">
              <button class="btn btn-danger logout" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">Cerrar Sesion</button>
            </div>
          </div>
        </div>
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="logoutModalContent">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">¿Está seguro de cerrar sesión?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea cerrar su sesión actual?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar sesión</a>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>
</nav>