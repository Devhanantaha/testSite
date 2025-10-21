@extends('admin.layouts.master')
@section('title', __('admin.dashboard.statics'))

@section('content')
<div class="page-body">
  <div class="container-xl">
    <div class="row row-deck row-cards">

      <div class="row row-cards">
        <div class="col-12">
          <div class="row row-cards">

            {{-- Projects --}}
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-primary text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24"
                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M3 7h18a1 1 0 0 1 1 1v10a2 2 0 0 1 -2 2h-16a2 2 0 0 1 -2 -2v-10a1 1 0 0 1 1 -1z" />
                          <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                          <path d="M12 12l0 .01" />
                        </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">{{ $projects_count }}</div>
                      <div class="text-secondary">{{ __('admin.projects.title') }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Levels --}}
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-success text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layers" width="24"
                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 2l9 4.5l-9 4.5l-9 -4.5z" />
                          <path d="M3 12l9 4.5l9 -4.5" />
                          <path d="M3 17l9 4.5l9 -4.5" />
                        </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">{{ $levels_count }}</div>
                      <div class="text-secondary">{{ __('admin.levels.title') }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Fields --}}
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-warning text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24"
                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M4 4h6v6h-6z" />
                          <path d="M14 4h6v6h-6z" />
                          <path d="M4 14h6v6h-6z" />
                          <circle cx="17" cy="17" r="3" />
                        </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">{{ $fields_count }}</div>
                      <div class="text-secondary">{{ __('admin.fields.title') }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Contact Messages --}}
            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-danger text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24"
                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <rect x="3" y="5" width="18" height="14" rx="2" />
                          <polyline points="3 7 12 13 21 7" />
                        </svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">{{ $contact_messages_count }}</div>
                      <div class="text-secondary">{{ __('admin.contact_messages_title') }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div> {{-- end row --}}
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
