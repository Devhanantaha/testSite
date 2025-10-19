<style>
  /* === GLOBAL COLORS === */
  :root {
    --brand-blue: #0056A3;
    /* Main blue tone from logo */
    --brand-blue-light: #E8F1FA;
    /* Light blue for hover/submenu */
    --text-dark: #1a1a1a;
    --navbar-bg: #ffffff;
  }

  /* === HEADER BASE === */
  #header.full-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: var(--navbar-bg);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    z-index: 1000;
    transition: all 0.3s ease;
    height: 80px;
    backdrop-filter: none !important;
    /* remove blur */
    -webkit-backdrop-filter: none !important;
  }

  /* Header row alignment */
  #header .header-row {
    height: 80px;
    display: flex;
    align-items: center;
    transition: height 0.3s ease;
  }

  /* === SHRINK ON SCROLL === */
  body.scrolled #header.full-header {
    height: 65px;
    background: var(--navbar-bg);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    backdrop-filter: none !important;
  }

  /* Keep content from hiding under fixed header */
  body {
    padding-top: 80px;
  }

  /* === MAIN MENU === */
  .primary-menu .menu-link {
    color: var(--text-dark);
    font-weight: 500;
    padding: 12px 18px;
    position: relative;
    transition: color 0.3s ease;
    font-size: 15px;
    text-decoration: none;
  }

  /* Hover underline animation */
  .primary-menu>.menu-item>.menu-link::after {
    content: '';
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background-color: var(--brand-blue);
    transition: width 0.3s ease;
  }

  /* Hover color */
  .primary-menu>.menu-item>.menu-link:hover {
    color: var(--brand-blue);
  }

  .primary-menu>.menu-item>.menu-link:hover::after {
    width: 70%;
  }

  /* Active item */
  .primary-menu>.menu-item.current>.menu-link {
    color: var(--brand-blue);
  }

  /* === SUBMENU === */
  .sub-menu-container {
    background: var(--navbar-bg);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border-radius: 6px;
    padding: 8px 0;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    z-index: 999;
  }

  /* Show submenu on hover */
  .primary-menu .menu-item:hover>.sub-menu-container {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  /* Submenu links */
  .sub-menu-container .menu-link {
    color: var(--text-dark);
    padding: 8px 20px;
    display: block;
    font-size: 14px;
    transition: all 0.25s ease;
  }

  .sub-menu-container .menu-link::after {
    display: none;
  }

  .sub-menu-container .menu-link:hover {
    background: var(--brand-blue);
    color: #fff;
    transform: translateX(4px);
    border-radius: 4px;
  }

  /* === LOGO SIZING & ALIGNMENT === */
  #logo {
    display: flex;
    align-items: center;
    height: 100%;
  }

  #logo img {
    height: 55px;
    /* fits well in 80px header */
    width: auto;
    transition: all 0.3s ease;
  }

  /* When header shrinks on scroll */
  body.scrolled #logo img {
    height: 45px;
    /* smaller logo when scrolled */
  }

  /* Adjust for retina / secondary logos if present */
  #header .retina-logo img {
    height: 55px;
    width: auto;
  }

  body.scrolled #header .retina-logo img {
    height: 45px;
  }

  /* Make sure header-misc logos (like UNDP, GEF) fit too */
  .header-misc img {
    height: 40px;
    width: auto;
    margin-left: 10px;
    transition: all 0.3s ease;
  }

  body.scrolled .header-misc img {
    height: 35px;
  }
</style>

<header id="header" class="full-header transparent-header dark" data-sticky-class="not-dark">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row">

        <div id="logo">
          <a href="/" class="standard-logo"><img src="{{ asset($setting->logoFullPath ) }}" alt=" Logo"></a>
          <!-- <a href="/" class="retina-logo"><img src="{{ asset('public/storage/' . config('settings.site_logo')) }}" alt=" Logo"></a> -->
        </div>
        <div class="header-misc" id="">


          <a href="/" class="standard-logo"><img src="{{ asset('public/images/logos/undp.png') }}" alt=" Logo"></a>

          <a href="/" class="standard-logo"><img src="{{ asset('public/images/logos/gef.png') }}" alt=" Logo"></a>
        </div>
        <div id="primary-menu-trigger">
          <svg class="svg-trigger" viewBox="0 0 100 100">
            <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
            <path d="m 30,50 h 40"></path>
            <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
          </svg>
        </div>

        @include('site.partials.nav')

      </div>
    </div>
  </div>
  <div class="header-wrap-clone"></div>
