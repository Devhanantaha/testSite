<header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap" id="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-lg-stick-up-offset="120px" data-xl-stick-up-offset="35px" data-xxl-stick-up-offset="35px">
            <!-- RD Navbar Top Panel-->
            <div class="rd-navbar-top-panel rd-navbar-search-wrap">
              <div class="rd-navbar-top-panel__main">
                <div class="rd-navbar-top-panel__toggle rd-navbar-fixed__element-1 rd-navbar-static--hidden" data-rd-navbar-toggle=".rd-navbar-top-panel__main"><span></span></div>
                <div class="rd-navbar-top-panel__content">
                  <div class="rd-navbar-top-panel__left">
                    
                  </div>
                  <div class="rd-navbar-top-panel__right">
                    <ul class="rd-navbar-items-list">
                      <li>
                        <ul class="list-inline-xxs">
                            @foreach($top_menu as $page)
                                      <li><a href="{{ route('page.show' , $page->slug)}}/ar">{{ $page->name2 }}</a></li>
                                      @endforeach
						                            <li><a href="/catalogs/ar">كتالوجات</a></li>						  						  
                          <li><a href="/news/ar">اخبار</a></li>
                          <li><a href="/contact/ar" >اتصل بنا</a></li>
                        </ul>
                      </li>
                      <li>
                        <ul class="list-inline-xxs">
                          <li><a class="icon icon-xxs icon-primary fa fa-facebook" href="{{ config('settings.social_facebook') }}" target="_blank"></a></li>					  
            
                          <li><a class="icon icon-xxs icon-primary fa fa-instagram"target="_blank" href="{{ config('settings.social_instagram') }}"></a></li>
                          <li><a class="icon icon-xxs icon-primary fa fa-youtube" target="_blank" href="{{ config('settings.social_youtube') }}"></a></li>
                          <li><a class="icon icon-xxs icon-primary fa fa-linkedin" target="_blank"href="{{ config('settings.social_linkedin') }}"></a></li> 
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-top-panel__aside">
                <ul class="rd-navbar-items-list">
					<li>
						<div class="rd-navbar-fixed__element-4"><a onclick="setlocal()" class="icon icon-xxs icon-primary fa fa-globe" href="en">English</a></div>
					</li>					 
                  <li>
                    <div class="rd-navbar-fixed__element-2">
                      <button style = 'color:white'class="rd-navbar-search__toggle rd-navbar-search__toggle_additional" data-rd-navbar-toggle=".rd-navbar-search-wrap"></button>
                    </div>
                  </li>
                  <li>
                    <div class="rd-navbar-fixed__element-3" style="padding-right: 22px;"><a style = 'color:white'class="icon icon-md linear-icon-cart link-gray-4" href="/cart/ar"></a><span id="itemCount">{{ $cartCount }}</span></div>
                  </li>
                </ul>
              </div>
              <!-- RD Search-->
              <div class="rd-navbar-search rd-navbar-search_toggled rd-navbar-search_not-collapsable">
                <form class="rd-search" action="/search" method="GET">
                  <div class="form-wrap">
                    <input class="form-input" id="rd-navbar-search-form-input" type="text" name="keyword" autocomplete="off">
                    <label class="form-label" for="rd-navbar-search-form-input">ادخل كلمة البحث</label>
                    <div class="rd-search-results-live" id="rd-search-results-live"></div>
                  </div>
                  <button class="rd-search__submit" type="submit"></button>
                </form>
                <div class="rd-navbar-fixed--hidden">
                  <button class="rd-navbar-search__toggle" data-custom-toggle=".rd-navbar-search-wrap" data-custom-toggle-disable-on-blur="true"></button>
                </div>
              </div>
            </div>
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand" style="margin-left: 44px;margin-bottom:15px"><a class="brand-name" href="/">
                  <img src="/storage/{{ config('settings.site_logo') }}" alt="Falcon logo" width="200" height="62"/></a></div>
              </div>
              <!-- RD Navbar Nav-->
              <div class="rd-navbar-nav-wrap">
                
            @include('site.partials.ar.nav')

              </div>
            </div>
          </nav>
        </div>
	
		</header>
		@push('scripts')
		<script>
		   function setlocal() {
				 @php
		\Session(['local' => 'ar']);
		
		@endphp
		consol.log(local);
		
		   };
		</script>
		
		@endpush