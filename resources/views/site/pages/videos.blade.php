@extends('site.app')
@section('title', __('site.videos'))
@section('content')

@php
  $dir = app()->getLocale() === 'ar' ? 'rtl' : 'ltr';
  $textDir = $dir === 'rtl' ? 'text-end' : 'text-start';
@endphp

<!-- ======= Page Title ======= -->
<section id="page-title" class="py-5 bg-light border-bottom" dir="{{ $dir }}">
  <div class="container {{ $textDir }}">
    <h1 class="fw-bold mb-2 text-primary">{{ __('site.videos') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">{{ __('site.home') }}</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ __('site.videos') }}
      </li>
    </ol>
  </div>
</section>

<!-- ======= Videos Section ======= -->
<section id="content" class="py-5" dir="{{ $dir }}">
  <div class="container">
    <div class="row g-4">
      @forelse ($videos as $video)
      <div class="col-12 col-md-6 col-lg-4">
        <div class="video-card card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative">
          
          <!-- Thumbnail -->
          <div class="video-thumb position-relative overflow-hidden">
            <img src="{{ $video->imageFullPath }}" alt="{{ $video->LocalName }}" class="card-img-top img-fluid">
            <a href="{{ $video->imageFullPath }}" 
               class="play-btn position-absolute top-50 start-50 translate-middle overlay-trigger-icon"
               target="_blank" data-lightbox="iframe">
              <i class="icon-line-play fs-3"></i>
            </a>
          </div>

          <!-- Info -->
          <div class="card-body {{ $textDir }}">
            <h5 class="card-title mb-2 fw-semibold video-title">
              @if($video->video_url)
                <a href="{{ url($video->video_url) }}" target="_blank" class="text-decoration-none text-dark">
                  {{ $video->LocalName }}
                </a>
              @else
                {{ $video->LocalName }}
              @endif
            </h5>

            @php
              $shortDescription = \Illuminate\Support\Str::limit(strip_tags($video->LocalDescription), 80, '...');
            @endphp
            <p class="text-muted small mb-0 video-desc">{{ $shortDescription }}</p>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="text-muted">{{ __('site.no_videos_available') }}</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- ======= Custom Styles ======= -->
<style>
  /* ===== General Card Effects ===== */
  .video-card {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    cursor: pointer;
  }
  .video-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
  }

  /* ===== Thumbnail Zoom Effect ===== */
  .video-thumb img {
    transition: transform 0.5s ease;
  }
  .video-card:hover .video-thumb img {
    transform: scale(1.08);
  }

  /* ===== Play Button ===== */
  .play-btn {
    background: rgba(255, 255, 255, 0.9);
    color: #000;
    border-radius: 50%;
    padding: 18px;
    opacity: 0;
    transform: scale(0.9);
    transition: all 0.4s ease;
    box-shadow: 0 0 0 rgba(0, 123, 255, 0);
  }
  .video-card:hover .play-btn {
    opacity: 1;
    transform: scale(1);
    animation: pulse 2s infinite ease-in-out;
  }

  @keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.4); }
    70% { box-shadow: 0 0 0 15px rgba(0, 123, 255, 0); }
    100% { box-shadow: 0 0 0 0 rgba(0, 123, 255, 0); }
  }

  /* ===== Text Animation on Hover ===== */
  .video-title, .video-desc {
    transition: transform 0.4s ease, color 0.4s ease;
  }
  .video-card:hover .video-title {
    transform: translateY(-3px);
    color: #0d6efd; /* Bootstrap primary color */
  }
  .video-card:hover .video-desc {
    transform: translateY(-2px);
  }

  /* RTL Breadcrumb Arrow */
  [dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    transform: rotate(180deg);
  }
</style>

@stop

@push('scripts')
<script>
  // Video popup
  $('.overlay-trigger-icon').magnificPopup({
    type: 'iframe',
    preloader: true,
    iframe: {
      markup: '<div class="mfp-iframe-scaler">' +
        '<div class="mfp-close"></div>' +
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
        '</div>',
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: 'v=',
          src: '//www.youtube.com/embed/%id%?autoplay=1'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: '/',
          src: '//player.vimeo.com/video/%id%?autoplay=1'
        }
      },
      srcAction: 'iframe_src',
    }
  });
</script>
@endpush
