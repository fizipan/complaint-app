<header id="header" class="header center-aligned-navbar header-bg-transparent header-white-nav-links-lg header-abs-top"
          data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
          }'>
    <div class="header-section">
      <div id="logoAndNav" class="container py-4">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-lg">
          <!-- Logo -->
          <a class="navbar-brand" href="{{ route('home') }}" aria-label="Front">
            <img src="{{ asset('back-design/clients/img/logo.png') }}" style="max-width: 70px !important;" alt="Logo">
          </a>
          <!-- End Logo -->

          <!-- Secondary Content -->
          <div class="navbar-nav-wrap-content text-center">
            <div class="d-block">
              @guest
                <a class="btn btn-sm btn-ghost-light transition-3d-hover mr-2"  href="{{ route('login') }}">LOGIN</a>
                <a class="btn btn-sm btn-outline-light transition-3d-hover ml-2"  href="{{ route('register') }}">REGISTER</a>
              @endguest
            </div>
          </div>
          <!-- End Secondary Content -->

          <!-- Responsive Toggle Button -->
          @auth
            <button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="navBar"
                    data-toggle="collapse"
                    data-target="#navBar">
              <span class="navbar-toggler-default">
                <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
                </svg>
              </span>
              <span class="navbar-toggler-toggled">
                <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                </svg>
              </span>
            </button>
          @endauth
          <!-- End Responsive Toggle Button -->

          <!-- Navigation -->
          <div id="navBar" class="collapse navbar-collapse navbar-nav-wrap-collapse">
            <div class="ml-auto">
              <ul class="navbar-nav">
                @auth
                  <!-- Dropdown -->
                  <li class="hs-has-sub-menu navbar-nav-item">
                    <a id="dropdownMegaMenuWithDropdown" class="hs-mega-menu-invoker nav-link nav-link-toggle" style="color: white !important" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="dropdownSubMenuWithDropdown">{{ Auth::user()->name }}</a>

                    <!-- Dropdown - Submenu -->
                    <div id="dropdownSubMenuWithDropdown" class="hs-sub-menu dropdown-menu" aria-labelledby="dropdownMegaMenuWithDropdown" style="min-width: 230px;">
                      <a class="dropdown-item" href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}" 
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();
                        ">
                        Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                          @csrf
                      </form>
                    </div>
                    <!-- End Dropdown - Submenu -->
                  </li>
                  <!-- End Dropdown -->
                @endauth
              </ul>
            </div>
          </div>
          <!-- End Navigation -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
</header>