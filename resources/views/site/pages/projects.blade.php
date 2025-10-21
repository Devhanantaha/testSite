@extends('site.app')
@section('title', __('site.projects'))

@section('content')

@php
  $isRtl = App::getLocale() === 'ar';
@endphp

<!-- ===== Page Header ===== -->
<section id="page-title" class="page-header text-center text-white d-flex align-items-center justify-content-center" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
  <div class="overlay"></div>
  <div class="container position-relative">
    <h1 class="fw-bold">{{ __('site.projects') }}</h1>
    <p class="mb-2">{{ __('site.allprojects') }}</p>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">{{ __('site.home') }}</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ __('site.projects') }}
      </li>
    </ol>
  </div>
</section>

<!-- ===== Projects Section ===== -->
<section id="content" class="py-5 bg-light" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
  <div class="container">
    @foreach ($projects as $project)
      <div class="project-row bg-white shadow-sm rounded overflow-hidden mb-4 {{ $isRtl ? 'rtl' : 'ltr' }}">
        <div class="row g-0 align-items-stretch">
          
          <!-- Image -->
          <div class="col-lg-4 col-md-5 {{ $isRtl ? 'order-lg-2' : '' }}">
            <a href="{{ url('/project/' . ($project->slug ?? $project->id)) }}" class="d-block h-100">
              <img src="{{ asset($project->MainImage) }}" alt="{{ $project->localname }}" class="img-fluid w-100 h-100 object-fit-cover">
            </a>
          </div>

          <!-- Content -->
          <div class="col-lg-8 col-md-7 p-4 d-flex flex-column justify-content-between {{ $isRtl ? 'text-end' : 'text-start' }}">
            <div>
              <h4 class="fw-bold mb-2">
                <a href="{{ url('/project/' . ($project->slug ?? $project->id)) }}" class="text-dark text-decoration-none">
                  {{ $project->localname }}
                </a>
              </h4>

              @if($project->level)
                <p class="text-primary small mb-1">
                  <i class="icon-star"></i> {{ $project->level->localname ?? '' }}
                </p>
              @endif

              <p class="text-muted small mb-3">
                {{ \Illuminate\Support\Str::limit(strip_tags($project->local_description), 180, '...') }}
              </p>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3 {{ $isRtl ? 'flex-row-reverse' : '' }}">
              <div>
                @if($project->categories ?? false)
                  @foreach($project->categories as $category)
                    <span class="badge bg-warning text-dark">{{ $category->localname }}</span>
                  @endforeach
                @endif
                @if($project->state ?? false)
                  <span class="ms-2 text-muted small">
                    <i class="icon-map-marker2 text-primary"></i> {{ $project->state->localname }}
                  </span>
                @endif
              </div>

              <a href="{{ url('/project/' . ($project->slug ?? $project->id)) }}" class="btn btn-sm btn-primary">
                {{ __('site.view_details') }}
              </a>
            </div>
          </div>

        </div>
      </div>
    @endforeach
  </div>
</section>

@push('css')
<style>
/* ===== Page Header ===== */
.page-header {
  position: relative;
  background: #FFA94D;
  padding: 80px 0;
  min-height: 220px;
  background-size: cover;
  background-position: center;
}
.page-header .overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.3);
}
.page-header h1 {
  font-size: 2.3rem;
  color: #fff;
}
.page-header p {
  color: #fff8f0;
  font-size: 1rem;
}

/* ===== Project Rows ===== */
.project-row {
  border: 1px solid #eee;
  transition: all 0.3s ease;
}
.project-row:hover {
  transform: translateY(-3px);
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}
.object-fit-cover {
  object-fit: cover;
}
.project-row img {
  height: 100%;
  min-height: 220px;
  transition: transform 0.3s ease;
}
.project-row:hover img {
  transform: scale(1.03);
}
.project-row h4 a:hover {
  color: #007bff;
}

/* RTL Support */
[dir="rtl"] .project-row {
  text-align: right;
}
[dir="rtl"] .project-row .btn {
  direction: rtl;
}
[dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
  content: "‹";
  padding: 0 0.5rem;
}

/* Responsive */
@media (max-width: 767px) {
  .project-row img {
    min-height: 180px;
  }
  .project-row {
    flex-direction: column;
  }
}
</style>
@endpush

@stop
