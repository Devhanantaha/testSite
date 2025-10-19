@extends('site.app')
@section('title', $product->LocalName)
@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ $product->LocalName }}</h2>
          <ol>
            <li><a href="/{{$local}}">{{$heading['home']}}</a></li>
            <li>{{ $product->LocalName }}</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
 @foreach ($product -> images as $prfull)
                <div class="swiper-slide">
                  <img src="/storage/{{ $prfull->full }}" alt="">
                </div>
@endforeach
              

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
           
            <div class="portfolio-description">
              <h2>{{ $product->LocalName }}</h2>
              <p>
                {!! $product->LocalDescription !!}
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  @stop