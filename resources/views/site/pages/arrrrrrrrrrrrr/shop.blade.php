@extends('site.appar')
@section('title', 'تسوق')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">تسوق</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/ar">الرئيسية</a></li>
            <li class="active">تسوق</li>
          </ul>
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

          @stop