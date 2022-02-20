<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/players*') ? 'active' : '' }}" href="/dashboard/players">
          <span data-feather="file-text"></span>
          Players
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/schedules*') ? 'active' : '' }}" href="/dashboard/schedules">
          <span data-feather="file-text"></span>
          Schedules
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/">
          <span data-feather="file-text"></span>
          Back to Home
        </a>
      </li>

    </ul>

    @can('admin')

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>

    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/teams*') ? 'active' : '' }}" href="/dashboard/teams">
          <span data-feather="grid"></span>
          Post teams
        </a>

      </li>

    </ul>
    @endcan


  </div>
</nav>