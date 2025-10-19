<footer id="footer" class="dark py-5 mt-auto"
  style="background: #111; color: #fff; direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
  <div class="container">
    <div class="row align-items-start mb-4"
      style="text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};">

      <!-- Logo + Contact Info -->
      <div class="col-12 col-md-4 mb-4 mb-md-0">
        <div class="{{ app()->getLocale() == 'ar' ? 'text-md-end' : 'text-md-start' }}">
          <a href="{{ url(app()->getLocale() == 'ar' ? '/ar' : '/') }}">
            <img src="{{ asset($setting->logoFullPath )}}" 
                 alt="Logo" style="max-width: 150px;">
          </a>

          <div class="mt-3" style="font-size: 0.95rem; line-height: 1.8;">
            <p class="mb-1">
              <strong>{{ __('site.address') }}</strong>
              {!! $setting->address !!}
            </p>
            <p class="mb-1">
              <strong>{{ __('site.phone') }}</strong>
              <a href="tel: {{ $setting->phone }}" style="color:#fff; text-decoration:none;">
                 {{ $setting->phone }} 
              </a>
            </p>
            <p class="mb-0">
              <strong>{{ __('site.email')}}</strong>
              <a href="mailto:{{ $setting->email }}" style="color:#fff; text-decoration:none;">
               {{ $setting->email }}
              </a>
            </p>
          </div>
        </div>
      </div>

      <!-- Links -->
      <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
        <h5 class="mb-3">{{ __('site.quick_links') }}</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="{{ url('/') }}" class="footer-link">{{ __('site.home') }}</a></li>
          <li><a href="{{ url('/page/about-us/') }}" class="footer-link">{{ __('site.about') }}</a></li>
          <li><a href="{{ url('/where-we-work/') }}" class="footer-link">{{ __('site.where') }}</a></li>
          <li><a href="{{ url('/apply/') }}" class="footer-link">{{ __('site.apply') }}</a></li>
          <li><a href="{{ url('/contact/') }}" class="footer-link">{{ __('site.contact') }}</a></li>
        </ul>
      </div>

      <!-- Social Icons -->
      <div class="col-12 col-md-4 {{ app()->getLocale() == 'ar' ? 'text-md-start' : 'text-md-end' }}">
        <h5 class="mb-3 text-md-center">{{  __('site.follow_us') }}</h5>

        <div class="social-grid">
          @if( $setting->facebook_url )
          <a href="{{ $setting->facebook_url  }}" class="social-icon"><i class="icon-facebook"></i></a>
          @endif
          @if($setting->twitter_url)
          <a href="{{ $setting->twitter_url }}" class="social-icon"><i class="icon-twitter"></i></a>
          @endif
          @if($setting->instgram_url)
          <a href="{{ $setting->instgram_url }}" class="social-icon"><i class="icon-instagram"></i></a>
          @endif
          @if($setting->linkedin_url)
          <a href="{{ $setting->linkedin_url }}" class="social-icon"><i class="icon-linkedin"></i></a>
          @endif
          @if($setting->youtube_url)
          <a href="{{ $setting->youtube_url }}" class="social-icon"><i class="icon-youtube"></i></a>
          @endif
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="row">
      <div class="col-12 text-center pt-3 border-top border-light">
        <p class="mb-0">
          &copy; {{ date('Y') }}
          {{ app()->getLocale() == 'ar' ? 'جميع الحقوق محفوظة' : __('site.footer_rights') }}
          — <a href="http://egyptianit.com.eg" style="color:#fff;text-decoration:underline;">EgyIT</a>
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- CSS -->
<style>
  .footer-link {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 3px 0;
  }

  .footer-link:hover {
    text-decoration: underline;
  }

  /* Social Icons Grid — 2 per row */
  .social-grid {
    display: grid;
    grid-template-columns: repeat(2, auto);
    gap: 10px 20px;
    justify-content: center;
  }

  .social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #222;
    color: #fff;
    border-radius: 50%;
    font-size: 18px;
    transition: all 0.3s ease;
  }

  .social-icon:hover {
    background: #007bff;
    color: #fff;
  }
</style>
