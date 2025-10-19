@extends('site.app')
@section('title', __('site.contact'))
@section('content')

@php
  $isRtl = app()->getLocale() === 'ar';
  $dir = $isRtl ? 'rtl' : 'ltr';
  $textDir = $isRtl ? 'text-end' : 'text-start';
  $reverseRow = $isRtl ? 'flex-row-reverse' : '';
  $marginDir = $isRtl ? 'ms-3' : 'me-3';
@endphp

<!-- ======= Page Title ======= -->
<section id="page-title" class="py-5 bg-light border-bottom" dir="{{ $dir }}">
  <div class="container {{ $textDir }}">
    <h1 class="fw-bold mb-2 text-primary">{{ __('site.contact') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('site.home') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('site.contact') }}</li>
    </ol>
  </div>
</section>

<!-- ======================= CONTACT SECTION ======================= -->
<section id="contact" class="py-5" dir="{{ $dir }}">
  <div class="container">
    <div class="row g-4 align-items-stretch">

      <!-- ✅ Contact Form -->
      <div class="col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 h-100 {{ $textDir }}">
          <h4 class="fw-bold mb-4 text-primary">{{ __('site.drop') }}</h4>

          <form method="POST" action="{{ route('contact.store') }}" novalidate>
            @csrf
            <div class="row g-4">
              <div class="col-md-6">
                <label for="form_name" class="form-label fw-semibold">{{ __('site.firstname') }}</label>
                <input id="form_name" type="text" name="name" class="form-control border-primary {{ $textDir }}" required>
              </div>

              <div class="col-md-6">
                <label for="form_lastname" class="form-label fw-semibold">{{ __('site.lastname') }}</label>
                <input id="form_lastname" type="text" name="surname" class="form-control border-primary {{ $textDir }}" required>
              </div>

              <div class="col-md-6">
                <label for="form_email" class="form-label fw-semibold">{{ __('site.email') }}</label>
                <input id="form_email" type="email" name="email" class="form-control border-primary {{ $textDir }}" required>
              </div>

              <div class="col-md-6">
                <label for="form_phone" class="form-label fw-semibold">{{ __('site.phone') }}</label>
                <input id="form_phone" type="number" name="phone" class="form-control border-primary {{ $textDir }}" required>
              </div>

              <div class="col-12">
                <label for="form_message" class="form-label fw-semibold">{{ __('site.message') }}</label>
                <textarea id="form_message" name="message" class="form-control border-primary {{ $textDir }}" rows="5" required></textarea>
              </div>

              <!-- ✅ Working Submit Button -->
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm mt-3">
                  <i class="uil uil-message {{ $isRtl ? 'ms-2' : 'me-2' }}"></i>{{ __('site.send') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- ✅ Contact Info -->
      <div class="col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 h-100 {{ $textDir }}">
          <h4 class="fw-bold mb-4 text-primary">{{ __('site.get_in_touch') }}</h4>

          <!-- رقم الهاتف (الموبايل) -->
          <div class="d-flex align-items-start mb-4 " dir="{{ $dir }}">
            <div class="{{ $marginDir }} text-primary fs-3"><i class="uil uil-mobile-android"></i></div>
            <div>
              <h6 class="fw-semibold mb-1 {{ $textDir }}">{{ __('site.phone') }}</h6>
              <p class="mb-0 {{ $textDir }}">
                <a href="tel:{{ $setting->phone ?? '' }}" class="text-decoration-none text-dark">{{ $setting->phone ?? __('site.not_available') }}</a>
              </p>
            </div>
          </div>

          <!-- رقم التليفون الأرضي -->
          <div class="d-flex align-items-start mb-4 " dir="{{ $dir }}">
            <div class="{{ $marginDir }} text-primary fs-3"><i class="uil uil-phone-volume"></i></div>
            <div>
              <h6 class="fw-semibold mb-1 {{ $textDir }}">{{ __('site.telephone') }}</h6>
              <p class="mb-0 {{ $textDir }}">
                <a href="tel:{{ $setting->telephone ?? '' }}" class="text-decoration-none text-dark">{{ $setting->telephone ?? __('site.not_available') }}</a>
              </p>
            </div>
          </div>

          <!-- العنوان -->
          <div class="d-flex align-items-start mb-4 " dir="{{ $dir }}">
            <div class="{{ $marginDir }} text-primary fs-3"><i class="uil uil-location-pin-alt"></i></div>
            <div>
              <h6 class="fw-semibold mb-1 {{ $textDir }}">{{ __('site.address') }}</h6>
              <p class="mb-0 {{ $textDir }}">{!! $setting->address ?? __('site.not_available') !!}</p>
            </div>
          </div>

          <!-- WhatsApp -->
          <div class="d-flex align-items-start " dir="{{ $dir }}">
            <div class="{{ $marginDir }} text-primary fs-3"><i class="uil uil-whatsapp"></i></div>
            <div>
              <h6 class="fw-semibold mb-1 {{ $textDir }}">{{ __('site.whatsapps') }}</h6>
              <p class="mb-0 {{ $textDir }}">
                @if(!empty($setting->whatsapp))
                  <a href="https://wa.me/{{ preg_replace('/\D+/', '', $setting->whatsapp) }}" target="_blank" class="text-decoration-none text-dark">
                    {{ $setting->whatsapp }}
                  </a>
                @else
                  {{ __('site.not_available') }}
                @endif
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- ✅ Safe styling -->
<style>
  .form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
  }

  .card { transition: all 0.3s ease; }
  .card:hover { transform: translateY(-3px); }

  textarea { resize: none; }

  label, input, textarea, h6, p, a {
    direction: inherit !important;
    text-align: inherit !important;
  }

  /* Fix click issues */
  button, .btn { position: relative; z-index: 10; pointer-events: auto; }
  form { position: relative; z-index: 5; }
</style>

@endsection
