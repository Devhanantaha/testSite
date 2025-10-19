@extends('site.app')
@section('title', __('site.projects'))

@section('content')

<section id="page-title" class="page-header text-center text-white d-flex align-items-center justify-content-center">
  <div class="overlay"></div>
  <div class="container position-relative">
      <h1 class="fw-bold">{{ __('site.projects') }}</h1>
      <p class="mb-2">{{ __('site.allprojects') }}</p>
      <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('site.home') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('site.projects') }}</li>
      </ol>
  </div>
</section>

<section id="content" class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      @foreach ($projects as $project)
        <div class="col-lg-4 col-md-6">
          <div class="project-card h-100 shadow-sm rounded overflow-hidden bg-white">
            
            <!-- Image -->
            <a href="{{ url('/project/' . $project->slug) }}" class="d-block project-img">
              @if($project->images->count())
                <img src="{{ asset('public/storage/' . $project->images->first()['thumbnail']) }}" alt="{{ $project->LocalName }}">
              @else
                <img src="{{ asset('public/defaults/no-image.jpg') }}" alt="No image available">
              @endif
            </a>

            <!-- Content -->
            <div class="p-3">
              <h5 class="fw-bold mb-2">
                <a href="{{ url('/project/' . $project->slug) }}" class="text-dark text-decoration-none">
                  {{ $project->LocalName }}
                </a>
              </h5>

              <div class="mb-2 small text-muted d-flex flex-wrap gap-1 align-items-center">
                <span>
                  @foreach($project->categories as $category)
                    <span class="badge bg-warning text-dark">{{ $category->LocalName }}</span>
                  @endforeach
                </span>
                <span class="ms-2">
                  <i class="icon-map-marker2 text-primary"></i> {{ $project->state->LocalName ?? '' }}
                </span>
              </div>

              <p class="text-muted small mb-3">
                {{ \Illuminate\Support\Str::limit(strip_tags($project->LocalDescription), 100, '...') }}
              </p>

              <a href="{{ url('/project/' . $project->slug) }}" class="btn btn-sm btn-primary">
                {{ __('site.view') }}
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
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
.page-header .container {
  position: relative;
  z-index: 2;
}
.page-header h1 {
  font-size: 2.3rem;
  color: #fff;
}
.page-header p {
  color: #fff8f0;
  font-size: 1rem;
}
.breadcrumb {
  background: transparent;
}
.breadcrumb-item a {
  color: #fff;
  text-decoration: none;
}
.breadcrumb-item.active {
  color: #fefefe;
}

/* ===== Project Cards ===== */
.project-card {
  transition: all 0.3s ease;
  border: 1px solid #eee;
}
.project-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
}
.project-img img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: transform 0.3s ease;
}
.project-card:hover .project-img img {
  transform: scale(1.05);
}
.project-card h5 a:hover {
  color: #007bff;
}

/* RTL Adjustments */
[dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
  content: "‹";
}
[dir="rtl"] .project-card {
  text-align: right;
}

/* Responsive */
@media (max-width: 767px) {
  .page-header h1 {
    font-size: 1.8rem;
  }
  .project-img img {
    height: 180px;
  }
}
</style>
@endpush

@stop
