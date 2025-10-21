<aside class="navbar navbar-vertical  navbar-expand-lg @if(App::getLocale() == 'ar') navbar-right 
 @endif">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" href="#" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href="{{url('/')}}">
        <img src="{{ asset($setting->logoFullPath)}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
      </a>
    </h1>
    <div class="navbar-nav flex-row d-lg-none">
      <div class="nav-item d-none d-lg-flex me-3">
        <div class="btn-list">
          <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
            </svg>
            Source code
          </a>
          <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
            </svg>
            Sponsor
          </a>
        </div>
      </div>
      <div class="d-none d-lg-flex">
        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
          </svg>
        </a>
        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
          </svg>
        </a>
        <div class="nav-item dropdown d-none d-md-flex me-3">
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Last updates</h3>
              </div>
              <div class="list-group list-group-flush list-group-hoverable">
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 1</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        Change deprecated html tags to text decoration classes (#29604)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 2</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        justify-content:between ⇒ justify-content:space-between (#29734)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions show">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 3</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        Update change-version.js (#29736)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                    <div class="col text-truncate">
                      <a href="#" class="text-body d-block">Example 4</a>
                      <div class="d-block text-secondary text-truncate mt-n1">
                        Regenerate package-lock.json (#29730)
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="list-group-item-actions">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" href="#" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
          <div class="d-none d-xl-block ps-2">
            <div>Paweł Kuna</div>
            <div class="mt-1 small text-secondary">UI Designer</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="#" class="dropdown-item">Status</a>
          <a href="./profile.html" class="dropdown-item">Profile</a>
          <a href="#" class="dropdown-item">Feedback</a>
          <div class="dropdown-divider"></div>
          <a href="./settings.html" class="dropdown-item">Settings</a>
          <a href="./sign-in.html" class="dropdown-item">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">

        <li class="nav-item @if(request()->routeIs('admin.dashboard')) active @endif">
          <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{url('admin/dashboard')}}">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.Home') }}
            </span>
          </a>
        </li>









        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.fields.*')) active @endif"
            href="{{ url('admin/fields') }}">
            <!-- Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layers" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <polyline points="12 2 2 7 12 12 22 7 12 2" />
              <polyline points="2 17 12 22 22 17" />
              <polyline points="2 12 12 17 22 12" />
            </svg>
            {{ __('navbar.fields.list') }}
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.levels.*')) active @endif"
            href="{{ url('admin/levels') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stairs" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 20h16v-8h-4v-4h-4v-4h-4v16z" />
            </svg>
            {{ __('navbar.levels.list') }}
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.countries.*')) active @endif"
            href="{{ url('admin/countries') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flag" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M5 5v16" />
              <path d="M5 5a5 5 0 0 1 5 -5h4a5 5 0 0 1 5 5v9a5 5 0 0 1 -5 5h-4a5 5 0 0 1 -5 -5z" />
            </svg>
            {{ __('navbar.countries') }}
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.projects.*')) active @endif"
            href="{{ url('admin/projects') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v13a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-13z" />
              <path d="M16 3v4h-8v-4z" />
            </svg>
            {{ __('admin.projects.list') }}
          </a>
        </li>
















        <li class="nav-item @if(request()->routeIs('admin.banners.*')) active @endif">
          <a class="nav-link @if(request()->routeIs('admin.banners.*')) active @endif" href="{{ route('admin.banners.index') }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- Banner icon (Tabler: photo / image) -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 8h.01" />
                <path d="M4 6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                <path d="M4 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.banners.banners_management') }}
            </span>
          </a>
        </li>



        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs(['admin.downloads.index', 'admin.downloads.edit'])) active @endif"
            href="{{ url('admin/downloads') }}">
            <!-- Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="20" height="20"
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
              stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
              <polyline points="7 11 12 16 17 11" />
              <line x1="12" y1="4" x2="12" y2="16" />
            </svg>
            {{ __('navbar.downloads.list') }}
          </a>
        </li>










@canany(['videos-view', 'videos-create', 'videos-edit', 'videos-delete'])
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.videos.*')) active @endif"
     href="{{ url('admin/videos') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="icon icon-tabler icon-tabler-video">
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <rect x="3" y="6" width="15" height="12" rx="2" />
      <path d="M18 8l4 4l-4 4z" />
    </svg>
    {{ __('navbar.videos.videos_management') }}
  </a>
</li>
@endcanany

@canany(['faq-view', 'faq-create', 'faq-edit', 'faq-delete'])
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.questions.*')) active @endif"
     href="{{ url('admin/questions') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="icon icon-tabler icon-tabler-help-circle">
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <circle cx="12" cy="12" r="9" />
      <path d="M12 16h.01" />
      <path d="M12 13a2 2 0 1 0 -2 -2" />
    </svg>
    {{ __('navbar.faq.faq_management') }}
  </a>
