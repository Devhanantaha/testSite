<footer id="footer" class="dark py-5 mt-auto" 
    style="background: #111; color: #fff; direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};">
    <div class="container">
        <div class="row align-items-start mb-4">

            <!-- Logo -->
            <div class="col-12 col-md-4 text-center text-md-start mb-4 mb-md-0">
                <a href="{{ url(app()->getLocale() == 'ar' ? '/ar' : '/') }}">
                    <img src="{{ asset('public/storage/' . config('settings.site_logo')) }}" alt="Logo" style="max-width: 150px;">
                </a>
            </div>

            <!-- Links -->
            <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                <h5 class="mb-3">
                    {{ app()->getLocale() == 'ar' ? 'روابط سريعة' : __('site.quick_links') }}
                </h5>
                <ul class="list-unstyled mb-0" style="padding: 0; list-style: none;">
                    @if(app()->getLocale() == 'ar')
                        <li><a href="/ar" class="footer-link">الرئيسية</a></li>
                        @foreach($footer as $f)
                            <li><a href="{{ route('page.show', $f->slug) }}/ar">{{ $f->name2 }}</a></li>
                        @endforeach
                        <li><a href="/catalogs/ar">كتالوجات</a></li>
                        <li><a href="/shop/ar">المنتجات</a></li>
                        <li><a href="/news/ar">الاخبار</a></li>
                        <li><a href="/articles/ar">المقالات</a></li>
                        <li><a href="/careers/ar">الوظائف</a></li>
                        <li><a href="/contact/ar">اتصل بنا</a></li>
                    @else
                        <li><a href="{{ url('/') }}" class="footer-link">{{ __('site.home') }}</a></li>
                        <li><a href="{{ url('/page/about-us/') }}" class="footer-link">{{ __('site.about') }}</a></li>
                        <li><a href="{{ url('/where-we-work/') }}" class="footer-link">{{ __('site.where') }}</a></li>
                        <li><a href="{{ url('/apply/') }}" class="footer-link">{{ __('site.apply') }}</a></li>
                        <li><a href="{{ url('/contact/') }}" class="footer-link">{{ __('site.contact') }}</a></li>
                    @endif
                </ul>
            </div>

            <!-- Social Icons -->
            <div class="col-12 col-md-4 text-center text-md-end">
                <h5 class="mb-3">
                    {{ app()->getLocale() == 'ar' ? 'تابعنا' : __('site.follow_us') }}
                </h5>
                <div class="d-flex justify-content-center justify-content-md-end flex-wrap gap-3">
                    @if(config('settings.social_facebook'))
                        <a href="{{ config('settings.social_facebook') }}" class="social-icon"><i class="icon-facebook"></i></a>
                    @endif
                    @if(config('settings.social_twitter'))
                        <a href="{{ config('settings.social_twitter') }}" class="social-icon"><i class="icon-twitter"></i></a>
                    @endif
                    @if(config('settings.social_instagram'))
                        <a href="{{ config('settings.social_instagram') }}" class="social-icon"><i class="icon-instagram"></i></a>
                    @endif
                    @if(config('settings.social_linkedin'))
                        <a href="{{ config('settings.social_linkedin') }}" class="social-icon"><i class="icon-linkedin"></i></a>
                    @endif
                    @if(config('settings.social_youtube'))
                        <a href="{{ config('settings.social_youtube') }}" class="social-icon"><i class="icon-youtube"></i></a>
                    @endif
                </div>
            </div>

        </div>

        <!-- Contact Info (only Arabic style) -->
        <div class="row text-end mt-4">
            <div class="col-md-12">
                <ul class="list-unstyled" style="line-height: 1.8;">
                    <li><strong>العنوان:</strong> {{ config('settings.address_ar') }}</li>
                    <li><strong>التليفون:</strong> <a href="tel:{{ config('settings.phone') }}">{{ config('settings.phone') }}</a></li>
                    <li><strong>البريد الإلكتروني:</strong> <a href="mailto:{{ config('settings.default_email_address') }}">{{ config('settings.default_email_address') }}</a></li>
                </ul>
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
