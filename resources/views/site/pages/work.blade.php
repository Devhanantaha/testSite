@extends('site.app')
@section('title', $area->LocalName)

@section('content')

<!-- ===== PAGE HEADER ===== -->
<section class="page-header" style="background-color:#006bb71a;">
  <div class="container text-center py-5">
    <h1 class="fw-bold text-dark mb-3">{{ $area->LocalName }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}" class="text-primary text-decoration-none">{{ __('site.home') }}</a>
      </li>
      <li class="breadcrumb-item">
        <a href="#" class="text-primary text-decoration-none">{{ __('site.areawork') }}</a>
      </li>
      <li class="breadcrumb-item active text-dark" aria-current="page">{{ $area->LocalName }}</li>
    </ol>
  </div>
</section>

<!-- ===== CONTENT ===== -->
<section id="content" class="py-5 bg-white">
  <div class="container">

    <!-- Tabs -->
    <ul class="nav nav-tabs justify-content-center mb-4 border-0" id="areaTabs" role="tablist">
      @foreach ([
        'overview' => __('site.overview'),
        'stories'  => __('site.stories'),
        'voices'   => __('site.voices'),
        'gallery'  => __('site.gallery')
      ] as $key => $label)
        <li class="nav-item" role="presentation">
          <button class="nav-link @if($loop->first) active @endif px-4 py-2"
                  id="{{ $key }}-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#{{ $key }}"
                  type="button" role="tab">{{ $label }}</button>
        </li>
      @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="areaTabsContent">

      <!-- Overview -->
      <div class="tab-pane fade show active" id="overview" role="tabpanel">
        <div class="card border-0 shadow-sm rounded-4 p-4">
          {!! $area->LocalDescription !!}
        </div>
      </div>

      <!-- Stories -->
      <div class="tab-pane fade" id="stories" role="tabpanel">
        <div class="row g-4">
          @foreach ($area->stories as $story)
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
              <img src="{{ asset('public/storage/'.$story->image ) }}" class="card-img-top" alt="{{ $story->LocalName }}">
              <div class="card-body">
                <h5 class="fw-semibold text-orange">{{ $story->LocalName }}</h5>
                <p class="text-muted small">{{ strip_tags(Str::limit($story->LocalDescription, 150)) }}</p>
                <a href="{{ route('page.show', $story->slug) }}/{{ $local }}" class="btn btn-link text-orange p-0 fw-semibold">{{ __('site.readmore') }} →</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Voices -->
      <div class="tab-pane fade" id="voices" role="tabpanel">
        <div class="row g-4">
          @foreach ($area->vedios as $vedio)
          <div class="col-md-4 col-lg-3">
            <div class="video-card rounded-4 overflow-hidden shadow-sm position-relative">
              <img src=" {{  asset('public/storage/'.$vedio->image) }}" class="img-fluid" alt="{{ $vedio->LocalName }}">
              <a href="{{ $vedio->LocalDescription }}" class="play-btn position-absolute top-50 start-50 translate-middle">
                <i class="icon-line-play"></i>
              </a>
            </div>
            <p class="mt-2 text-center fw-semibold text-orange">{{ $vedio->LocalName }}</p>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Gallery -->
      <div class="tab-pane fade" id="gallery" role="tabpanel">
        <div class="row g-3">
          @foreach ($area->products as $product)
          @foreach ($product->images as $image)
          <div class="col-6 col-md-3">
            <a href="/storage/{{ $image->full }}" data-lightbox="gallery-item">
              <img src="{{ asset('public/storage/'. $image->thumbnail ) }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $product->LocalName }}">
            </a>
          </div>
          @endforeach
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
  /* === Color theme === */
  .text-orange { color: #ff8c00; }
  .btn-link.text-orange:hover { text-decoration: underline; color: #e67e00; }

  /* === Header === */
  .page-header {
    background-color: #006bb71a; /* your color */
  }

  .breadcrumb-item + .breadcrumb-item::before {
    color: #999;
  }

  /* === Tabs === */
  .nav-tabs .nav-link {
    border: none;
    background-color: transparent;
    color: #555;
    font-weight: 500;
    border-bottom: 2px solid transparent;
    transition: all .3s ease;
  }
  .nav-tabs .nav-link.active {
    color: #ff8c00;
    border-color: #ff8c00;
    font-weight: 600;
  }
  .nav-tabs .nav-link:hover {
    color: #ff8c00;
  }

  /* === Card & Hover === */
  .card { transition: transform .3s ease; }
  .card:hover { transform: translateY(-5px); }

  /* === Video Play Button === */
  .play-btn {
    width: 50px; height: 50px;
    background: rgba(255,140,0,0.9);
    border-radius: 50%;
    color: #fff;
    font-size: 22px;
    display: flex; align-items: center; justify-content: center;
  }
  .play-btn:hover { background: #e67e00; }
</style>
@endpush
