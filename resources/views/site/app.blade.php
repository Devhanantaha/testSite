<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="//gmpg.org/xfn/11" />
  <link rel="shortcut icon" href="{{ asset('public/assets/img/favicon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/storage/'. config('settings.site_favicon')) }}">
  <title>@yield('title') - {{ $about->title }}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">


  @include('site.partials.styles')
  @if(app()->getLocale() == 'ar')

  <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;700&display=swap" rel="stylesheet">
  <style>
    .menu-link {

      font-size: 17px !important;
    }

    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    [class^='heading-'],
    .rd-navbar-static .rd-nav-link,
    .tabs-custom .nav-link,
    .button,
    .rd-navbar-static .rd-dropdown-link,
    .rd-navbar-static .rd-megamenu-list-link,
    .swiper-slider-2 .swiper-text,
    .navbar a,
    .navbar a:focus,
    .menu-link {
      font-family: 'Noto Naskh Arabic', serif !important;
      letter-spacing: 0em !important
    }

    .primary-menu {
      direction: rtl;
    }

    #page-title {
      direction: rtl;
    }

    .breadcrumb {
      left: 0 !important;
      right: auto !important;
    }

    .breadcrumb-item+.breadcrumb-item::before {
      direction: rtl;
      padding-left: var(--bs-breadcrumb-item-padding-x);
      float: right !important;
    }

    .content-wrap {
      direction: rtl;
      text-align: right;
    }

    #oc-portfolio {
      direction: ltr
    }

    .bgicon {
      left: -50px;
      right: auto !important
    }

    @media (min-width: 992px) {

      .mega-menu-content,
      .sub-menu-container {
        left: auto;
        right: 0
      }

    }

    ul.icons-list li i {
      margin-left: 13px;
      margin-right: auto
    }
  </style>
  @endif
  <style>
    button,
    .btn,
    input[type="button"],
    input[type="submit"] {
      background-color: #FF914D;
      /* Lighter orange */
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      transition: opacity 0.3s ease, transform 0.2s ease;
    }

    button:hover,
    .btn:hover {
      opacity: 0.85;
      transform: translateY(-2px);
    }
  </style>

</head>

<body class="stretched">

  <div id="wrapper" class="clearfix">
    <!-- Page Header-->
    @include('site.partials.header')
    @yield('content')
    @include('site.partials.footer')


  </div>

  <div id="gotoTop" class="icon-angle-up"></div>
  @include('site.partials.scripts')

  <!-- BotMan Web Widget Configuration -->
  <!-- Notification sound -->
  <audio id="notifySound" src="https://www.myinstants.com/media/sounds/notification.mp3" preload="auto"></audio>

  <script>
    var botmanWidget = {

      chatServer: "{{ url('/botman') }}",
      frameEndpoint: "{{ url('/botman/chat') }}",
      title: "{{ __('site.smarttitle') }}",
      introMessage: "{{ __('site.introMessage') }}",
      mainColor: '#007bff',
      bubbleBackground: '#007bff',
      headerTextColor: '#fff',
      placeholderText: "{{ __('site.smartplaceholder') }}",
      displayMessageTime: true,
      aboutText: '',
      aboutLink: '',
      desktopHeight: 450,
      desktopWidth: 360,

      // 🔔 Play sound when new message arrives
      onMessageReceived: function(message) {
        document.getElementById('notifySound').play();
      }
    };
  </script>

  <!-- Load BotMan Web Widget -->
  <script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>

  <!-- 💅 Custom Styles -->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Tajawal', sans-serif;
    }

    /* ✅ Always on top */
    #botmanWidgetRoot,
    #botmanWidget,
    .botman-chat-button {
      position: fixed !important;
      bottom: 20px !important;
      right: 20px !important;
      z-index: 999999 !important;
    }

    /* 🟦 Chat window enhancements */
    .botman-chat-widget {
      border-radius: 16px !important;
      overflow: hidden !important;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25) !important;
      animation: popupOpen 0.4s ease !important;
    }

    @keyframes popupOpen {
      from {
        transform: scale(0.8);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* 🌗 Message styling (RTL support) */
    .botman-chat-widget * {
      font-family: 'Tajawal', sans-serif !important;
      direction: rtl !important;
      text-align: right !important;
    }

    /* 💬 Bubble animation */
    .botman-message {
      animation: fadeInUp 0.3s ease !important;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ✨ Button styling */
    .botman-chat-button {
      width: 60px !important;
      height: 60px !important;
      background-color: #007bff !important;
      border-radius: 50% !important;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .botman-chat-button:hover {
      transform: scale(1.1);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }
  </style>
</body>

</html>



















































































































































































































