<section id="hero" class="swiper hero-swiper position-relative overflow-hidden">
    <div class="swiper-wrapper">
        @foreach($banners as $banner)
        <div class="swiper-slide"
             style="background-image: url('{{ asset($banner->imageFullPath) }}');
                    background-size: cover;
                    background-position: center;">
            <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                <div class="text-white hero-content" data-aos="fade-up">
                    <h2 class="fw-bold mb-3">{{ $banner->title }}</h2>

                    @if($banner->url)
                    <a href="{{ $banner->url }}" class="btn btn-light mt-3 px-4 rounded-pill">
                        {{ __('site.readmore') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Dots -->
    <div class="swiper-pagination"></div>

    <!-- Optional curve shape -->
    <div class="slider-shape-ppd">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 120" preserveAspectRatio="none">
            <path fill="#ffffff" d="M0,0 C600,100 1320,0 1920,80 L1920,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

@push('css')
<link rel="stylesheet" href="https://unpkg.com/swiper@10/swiper-bundle.min.css" />
<style>
.hero-swiper {
    width: 100%;
    height: 100vh;
    position: relative;
}

.hero-swiper .swiper-slide {
    position: relative;
    color: #fff;
    z-index: 1;
}

.hero-swiper .hero-content {
    position: relative;
    z-index: 5;
    max-width: 700px;
    text-shadow: 0 2px 6px rgba(0,0,0,0.8); /* ✅ makes text readable without overlay */
}

.hero-swiper h2 {
    font-size: 3rem;
    font-weight: 700;
    color: #fff;
}

.hero-swiper a.btn {
    font-size: 1rem;
    font-weight: 600;
}

/* ✅ Pagination Dots */
.swiper-pagination {
    position: absolute;
    bottom: 50px;
    width: 100%;
    text-align: center;
    z-index: 10;
}

.hero-swiper .swiper-pagination-bullet {
    background-color: #28a745 !important;
    width: 12px;
    height: 12px;
    margin: 0 6px !important;
    opacity: 0.6 !important;
    border-radius: 50%;
    transition: all 0.3s ease;
}
.hero-swiper .swiper-pagination-bullet::after {
    content: none !important;
}
.hero-swiper .swiper-pagination-bullet-active {
    background: linear-gradient(135deg, #6f42c1, #a259ff) !important;
    opacity: 1;
    transform: scale(1.3);
    box-shadow: 0 0 8px rgba(0,0,0,0.3);
}

/* ✅ Curve Shape */
.slider-shape-ppd {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    z-index: 5;
}

.slider-shape-ppd svg {
    display: block;
    width: 100%;
    height: 100px;
}

.slider-shape-ppd path {
    fill: #ffffff;
}

</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/swiper@10/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.hero-swiper', {
        loop: true,
        effect: 'fade',
        speed: 1000,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
</script>
@endpush
