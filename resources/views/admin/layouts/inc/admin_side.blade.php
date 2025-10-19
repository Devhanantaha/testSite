<aside class="navbar navbar-vertical  navbar-expand-lg @if(App::getLocale() == 'ar') navbar-right 
 @endif">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" href="#navbar-layout" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
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
        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" href="#navbar-layout" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
          </svg>
        </a>
        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" href="#navbar-layout" data-bs-toggle="tooltip" data-bs-placement="bottom">
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
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" href="#navbar-layout" data-bs-toggle="dropdown" aria-label="Open user menu">
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


        @canany(['tracks-create','tracks-view','tracks-edit','tracks-delete',
        'tracks-footer','course-types-create','course-types-view',
        'course-types-edit','course-types-delete','courses-create','courses-view','courses-edit','courses-delete','recommened-courses-view',
        'make-recommened-courses-view','recent-courses-view'])

        <li class="nav-item  dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.comments.*','admin.courses.*','admin.recommendCourses','admin.startsoonCourses','admin.lectures.*','admin.levels.*','admin.tracks.*','admin.course-types.*','admin.coursesections.*'])) show @endif" href="" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.courses.title') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.coursesections.*','admin.coursereviews','admin.comments.*','admin.courses.*','admin.recommendCourses','admin.startsoonCourses','admin.lectures.*','admin.levels.*','admin.tracks.*','admin.course-types.*'])) show @endif">
            <div class="dropdown-menu-columns ">
              <div class="dropdown-menu-column ">
                @canany(['tracks-create','tracks-view','tracks-edit','tracks-delete','tracks-footer'])
                <a class="dropdown-item @if(request()->routeIs(['admin.tracks.index','admin.tracks.edit'])) active @endif" href="{{ url('admin/tracks')}}">
                  {{ __('navbar.courses.list_tracks') }}

                </a>
                @endcanany
                @canany(['tracks-create'])

                <a class="dropdown-item @if(request()->routeIs(['admin.tracks.create'])) active @endif" href="{{ url('admin/tracks/create')}}">
                  {{ __('navbar.courses.add_track') }}

                </a>
                @endcanany
                @canany(['course-sections-create','course-sections-view','course-sections-edit','course-sections-delete'])
                <a class="dropdown-item @if(request()->routeIs(['admin.coursesections.index','admin.coursesections.edit'])) active @endif" href="{{ url('admin/course-sections')}}">
                  {{ __('navbar.courses.list_sections') }}

                </a>
                @endcanany
                @canany(['course-sections-create'])
                <a class="dropdown-item @if(request()->routeIs(['admin.coursesections.create'])) active @endif" href="{{ url('admin/course-sections/create')}}">
                  {{ __('navbar.courses.add_section') }}

                </a>
                @endcanany
              

              
              
            
              

                @canany(['recent-courses-view'])
                <a class="dropdown-item @if(request()->routeIs(['admin.startsoonCourses'])) active @endif" href="{{ url('admin/start-soon-courses')}}">

                  {{ __('navbar.courses.start_soon_courses') }}

                </a>
                @endcanany

                @canany(['recommened-courses-view'])
                <a class="dropdown-item @if(request()->routeIs(['admin.recommendCourses'])) active @endif" href="{{ url('admin/recommend-courses?recommend=1')}}">

                  {{ __('navbar.courses.recommend_courses') }}

                </a>
                @endcanany

                @canany(['courses-create','courses-view','courses-edit','courses-delete'])

                <a class="dropdown-item @if(request()->routeIs('admin.courses.index')) active @endif" href="{{ url('admin/courses')}}">
                  {{ __('navbar.courses.all_courses') }}

                </a>
                @endcanany

                @canany(['courses-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.courses.create')) active @endif" href="{{ url('admin/courses/create')}}">
                  {{ __('navbar.courses.add_course') }}

                </a>
                @endcanany

                @canany(['course-types-create','course-types-view','course-types-edit','course-types-delete'])
                <a class="dropdown-item @if(request()->routeIs(['admin.course-types.index','admin.course-types.edit'])) active @endif" href="{{ url('admin/course-types')}}">
                  {{ __('navbar.courses.list_course_types') }}

                </a>
                @endcanany

                <a class="dropdown-item  @if(request()->routeIs('admin.countries.*')) active @endif " href="{{url('admin/countries')}}">
                  {{ __('navbar.countries') }}
                </a>
              </div>

            </div>
          </div>
        </li>
        @endcanany

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


        @canany(['downloads-create','downloads-edit','downloads-delete','downloads-view'])
        <li class=" nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs('admin.downloads.*')) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-discount">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 15l6 -6" />
                <circle cx="9.5" cy="9.5" r=".5" fill="currentColor" />
                <circle cx="14.5" cy="14.5" r=".5" fill="currentColor" />
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.downloads.downloads_management') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs('admin.downloads.*')) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                @canany(['downloads-edit','downloads-delete','downloads-view'])

                <a class="dropdown-item @if(request()->routeIs(['admin.downloads.index','admin.downloads.edit'])) active @endif" href="{{url('/admin/downloads')}}">
                  {{ __('navbar.downloads.list') }}

                </a>
                @endcanany
                @canany(['downloads-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.downloads.create')) active @endif" href="{{url('/admin/downloads/create')}}">
                  {{ __('navbar.downloads.add') }}
                </a>
                @endcanany

              </div>
            </div>
          </div>
        </li>
        @endcanany


        @canany(['videos-create','videos-edit','videos-delete','videos-view'])
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs('admin.videos.*')) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-discount">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 15l6 -6" />
                <circle cx="9.5" cy="9.5" r=".5" fill="currentColor" />
                <circle cx="14.5" cy="14.5" r=".5" fill="currentColor" />
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.videos.videos_management') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs('admin.videos.*')) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                @canany(['videos-edit','videos-delete','videos-view'])

                <a class="dropdown-item @if(request()->routeIs(['admin.videos.index','admin.videos.edit'])) active @endif" href="{{url('/admin/videos')}}">
                  {{ __('navbar.videos.list') }}

                </a>
                @endcanany
                @canany(['videos-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.videos.create')) active @endif" href="{{url('/admin/videos/create')}}">
                  {{ __('navbar.videos.add') }}
                </a>
                @endcanany

              </div>
            </div>
          </div>
        </li>
        @endcanany





        @canany(['faq-create','faq-edit','faq-delete','faq-view'])
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs('admin.questions.*')) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-discount">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 15l6 -6" />
                <circle cx="9.5" cy="9.5" r=".5" fill="currentColor" />
                <circle cx="14.5" cy="14.5" r=".5" fill="currentColor" />
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.faq.faq_management') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs('admin.questions.*')) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                @canany(['faq-edit','faq-delete','faq-view'])

                <a class="dropdown-item @if(request()->routeIs(['admin.questions.index','admin.questions.edit'])) active @endif" href="{{url('/admin/questions')}}">
                  {{ __('navbar.faq.list') }}

                </a>
                @endcanany
                @canany(['faq-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.questions.create')) active @endif" href="{{url('/admin/questions/create')}}">
                  {{ __('navbar.faq.add') }}
                </a>
                @endcanany

              </div>
            </div>
          </div>
        </li>
        @endcanany


        @canany(['blogs-create','blogs-edit','blogs-delete','blogs-view'])
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.blogs.index','admin.blogs.edit','admin.blogs.create'])) show @endif " href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 9l9 6l9 -6l-9 -6l-9 6"></path>
                <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path>
                <path d="M3 19l6 -6"></path>
                <path d="M15 13l6 6"></path>
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.blogs.blogs_management') }}
            </span>
          </a>
          <div class="dropdown-menu  @if(request()->routeIs(['admin.blogs.index','admin.blogs.edit','admin.blogs.create']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                @canany(['blogs-edit','blogs-delete','blogs-view'])
                <a class="dropdown-item @if(request()->routeIs(['admin.blogs.index','admin.blogs.edit'])) active @endif" href="{{ url('admin/blogs')}}">
                  {{ __('navbar.blogs.list') }}

                </a>
                @endcanany
                @canany(['blogs-create'])
                <a class="dropdown-item @if(request()->routeIs(['admin.blogs.create'])) active @endif" href="{{ url('admin/blogs/create')}}">
                  {{ __('navbar.blogs.add') }}

                </a>
                @endcanany
              </div>
            </div>
          </div>
        </li>
        @endcanany


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


        @canany(['users-create', 'users-view','users-edit', 'users-delete','role-view', 'role-edit','roles-create', 'roles-delete' ])
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @if(request()->routeIs(['admin.users.*','admin.roles.*'])) show @endif" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.user_managment') }}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs(['admin.users.*','admin.roles.*'])) show @endif">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                @canany(['role-view', 'role-edit', 'roles-delete' ])
                <a class="dropdown-item @if(request()->routeIs(['admin.roles.index','admin.roles.edit'])) active @endif" href="{{url('admin/roles')}}">
                  {{ __('navbar.roles.list') }}
                </a>
                @endcanany
                @canany([ 'roles-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.roles.create')) active @endif" href="{{url('admin/roles/create')}}">
                  {{ __('navbar.roles.add') }}
                </a>
                @endcanany

                @canany([ 'users-view','users-edit', 'users-delete'])
                <a class="dropdown-item @if(request()->routeIs(['admin.users.index','admin.users.edit'])) active @endif" href="{{url('admin/users')}}">
                  {{ __('navbar.users.list') }}

                </a>
                @endcanany
                @canany([ 'users-create'])
                <a class="dropdown-item @if(request()->routeIs('admin.users.create')) active @endif" href="{{url('admin/users/create')}}">
                  {{ __('navbar.users.add') }}

                </a>
                @endcanany


              </div>
            </div>
          </div>
        </li>
        @endcanany
        <!-- Not  -->



        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  @if(request()->routeIs(['admin.languages.*','admin.settings.zoom','admin.bulk.import-export','admin.settings.mail','admin.faq.*','admin.settings.aboutUSSetting','admin.payment-types.*','admin.countries.*','admin.teams.*','admin.parteners.*','admin.setting.index','admin.policies.*']))  show @endif " href="#navbar-extra" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
              </svg>
            </span>
            <span class="nav-link-title">
              {{ __('navbar.master_data')}}
            </span>
          </a>
          <div class="dropdown-menu @if(request()->routeIs(['admin.languages.*','admin.settings.zoom','admin.bulk.import-export','admin.settings.mail','admin.reviews.*','admin.langauges.*','admin.settings.contactUs','admin.faq.*','admin.settings.aboutUSSetting','admin.setting.landingSetting','admin.payment-types.*','admin.countries.*','admin.teams.*','admin.parteners.*','admin.setting.index','admin.policies.*']))  show @endif ">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">

                <a class="dropdown-item  @if(request()->routeIs('admin.setting.index')) active @endif " href="{{url('admin/setting')}}">

                  {{ __('navbar.settings.general_settings') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.setting.landingSetting')) active @endif " href="{{url('admin/landing-page-settings')}}">

                  {{ __('navbar.settings.home_settings') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.settings.aboutUSSetting')) active @endif " href="{{url('admin/about-us-settings')}}">

                  {{ __('navbar.settings.about_us_settings') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.settings.contactUs')) active @endif " href="{{url('admin/contact-us-settings')}}">

                  {{ __('navbar.settings.contactus_settings') }}
                </a>

                <a class="dropdown-item  @if(request()->routeIs('admin.parteners.*')) active @endif " href="{{url('admin/parteners')}}">

                  {{ __('navbar.settings.parteners') }}
                </a>
                <a class="dropdown-item  @if(request()->routeIs('admin.teams.*')) active @endif " href="{{url('admin/teams')}}">

                  {{ __('navbar.settings.teams') }}
                </a>






              </div>

            </div>
          </div>
        </li>


      </ul>
    </div>
  </div>
</aside>