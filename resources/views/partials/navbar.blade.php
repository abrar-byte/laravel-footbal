<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="#">XYZ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($active === " home") ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === " about") ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === " teams") ? 'active' : '' }}" href="/teams">Data Tim</a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link {{ ($active === " schedules") ? 'active' : '' }}" href="/schedules">Jadwal Pertandingan</a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link {{ ($active === " posts") ? 'active' : '' }}" href="/blog">Hasil Pertandingan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === " players") ? 'active' : '' }}" href="/players">Players</a>
        </li>

      </ul>
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My
                Dashboard</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log Out </button>
              </form>
          </ul>
        </li>

        @else
        <li class="nav-item">
          <a href="/login" class="nav-link {{ ($active === " login") ? 'active' : '' }}"><i
              class="bi bi-box-arrow-in-right"></i> Login</a>

        </li>
        @endauth
      </ul>


    </div>
  </div>
</nav>