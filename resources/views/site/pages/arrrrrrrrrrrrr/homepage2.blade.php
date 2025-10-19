@extends('site.appar')
@section('title', 'الرئيسية')
@section('content')


@include('site.partials.flash')
   <!-- Swiper-->
   <section>
        <div class="swiper-container swiper-slider swiper-slider_fullheight" data-simulate-touch="false" data-loop="true" data-autoplay="5500">
          <div class="swiper-wrapper">	
            @foreach($banners as $banner)
            <div class="swiper-slide swiper-slide_top bg-accent" data-slide-bg="/uploads/{{$banner->full}}">
              <div class="headercaption">
                <div class="hc">
                  <p style="color:#fff !important" data-caption-animate="fadeInLeftSmall">{!! $banner->namear !!}  </p>
                </div>
              </div>
            </div>	
            @endforeach
        </div>
		  <div class="fullscreenBanner-scrollIndicator"><a href="#search">
			<img class="hidden-xs-down" src="images/sc.png" alt="" /></a>
		  </div>
          <!-- Swiper Pagination-->
          <div class="swiper-pagination"></div>
          <!-- Swiper Navigation-->
          <div class="swiper-button-prev linear-icon-chevron-left"></div>
          <div class="swiper-button-next linear-icon-chevron-right"></div>
        </div>
      </section>    
      <section class='bg-gray-lighter object-wrap'id ="search">
            <div class="container">
            <div class="row">
            <div class="col-md-6  col-sm-12 col-12 mt-5">
            <h6>كيف يمكننا مساعدتك ؟</h6><br>
            
                <div class="type-wrap mb-4">
                <h6 id='look'> تبحث عنr</h6>
                
                    <div id="typed-strings">
                        @foreach ($featuredcat as $fcat)
                        <span>{!!  $fcat->name2  !!} ?</span>
                        @endforeach
                     
                    </div>
                    <form class="search-form" action="/search" method="GET">
                    <input class='destroy' name="keyword" type='text' id="typed" style="white-space:pre;">
                    <button id="lookfa" class='icon icon-lg linear-icon-magnifier'></button></form>
                </div>
            </div>
            </div>
          </div>
            
            </section>

              <!-- Presentation -->
      <section class="section-xl bg-default text-center" id="section-see-features">
            <div class="container">
              <div class="row justify-content-lg-center" data-aos="fade-up" data-aos-duration="3000">
                <div class="col-lg-10 col-xl-10">
                  <h3 class='title-bottom'>من نحن</h3>
                  <p>{!! str_limit($about->content2,500) !!}
                  <br> <a class="button button-primary" href="/page/about-us/ar">اقرأ المزيد&raquo;</a></p>
                </div>
              </div>
            </div>
          </section>
          <section class="text-center">
            <!-- RD Parallax-->
            <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="/images/b2.jpg"><div class="material-parallax parallax"><img src="images/b2.jpg" alt="" style="display: block; transform: translate3d(-50%, 21px, 0px);"></div>
              <div class="parallax-content">
                <div class="parallax-header__inner" style="background: #231f20e0">
                  <div class="parallax-header__content">
                      <div class="row">
                        @foreach ($featuredcat  as $fcat)
                          
                        <div class="col-md-2">
                            <a href="{{ route('category.show2', $fcat->slug) }}/ar">
                              <img src="/storage/{{ $fcat->image }}" style="width:160px">
                            </a>
                            <div class="row mt-0">
                              <a href="{{ route('category.show2', $fcat->slug) }}/ar">
                              </a>
                              <div class="col-md-12"><a href="{{ route('category.show2', $fcat->slug) }}/ar">
                                <p> {{ $fcat->name2 }} </p></a>
                              </div>
                            </div>
                        </div>
                        @endforeach
              
                      </div>
                            </div>
                </div>
              </div>
            </div>
          </section>
         <section class="section-xl bg-gray-lighter">
            <div class="container text-center">
              <h3  data-aos="zoom-out-right">احدث المنتجات</h3>
              <!-- Owl Carousel-->
              <div class="owl-carousel carousel-product" data-autoplay="true" data-items="1" data-md-items="2" data-dots='true' data-lg-items="3" data-xl-items="4" data-stage-padding="0" data-loop="true" data-margin="20" data-mouse-drag="true" data-nav="true">
                @foreach($featuredpro as $product)
                <div class="item">
                  <div class="product product-grid">
                    <div class="product-img-wrap"><a href="/product/{{ $product->slug  }}/ar"><img src="{{ asset('storage/'.$product['images']->first()['thumbnail']) }}" alt="{{ $product->name  }}" width="300" height="400"/></a>
                    </div>
                    <div class="product-caption">
                      <ul class="product-categories">
                        <li><a>Falcon</a></li>
                      </ul>
                      <h6 class="product-title"><a href="/product/{{ $product->slug  }}/ar">{{ $product->name2  }}</a></h6> 
                    </div>
                  </div>
                </div> 
                @endforeach
            </div>		   
            </div>
            <style>
            @media (min-width: 1200px){
                .owl-prev,.owl-next{
                    top: 15px !important
                }
            }
            .product-grid{padding:50px;background:#fff}
            </style>
          </section>
          <section class="section-xl bg-default">
                <div class="container">
                <h2 class="text-center title-bottom mb-5"  data-aos="zoom-out-right"style="
            font-weight: 400;
        ">لماذا تختار فالكون</h2>
                  <div class="row row-50">
                        <div class="col-sm-4">
                      <!-- Blurb minimal-->
                      <article class="blurb blurb-minimal">
                        <div class="unit flex-row unit-spacing-md">
                          <div class="unit-left">
                            <div class="blurb-minimal__icon"><image class="icon" src="https://elwaha.com.eg/uploads/1570030073.png"></div>
                          </div>
                          <div class="unit-body"  data-aos="fade-up" data-aos-duration="1000">
                            <p class="blurb__title">الاحترافية</p>
                            <p> الاختيار المفضل للمحترفين</p>
                          </div>
                        </div>
                      </article>
                    </div>           <div class="col-sm-4">
                      <!-- Blurb minimal-->
                      <article class="blurb blurb-minimal">
                        <div class="unit flex-row unit-spacing-md">
                          <div class="unit-left">
                            <div class="blurb-minimal__icon"><image class="icon" src="https://elwaha.com.eg/uploads/1570041735.png"></div>
                          </div>
                          <div class="unit-body"  data-aos="fade-up" data-aos-duration="1000">
                            <p class="blurb__title">الجودة</p>
                            <p>منتجاتنا هى الافضل فى فئتها</p>
                          </div>
                        </div>
                      </article>
                    </div>             <div class="col-sm-4">
                      <!-- Blurb minimal-->
                      <article class="blurb blurb-minimal">
                        <div class="unit flex-row unit-spacing-md">
                          <div class="unit-left">
                            <div class="blurb-minimal__icon"><image class="icon" src="https://elwaha.com.eg/uploads/1570042915.jpg"></div>
                          </div>
                          <div class="unit-body"  data-aos="fade-up" data-aos-duration="1000">
                            <p class="blurb__title">
                                    خدمة ما بعد البيع</p>
                            <p>فريق خدمة ما بعد البيع يقدم لك الخدمة بشكل احترافى</p>
                          </div>
                        </div>
                      </article>
                    </div>          </div>
                </div>
              </section>
            
              <!-- Subscribe form-->
              <section class="section-xl bg-gray-lighter text-center">
                <div class="container">
                        <h5 data-aos="zoom-in" data-aos-duration="3000">احصل على اخر الاخبار<br> سوف نرسل لك اهم الاخبار الى بريدك الالكترونى</h5>
                
                  <form class="rd-mailform_style-1 rd-mailform_sizing-1 rd-mailform-inline-flex text-center" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="/newsletter/subscribe" novalidate="novalidate">
                    @csrf
                    <div class="form-wrap form-wrap_icon"><span class="novi-icon form-icon linear-icon-envelope"></span>
                      <input class="form-input form-control-has-validation" id="contact-email" type="email" name="email" Required>
                      <label class="form-label rd-input-label" for="contact-email">ادخل بريدك الالكترونى</label>
                    </div>
                    <button class="button button-primary" type="submit">اشترك!</button>
                  </form>
                </div></div>
              </section>

  @stop

  @push('scripts')
    
 <script src="/assets/js/typed.min.js"></script>
 <script src="/assets/js/demos.js"></script>
  @endpush