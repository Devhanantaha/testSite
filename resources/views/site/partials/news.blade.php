@php
    use Illuminate\Support\Str;
@endphp
<div class="section">
   <div class="container py-1">
       <div class="header-block m-0 text-center">
           <h3 class="text-dark">{{ __('site.news') }}</h3>
       </div>
       <div class="owl-carousel posts-md pb-5" data-autoplay="true">
           @foreach ($news as $new)
           <div class="news-card">
               <a href="/page/{{$new->slug}}/{{$local}}">
                   <div class="news-card-image">
                       <img src="{{ asset('public/storage/'. $new->image) }}" alt="{{ strip_tags($new->LocalName) }}">
                       <div class="news-card-overlay">
                           <h4>{{ strip_tags(\Illuminate\Support\Str::limit($new->LocalName, 50)) }}</h4>
                       </div>
                   </div>
               </a>
           </div>
           @endforeach
       </div>
   </div>
</div>

@push('css')
<style>
.header-block h3 {
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
    font-weight: 600;
}

/* Underline */
.heading-block h3::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;      /* length of the underline */
    height: 3px;      /* thickness */
    background-color: #6f42c1; /* underline color */
    border-radius: 2px;
}

/* News card styles */
.news-card {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.25);
}

.news-card-image {
  position: relative;
  width: 100%;
  height: 250px;
  overflow: hidden;
}

.news-card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.news-card-image:hover img {
  transform: scale(1.05);
}

/* Full overlay */
.news-card-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(0,0,0,0.4);
  text-align: center;
  padding: 0 15px;
}

.news-card-overlay h4 {
  margin: 0;
  font-size: 1.3rem;
  font-weight: 600;
  color: #fff;
}
</style>
@endpush
