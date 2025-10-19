
<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="//gmpg.org/xfn/11" />
    <title>@yield('title') - {{ config('app.name') }}-{{ \Session::get('local')}}</title>
    <link rel="preload" href="/assets/fonts/fontawesome-webfont.woff2?v=4.7.0" as="font" crossorigin="anonymous" />
    @include('site.partials.styles')
<style>
.group-lg .button{
    width:93%;
    border-radius:0;
    border-bottom:3px solid #222bab
  }
  
  @media (min-width: 1200px){  .rd-navbar-fullwidth .rd-navbar-megamenu>li, .rd-navbar-static .rd-navbar-megamenu .row>li {
    padding: 60px 51px 75px 64px;
}

  }
</style>
</head>
<body>
    <!-- Page -->
    <div class="page">
	 <div id="page-loader">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
      <!-- Page Header-->
@include('site.partials.ar.header')
@yield('content')

<div id="back-top"><span><i class="icon-chevrons-up"></i></span></div>
@include('site.partials.ar.footer')
</div>
@include('site.partials.scripts')

</body>
</html>
