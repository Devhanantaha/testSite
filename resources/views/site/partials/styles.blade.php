

<link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/style.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/swiper.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/dark.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/font-icons.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/animate.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/magnific-popup.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" type="text/css" />


<style>
  .blue {
      background: #005aac;
  }
  .blue *{
      color: #fff !important;
  }
  .green {
      background: #81bc45 ;
  }
  .green *{
      color: #fff ;
  }
  .green .icon-line-play{
      color: #000 ;
  }
  .header-misc img{
    height: 100px;
}
  .sticky-header-shrink #header-wrap #logo img , .sticky-header-shrink .header-misc img {
    height: 60px;
}
@media(max-width: 575.98px) {
    .header-misc img ,#header-wrap #logo img{
    height: 60px;
        }
}
  </style>
	@stack('css')