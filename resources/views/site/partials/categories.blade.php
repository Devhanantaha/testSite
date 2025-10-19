<section id="categories" class="py-5" style="background: linear-gradient(90deg, #005aac 0%, #82bc41 100%);">
  <div class="container text-center text-white">

    <!-- Section Title -->
    <h2 class="fw-bold mb-3">مجالات العمل</h2>
    <div class="mx-auto mb-5" style="width:80px; height:3px; background:#fff; border-radius:2px;"></div>

    <!-- Swiper Container -->
    <div class="swiper categories-swiper px-3">
      <div class="swiper-wrapper">

        @if(isset($categories) && count($categories))
          @foreach ($categories as $cat)
            @if(isset($cat->items) && count($cat->items))
              @foreach ($cat->items as $item)
                @if($item->menu)
                <div class="swiper-slide">
                  <a href="{{ route('workarea.show', $item->slug) }}/{{ $local }}" class="d-block text-center text-white">
                    <div class="category-card p-4 bg-white bg-opacity-10 rounded-4 shadow-sm">
                      <img src="{{ asset('/public/storage/' . $item->image) }}" 
                           class="img-fluid rounded mb-3" 
                           alt="{{ $item->LocalName }}" 
                           style="height:100px;object-fit:contain;">
                      <h5 class="fw-semibold text-white">{{ $item->LocalName }}</h5>
                    </div>
                  </a>
                </div>
                @endif
              @endforeach
            @endif
          @endforeach
        @endif

      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-4"></div>
    </div>
  </div>
</section>

@push('css')
<link rel="stylesheet" href="https://unpkg.com/swiper@10/swiper-bundle.min.css" />
<style>
.categories-swiper {
  padding-bottom: 50px;
}
.category-card {
  transition: all 0.3s ease;
}
.category-card:hover {
  transform: translateY(-6px);
  background-color: rgba(255,255,255,0.2);
}
.swiper-pagination-bullet {
  background-color: rgba(255,255,255,0.6) !important;
}
.swiper-pagination-bullet-active {
  background-color: #fff !important;
  transform: scale(1.3);
}
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/swiper@10/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  new Swiper('.categories-swiper', {
    slidesPerView: 2,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      768: { slidesPerView: 3 },
      992: { slidesPerView: 5 },
      1200: { slidesPerView: 6 }
    }
  });
});
</script>
@endpush