</header>

<style>
  /* === RTL FIXES === */
  html[lang="ar"] #header .header-row {
    flex-direction: row-reverse !important;
    justify-content: space-between !important;
  }

  html[lang="ar"] #logo {
    margin-inline-start: auto !important;
    margin-inline-end: 0 !important;
    text-align: right !important;
  }

  html[lang="ar"] .header-misc {
    margin-inline-start: 0 !important;
    margin-inline-end: auto !important;
  }

  html[lang="ar"] #primary-menu {
    margin-inline-end: 0 !important;
    margin-inline-start: auto !important;
  }

  /* Prevent logo and partner logos from overlapping */
  #logo a,
  .header-misc a {
    display: inline-block;
    margin: 0 5px;
    vertical-align: middle;
  }

  /* Keep consistent sizing */
  #logo img,
  .header-misc img {
    max-height: 55px;
    height: auto;
    width: auto;
    object-fit: contain;
  }

  /* === ARABIC HEADER LOGO FIX === */
  html[lang="ar"] #logo {
    display: block !important;
    text-align: right !important;
    direction: rtl !important;
  }

  html[lang="ar"] #logo .standard-logo,
  html[lang="ar"] #logo .retina-logo {
    float: left !important;
    /* ✅ forces the image to the left side */
  }

  html[lang="ar"] #logo img {
    display: inline-block !important;
    max-width: 150px;
    height: auto;
  }
</style>


<!-- /header -->



<script>
  document.addEventListener('scroll', function() {
    if (window.scrollY > 4) {
      document.body.classList.add('scrolled');
    } else {
      document.body.classList.remove('scrolled');
    }
  });
</script>
<style>
  /* === FIX HEADER HEIGHT JUMP === */

  /* Remove any auto height cloning effect from Canvas or theme */
  .header-wrap-clone {
    display: none !important;
    /* disables placeholder clone that causes gap */
  }

  /* Ensure header stays consistent in height */
  #header.full-header,
  body.scrolled #header.full-header {
    transition: all 0.3s ease;
    overflow: hidden;
  }

  /* Fix content offset (since we removed clone) */
  body {
    padding-top: 80px;
    /* same as initial header height */
  }

  /* Optional smoother transition for the logo */
  #logo img,
  .header-misc img {
    transition: height 0.25s ease, transform 0.25s ease;
  }

  body.scrolled #header.full-header {
    height: 80px;
  }

  body.scrolled #logo img {
    transform: scale(0.9);
  }

  /* === BASE HEADER STYLE === */
  #header.full-header {
    background-color: transparent;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  /* When page scrolls even 1px, header becomes white */
  body.scrolled #header.full-header {
    background-color: #ffffff !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  }

  /* === NAVIGATION COLORS === */
  #header.full-header #primary-menu>ul>li>a {
    color: #004b87;
    /* main blue like logo */
    transition: color 0.3s ease, border-color 0.3s ease;
  }

  /* Hover + Active underline */
  #header.full-header #primary-menu>ul>li>a:hover,
  #header.full-header #primary-menu>ul>li.current>a {
    color: #004b87;
    border-bottom: 2px solid #00a86b;
    /* soft green accent under hover */
  }

  /* Submenu style (consistent, no orange, no underline) */
  #header.full-header #primary-menu ul ul {
    background-color: #ffffff;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  #header.full-header #primary-menu ul ul li a {
    color: #004b87;
    transition: all 0.2s ease;
  }

  #header.full-header #primary-menu ul ul li a:hover {
    background-color: #f5f8fa;
    transform: translateY(-2px);
    color: #00a86b;
    /* subtle hover tint */
  }

  /* === FIX HEADER HEIGHT JUMP === */
  .header-wrap-clone {
    display: none !important;
  }

  body {
    padding-top: 80px;
  }

  #logo {
    direction: ltr !important;
    unicode-bidi: isolate !important;
    text-align: left !important;
    margin-inline-start: 0 !important;
    margin-inline-end: auto !important;
    padding-inline-start: 0 !important;
    padding-inline-end: 0 !important;
  }
</style>