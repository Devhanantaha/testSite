@extends('site.app')
@section('title', __('site.download_page'))

@section('content')
<section id="page-title" class="py-5 bg-light border-bottom">
  <div class="container text-center">
    <h1 class="fw-bold mb-2 text-primary">{{ __('site.download_page') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}" class="text-decoration-none text-dark">{{ __('site.home') }}</a>
      </li>
      <li class="breadcrumb-item active text-primary" aria-current="page">{{ __('site.download_page') }}</li>
    </ol>
  </div>
</section>

<section id="content" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        @if($downloads->count())
          <ul class="list-unstyled downloads-list">
            @foreach($downloads as $download)
              <li class="d-flex align-items-center justify-content-between p-3 mb-3 shadow-sm rounded bg-white hover-shadow-sm">
                <div class="d-flex align-items-center">
                  <div class="icon-wrap me-3 text-primary">
                    <i class="icon-download i-large"></i>
                  </div>
                  <div>
                    <h5 class="mb-1 fw-semibold">
                      <a 
                        href="{{ $download->url ?: $download->attachment_url }}" 
                        target="_blank"
                        class="text-decoration-none text-dark hover-text-primary">
                        {{ $download->local_title }}
                      </a>
                    </h5>
                    <small class="text-muted">{{ __('site.click_to_download') }}</small>
                  </div>
                </div>

                <a 
                  href="{{ $download->url ?: $download->attachment_url }}" 
                  target="_blank"
                  class="btn btn-primary btn-sm">
                  <i class="icon-line-arrow-down-circle"></i> {{ __('site.download') }}
                </a>
              </li>
            @endforeach
          </ul>
        @else
          <div class="alert alert-info text-center">
            {{ __('site.no_files_available') }}
          </div>
        @endif

      </div>
    </div>
  </div>
</section>

{{-- Styles --}}
<style>
  .downloads-list li {
    transition: all 0.3s ease;
  }
  .downloads-list li:hover {
    background-color: #fff7e6;
    transform: translateY(-2px);
  }
  .icon-wrap i {
    font-size: 2rem;
  }
  .hover-text-primary:hover {
    color: #ff9800 !important;
  }
  .btn-primary {
    background-color: #ff9800;
    border: none;
  }
  .btn-primary:hover {
    background-color: #e68900;
  }
</style>

@if(app()->getLocale() === 'ar')
<style>
  .downloads-list li {
    direction: rtl;
    text-align: right;
  }
  .downloads-list .icon-wrap {
    margin-left: 1rem;
    margin-right: 0;
  }
</style>
@endif
@stop
