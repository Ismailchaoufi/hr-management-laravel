<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="{{ asset('upload_files/logo_app/logo_pfa_v.png') }}"  style="width: 200px; height: 150px; margin: 0 auto; " >
      </a>
    </div>
    <div class="sidenav-body">
    <hr class="horizontal light">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('admin.dashboardadmin') ? 'active bg-gradient-primary' : '' }}" href="{{ route('admin.dashboardadmin') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('listdemandes.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('listdemandes.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">list</i>
            </div>
            <span class="nav-link-text ms-1">Liste des Demandes</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ Route::is('users.create') || Route::is('users.index') ? 'active bg-gradient-primary' : '' }}" href="#submenuUsers" data-bs-toggle="collapse" role="button" aria-expanded="{{ Route::is('users.create') || Route::is('users.index') ? 'true' : 'false' }}" aria-controls="submenuUsers">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">manage_accounts</i>
                </div>
                <span class="nav-link-text ms-1">Gérer Utilisateur</span>
            </a>
            <div class="collapse {{ Route::is('users.create') || Route::is('users.index') ? 'show' : '' }}" id="submenuUsers">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Route::is('users.create') ? 'active bg-gradient-primary' : '' }}" href="{{ route('users.create') }}">
                            <i class="material-icons me-2">person_add</i> Ajouter Utilisateur
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Route::is('users.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('users.index') }}">
                            <i class="material-icons me-2">people</i> Liste des Utilisateurs
                        </a>
                    </li>
                </ul>
            </div>
        </li>             
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('notifications.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('notifications.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('conversations.index') || Route::is('message.index') ? 'active bg-gradient-primary' : '' }}" href="#submenuChat" data-bs-toggle="collapse" role="button" aria-expanded="{{ Route::is('users.create') || Route::is('users.index') ? 'true' : 'false' }}" aria-controls="submenuChat">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">chat</i>
            </div>
            <span class="nav-link-text ms-1">DISCUSSION</span>
          </a>
          <div class="collapse {{ Route::is('conversations.index') || Route::is('message.index') ? 'show' : '' }}" id="submenuChat">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::is('conversations.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('conversations.index') }}">
                  <i class="material-icons me-2">lock</i> Discussion Privé
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::is('message.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('message.index') }}">
                  <i class="material-icons me-2">people</i> Discussion Public
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('division.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('division.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">place</i>
            </div>
            <span class="nav-link-text ms-1">Divisions</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('service.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('service.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">local_offer</i>
            </div>
            <span class="nav-link-text ms-1">Services</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('profileadmin.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('profileadmin.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Route::is('logout') ? 'active bg-gradient-primary' : '' }}" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Déconnexion</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
    </div>
    <style>
      .sidenav-body{
        margin-top: 60px;
      }

    </style>
  </aside>