@extends('site.app')
@section('title', $project->LocalName)

@section('content')

@php
    $dir = ($local ?? app()->getLocale()) === 'ar' ? 'rtl' : 'ltr';
@endphp

<main id="main" dir="{{ $dir }}">

    <!-- ======= Page Header ======= -->
    <section id="page-title" class="page-header text-center text-white d-flex align-items-center justify-content-center">
        <div class="overlay"></div>
        <div class="container position-relative">
            <h1 class="fw-bold mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($project->LocalName), 30) }}</h1>
            <p class="mb-2">{{ __('site.projectdetails') }}</p>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('site.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/projects') }}">{{ __('site.projects') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::limit(strip_tags($project->LocalName), 20) }}</li>
            </ol>
        </div>
    </section>

    <!-- ======= Project Content ======= -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5">
                
                <!-- Left: Description -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm p-4">
                        <h3 class="fw-bold mb-4 text-primary">{{ $project->LocalName }}</h3>
                        <div class="project-description">
                            {!! $project->LocalDescription !!}
                        </div>
                    </div>
                </div>

                <!-- Right: Info Sidebar -->
                <div class="col-lg-4">
                    <div class="project-info p-4 rounded shadow-sm bg-white">
                        <h5 class="fw-bold mb-4 text-orange">{{ __('site.projectinfo') }}</h5>
                        <ul class="list-unstyled m-0">
                            <li class="mb-3 d-flex align-items-start">
                                <i class="bi bi-geo-alt-fill text-primary me-2 fs-5"></i>
                                <div>
                                    <strong>{{ __('site.state') }}:</strong><br>
                                    <span>{{ $project->state->LocalName ?? '-' }}</span>
                                </div>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="bi bi-tags-fill text-success me-2 fs-5"></i>
                                <div>
                                    <strong>{{ __('site.areawork') }}:</strong><br>
                                    @foreach($project->categories as $category)
                                        <span class="badge bg-warning text-dark">{{ $category->LocalName }}</span>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

@push('css')
<style>
/* === Page Header === */
.page-header {
    position: relative;
    background: #FFA94D;
    background-size: cover;
    background-position: center;
    padding: 80px 0;
    min-height: 220px;
}
.page-header .overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
}
.page-header h1 {
    font-size: 2.2rem;
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
[dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
    content: "‹";
}

/* === Project Content === */
.project-description p {
    line-height: 1.8;
    font-size: 1.05rem;
    color: #444;
}
.project-info {
    border-left: 5px solid #FFA94D;
}
.text-orange {
    color: #FFA94D;
}
.project-info i {
    width: 24px;
}

/* === Responsive === */
@media (max-width: 767px) {
    .page-header {
        padding: 60px 0;
    }
    .page-header h1 {
        font-size: 1.8rem;
    }
}
</style>
@endpush

@stop
