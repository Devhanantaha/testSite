@extends('site.app')
@section('title', __('site.events'))
@section('content')

@php
$isRtl = app()->getLocale() === 'ar';
$dir = $isRtl ? 'rtl' : 'ltr';
$textAlign = $isRtl ? 'text-end' : 'text-start';
@endphp

<!-- ======= Page Title ======= -->
<section id="page-title" dir="{{ $dir }}">
  <div class="container clearfix">
    <h1 class="{{ $textAlign }}">{{ __('site.events') }}</h1>
    <ol class="breadcrumb {{ $textAlign }}">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('site.home') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('site.events') }}</li>
    </ol>
  </div>
</section>

<!-- ======= Events Section ======= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="row">
        @foreach ($events as $event)
        <div class="col-6 col-md-4 mb-3 animate-on-scroll">
          <div class="portfolio-item fixed-card">
            <a href="{{ url('event/'. $event->id) }}" class="card-link d-block">
              <img src="{{ $event->imageFullPath ?? asset('public/uploads/events/default.png') }}" alt="{{ $event->title }}">
              <div class="overlay-always">
                <div class="overlay-text">
                  {{ $event->title }}
                </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- ======= Styling ======= -->
<style>
  .portfolio-item, .portfolio-image {
    display: block !important;
    width: 100%;
    height: 100%;
  }

  .fixed-card {
    position: relative;
    width: 100%;
    height: 320px;
    overflow: hidden;
    border-radius: 10px;
  }

  .fixed-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.4s ease;
    display: block;
  }

  .fixed-card:hover img {
    transform: scale(1.08);
  }

  .overlay-always {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.45);
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    transition: background 0.4s ease;
  }

  .fixed-card:hover .overlay-always {
    background: rgba(0,0,0,0.6);
  }

  .overlay-text {
    color: #fff;
    font-size: 22px;
    font-weight: bold;
    text-align: center;
    padding: 0 15px;
    line-height: 1.4;
  }

  .animate-on-scroll {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease;
  }

  .animate-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
  }

  @media (max-width: 991px) {
    .fixed-card { height: 260px; }
    .overlay-text { font-size: 18px; }
  }

  @media (max-width: 575px) {
    .fixed-card { height: 200px; }
    .overlay-text { font-size: 16px; }
  }

  .row > [class*='col-'] {
    padding-left: 8px;
    padding-right: 8px;
  }
</style>

<!-- ======= Scroll Animation Script ======= -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.animate-on-scroll');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    items.forEach(item => observer.observe(item));
  });
</script>

@stop