</li>
@endcanany



@canany(['blogs-view', 'blogs-create', 'blogs-edit', 'blogs-delete'])
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.blogs.*')) active @endif"
     href="{{ url('admin/blogs') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="icon icon-tabler icon-tabler-news">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M16 6v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-14a2 2 0 0 0 -2 -2h-2" />
      <path d="M16 8h4v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-16" />
      <path d="M8 12h8" />
      <path d="M8 16h8" />
      <path d="M8 8h8" />
    </svg>
    {{ __('navbar.blogs.blogs_management') }}
  </a>
</li>
@endcanany











<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            {{-- Custom SVG icon for News --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-13a1 1 0 0 1 1 -1h11" />
                <path d="M16 8h4" />
                <path d="M16 12h4" />
                <path d="M16 16h4" />
                <path d="M8 8h4v4h-4z" />
            </svg>
        </span>
        <span class="nav-link-title">
            {{ __('admin.News') }}
        </span>
    </a>
</li>



  <li class="nav-item @if(request()->routeIs('admin.contacts.*')) active @endif">
    <a class="nav-link @if(request()->routeIs('admin.contacts.*')) active @endif"
      href="{{ route('admin.contacts.index') }}">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <!-- Contact icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
          stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M21 15a2 2 0 0 1 -2 2h-4l-4 4v-4h-2a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v8z" />
        </svg>
      </span>
      <span class="nav-link-title">
        {{ __('navbar.contacts.title') }}
      </span>
    </a>
  </li>


  {{-- 👤 Users --}}
@canany(['users-view', 'users-create', 'users-edit', 'users-delete'])
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.users.*')) active @endif"
     href="{{ url('admin/users') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round" class="icon icon-tabler icon-tabler-users">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <circle cx="9" cy="7" r="4"/>
      <path d="M17 11v-2a4 4 0 1 0 -8 0v2"/>
      <path d="M12 14c-4.418 0 -8 1.79 -8 4v2h16v-2c0 -2.21 -3.582 -4 -8 -4z"/>
    </svg>
    {{ __('navbar.users.list') }}
  </a>
</li>
@endcanany



















{{-- ⚙️ General Settings --}}
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.setting.index')) active @endif"
     href="{{ url('admin/setting') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round" class="icon icon-tabler icon-tabler-settings">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
      <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
    </svg>
    {{ __('navbar.settings.general_settings') }}
  </a>
</li>


{{-- 🏠 Home Page Settings --}}
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.setting.landingSetting')) active @endif"
     href="{{ url('admin/landing-page-settings') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round" class="icon icon-tabler icon-tabler-home">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M5 12l-2 2l9 9l9 -9l-2 -2"/>
      <path d="M9 21v-8h6v8"/>
      <path d="M9 3l6 6l-6 6"/>
    </svg>
    {{ __('navbar.settings.home_settings') }}
  </a>
</li>


{{-- ℹ️ About Us Settings --}}
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.settings.aboutUSSetting')) active @endif"
     href="{{ url('admin/about-us-settings') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round" class="icon icon-tabler icon-tabler-info-circle">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <circle cx="12" cy="12" r="9"/>
      <path d="M12 16v-4"/>
      <path d="M12 8h.01"/>
    </svg>
    {{ __('navbar.settings.about_us_settings') }}
  </a>
</li>


{{-- 📞 Contact Us Settings --}}
<li class="nav-item">
  <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.settings.contactUs')) active @endif"
     href="{{ url('admin/contact-us-settings') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round" class="icon icon-tabler icon-tabler-phone">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M5 4h4l2 5l-2 2a11 11 0 0 0 6 6l2 -2l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -14 -14a2 2 0 0 1 2 -2"/>
    </svg>
    {{ __('navbar.settings.contactus_settings') }}
  </a>
</li>



  </ul>
  </div>
  </div>
</aside>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get all dropdown toggles
    const dropdownToggles = document.querySelectorAll('.nav-link.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
      toggle.addEventListener('click', function(e) {
        e.preventDefault();

        const parent = this.parentElement;
        const menu = parent.querySelector('.dropdown-menu');

        // Close other open dropdowns
        document.querySelectorAll('.nav-item.dropdown').forEach(item => {
          if (item !== parent) {
            item.classList.remove('show');
            const subMenu = item.querySelector('.dropdown-menu');
            if (subMenu) subMenu.classList.remove('show');
          }
        });

        // Toggle current dropdown
        parent.classList.toggle('show');
        if (menu) menu.classList.toggle('show');
      });
    });
  });
</script>