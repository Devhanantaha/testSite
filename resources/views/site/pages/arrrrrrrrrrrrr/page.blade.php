@extends('site.appar')
@section('title', $page->name)
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">{{$page->name2}}</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/ar">الرئيسية</a></li>
            <li class="active">{{$page->name2}}</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="bg-default section-lg" style="
      direction: rtl;
      text-align: right;
  ">
        <div class="container">
          <div class="row row-50">
            <div class="col-md-12">
              <h6 class="font-bold">{{$page->name2}}</h6>
              {!! $page->content2 !!}
            </div>
          </div>
        </div>
      </section>
      @if ($page->slug == "about-us" || $page->slug == "about")
      <section class="section novi-bg novi-bg-img section-xl bg-default" >
          <div class="section-xl bg-accent text-center" style="    background-color: #003f63;">
            <div class="container">
              <h3>Man Power</h3>
              <div class="row justify-content-md-center row-50">
                <div class="col-md-6 col-lg-2">
                  <!-- Box counter-->
                  <article class="box-counter">
                    <div class="box-counter__wrap">
                      <div class="counter animated-first">4</div>
                    </div>
                    <p class="box-counter__title">R&D team</p>
                  </article>
                </div>
                <div class="col-md-6 col-lg-2">
                  <!-- Box counter-->
                  <article class="box-counter">
                    <div class="box-counter__wrap">
                      <div class="counter animated-first">8</div>
                    </div>
                    <p class="box-counter__title">Engineers</p>
                  </article>
                </div>
                <div class="col-md-6 col-lg-2">
                  <!-- Box counter-->
                  <article class="box-counter">
                    <div class="box-counter__wrap">
                      <div class="counter animated-first">60</div>
                    </div>
                    <p class="box-counter__title">Technicians</p>
                  </article>
                </div>
                <div class="col-md-6 col-lg-2">
                  <!-- Box counter-->
                  <article class="box-counter">
                    <div class="box-counter__wrap">
                      <div class="counter animated-first">10</div>
                    </div>
                    <p class="box-counter__title">Sales Staffs</p>
                  </article>
                </div>
                
                <div class="col-md-6 col-lg-2">
                    <!-- Box counter-->
                    <article class="box-counter">
                      <div class="box-counter__wrap">
                        <div class="counter animated-first">8</div>
                      </div>
                      <p class="box-counter__title">Administration staff</p>
                    </article>
                  </div>
                  <div class="col-md-6 col-lg-2">
                    <!-- Box counter-->
                    <article class="box-counter">
                      <div class="box-counter__wrap">
                        <div class="counter animated-first">10</div>
                      </div>
                      <p class="box-counter__title">Workers</p>
                    </article>
                  </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Manufacturing Capabilities -->
        <section class="section novi-bg novi-bg-img section-xl bg-default">
            <div class="container">
              <h3 class="text-center h3 mb-5">Manufacturing Capabilities</h3>
              <div class="row justify-content-md-center align-items-lg-center justify-content-lg-between row-50">
                <div class="col-md-9 col-lg-5">
                  <h3>Design House</h3>
                  <ul>
                    <li>• Electronic</li>
                      <li>• PCB</li>  
                      <li>• Metal molds</li>  
                  </ul>
                </div>
                <div class="col-md-9 col-lg-6">
                  <div class="row gallery-wrap">
                    <div class="col-6">
                      <figure><img src="/images/mc/h1.jpg" alt="" width="301" height="227">
                      </figure>
                    </div>
                    <div class="col-6">
                        <figure><img src="/images/mc/h2.jpg" alt="" width="301" height="227">
                      </figure>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-md-center align-items-lg-center justify-content-lg-between row-50">
                  <div class="col-md-9 col-lg-5">
                    <h3>Test laboratory</h3>
                    <ul>
                      <li>• Electronic</li>
                        <li>• Spectrum</li>  
                        <li>• Life Span</li>  
                    </ul>
                  </div>
                  <div class="col-md-9 col-lg-6">
                    <div class="row gallery-wrap">
                      <div class="col-6">
                        <figure><img src="/images/mc/t1.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                      <div class="col-6">
                          <figure><img src="/images/mc/t2.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                      
                      <div class="col-12">
                          <figure><img src="/images/mc/t3.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>
                
              <div class="row justify-content-md-center align-items-lg-center justify-content-lg-between row-50">
                  <div class="col-md-9 col-lg-5">
                    <h3>Metal Production Lines</h3>
                    <ul>
                      <li>• Molds preparing</li>
                        <li>• Metal Sheet punshing</li>  
                        <li>• Metal sectors cutting and welding</li>  
                    </ul>
                  </div>
                  <div class="col-md-9 col-lg-6">
                    <div class="row gallery-wrap">
                      <div class="col-6">
                        <figure><img src="/images/mc/m1.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                      <div class="col-6">
                          <figure><img src="/images/mc/m2.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>
                
              <div class="row justify-content-md-center align-items-lg-center justify-content-lg-between row-50">
                  <div class="col-md-9 col-lg-5">
                    <h3>Acrylic line <br>
                        Electronic Components Assembly line<br>
                        LED tube Assembly line<br>
                        3 Lines for Light fittings Assembly<br>
                        Aging test chambers</h3>
                   
                  </div>
                  <div class="col-md-9 col-lg-6">
                    <div class="row gallery-wrap">
                      <div class="col-6">
                        <figure><img src="/images/mc/a1.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                      <div class="col-6">
                          <figure><img src="/images/mc/a2.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                      
                      <div class="col-12">
                          <figure><img src="/images/mc/a3.jpg" alt="" width="301" height="227">
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </section>
      @endif  
          @stop