@extends('site.app')
@section('title', __('site.applay'))

@section('content')

@php
    $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    $textDir = $dir === 'rtl' ? 'text-end' : 'text-start';
@endphp

<!-- ======= Page Title ======= -->
<section id="page-title" class="py-5 bg-light border-bottom" dir="{{ $dir }}">
  <div class="container {{ $textDir }}">
    <h1 class="fw-bold mb-2 text-primary">{{ __('site.applay') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">{{ __('site.home') }}</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ __('site.applay') }}
      </li>
    </ol>
  </div>
</section>


<!-- ===== CONTENT ===== -->
<section id="content" class="py-5" dir="{{ $dir }}">
  <div class="container">
    <div class="accordion" id="grantsAccordion">

      @foreach($grants as $index => $grant)
      <div class="accordion-item mb-3 shadow-sm rounded-4 border-0 overflow-hidden">
        <h2 class="accordion-header" id="heading{{ $index }}">
          <button class="accordion-button collapsed fw-semibold grant-header" type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapse{{ $index }}"
                  aria-expanded="false"
                  aria-controls="collapse{{ $index }}">
            <i class="icon-line-check-circle text-primary me-2"></i>
            {{ $grant->question }}
          </button>
        </h2>
        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
             aria-labelledby="heading{{ $index }}" data-bs-parent="#grantsAccordion">
          <div class="accordion-body">
            {!! $grant->answer !!}
          </div>
        </div>
      </div>
      @endforeach

      @if($grants->isEmpty())
      <p class="text-center text-muted">{{ __('site.no_questions_available') }}</p>
      @endif

    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
  /* ===== Page Header ===== */
  .page-header {
    background-color: #e3f2fd; /* Soft light blue */
  }

  /* ===== Accordion ===== */
  .accordion-item {
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #ffffff;
  }

  .accordion-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  }

  .accordion-button {
    background: #f8f9fa; /* Light gray default */
    color: #212529; /* Dark text */
    font-size: 1.1rem;
    border: none;
    transition: all 0.3s ease;
    padding: 1rem 1.25rem;
    box-shadow: none !important;
  }

  /* Expanded state: light gray + black text */
  .accordion-button:not(.collapsed) {
    background-color: #e0e0e0;
    color: #000;
    box-shadow: none;
  }

  .accordion-button::after {
    filter: invert(50%);
    transition: transform 0.3s ease, filter 0.3s ease;
  }

  .accordion-button:not(.collapsed)::after {
    filter: brightness(0) invert(0.5);
    transform: rotate(180deg);
  }

  .accordion-body {
    background-color: #ffffff;
    border-top: 1px solid #e3e3e3;
    animation: fadeIn 0.4s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .text-primary { color: #2196f3; } /* Icon color */
</style>
@endpush

@push('scripts')
<script>
  // Smooth scroll when opening
  document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', function() {
      setTimeout(() => {
        const offsetTop = button.getBoundingClientRect().top + window.scrollY - 100;
        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
      }, 250);
    });
  });
</script>
@endpush
