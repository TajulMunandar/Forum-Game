<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand">
      <a class="navbar-brand fs-5 fw-bold" href="/">
        <span class="merek">FORUM</span> GAMES
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      {{-- Dashboard --}}
      <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link">
          <i class="fa-duotone fa-grid-2 me-3"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>


        {{-- User --}}
        <li class="menu-item {{ Request::is('dashboard/game*') ? 'active open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="fa-duotone fa-gamepad me-3"></i>
            <div data-i18n="Layouts">Game</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item {{ Request::is('dashboard/game/list-game*') ? 'active' : '' }}">
              <a href="/dashboard/game/list-game" class="menu-link">
                <div data-i18n="game">Game</div>
              </a>
            </li>
            <li class="menu-item {{ Request::is('dashboard/game/list-kategori*') ? 'active' : '' }}">
              <a href="/dashboard/game/list-kategori" class="menu-link">
                <div data-i18n="user">Kategori</div>
              </a>
            </li>
          </ul>
        </li>

        {{-- Progress --}}
        <li class="menu-item {{ Request::is('dashboard/user*') ? 'active open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="fa-duotone fa-gear me-3"></i>
            <div data-i18n="progress">Setting</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
              <a href="/dashboard/user" class="menu-link">
                <div data-i18n="materi4">User</div>
              </a>
            </li>
          </ul>
        </li>
    </ul>
  </aside>
