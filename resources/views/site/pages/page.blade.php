@extends('site.app')

@section('title', $row->title)

@section('content')

@php
    $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    $textDir = $dir === 'rtl' ? 'text-end' : 'text-start';
@endphp

<!-- ======= Page Title ======= -->
<section id="page-title" class="py-5 bg-light border-bottom" dir="{{ $dir }}">
  <div class="container {{ $textDir }}">
    <h1 class="fw-bold mb-2 text-primary">{{ $row->title }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">{{ __('site.home') }}</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ $row->title }}
      </li>
    </ol>
  </div>
</section>

    <!-- ======= Page Content ======= -->
    <section id="content" class="py-5">
        <div class="container">
            <h3 class="text-center"> {{ $row->title }} </h3>
            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    @if(isset($row->ImageFullPath))
                        <img src="{{ asset( $row->ImageFullPath) }}" 
                             alt="{{ $row->title }}" 
                             class="page-image mb-4">
                    @endif
                    <div class="lead text-muted px-lg-4" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        {!! $row->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


@push('css')
<style>
/* === Page Header === */
.page-header {
    position: relative;
    background: #FFA94D; /* Light Orange */
    background-size: cover;
    background-position: center;
    min-height: 250px;
    padding: 70px 0;
    overflow: hidden;
}
.page-header .overlay {
    position: absolute;
    inset: 0;
    background: rgb(253 253 254 / 25%);
    
    z-index: 1;
}
.page-header .container {
    position: relative;
    z-index: 2;
}
.page-header h1 {
    color: #fff;
    font-weight: 700;
    font-size: 2.3rem;
    letter-spacing: 0.5px;
}

/* === Breadcrumb Section === */
/* === Breadcrumb Section === */
.breadcrumb-section {
    background: #fff8f0;
    border-bottom: 1px solid #f3d9b1;
    padding: 12px 0;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
    color: #444;
}

.breadcrumb-item {
    font-size: 0.95rem;
    color: #555;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: #e67e22;
    margin: 0 6px;
}

[dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
    content: "‹";
}

.breadcrumb a {
    color: #e67e22;
    text-decoration: none;
    transition: color 0.2s;
    font-weight: 500;
}

.breadcrumb a:hover {
    color: #d35400;
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #444;
}


.page-header {
  position: relative;
  z-index: 1; /* ensure header stays above background */
}

.breadcrumb-section {
  position: relative;
  z-index: 2; /* force breadcrumb above header overlay */
  background: #fff8f0;
  border-bottom: 1px solid #f3d9b1;
  padding: 12px 0;
}

/* === Page Content === */
#content p {
    line-height: 1.8;
    font-size: 1.05rem;
}
.page-image {
    max-width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* === Responsive === */
@media (max-width: 768px) {
    .page-header {
        min-height: 180px;
        padding: 40px 0;
    }
    .page-header h1 {
        font-size: 1.8rem;
    }
}
</style>
@endpush

@stop
