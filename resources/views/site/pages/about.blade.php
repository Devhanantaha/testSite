@extends('site.app')
@section('title', 'about')
@section('content')








@php
$dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
$textDir = $dir === 'rtl' ? 'text-end' : 'text-start';
@endphp

<!-- ======= Page Title ======= -->
<section id="page-title" class="py-5 bg-light border-bottom" dir="{{ $dir }}">
  <div class="container {{ $textDir }}">
    <h1 class="fw-bold mb-2 text-primary">{{ __('site.about_us') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">{{ __('site.home') }}</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ __('site.about_us') }}
      </li>
    </ol>
  </div>
</section>

<div class="about-content margin-top-80 pt-6">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="content-left">




          {{ $about->description }}


        </div>
      </div>
      <div class="col-lg-5">
        <div class="thumb">
          <img src="{{ asset($about->backgroundImageFullPath) }}" alt="">

          <!-- video button -->
          <div class="video-btn-style-01">
            <a href="#"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- about content end  -->

@stop