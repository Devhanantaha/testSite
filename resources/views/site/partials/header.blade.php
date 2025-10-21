<style>
  /* === GLOBAL COLORS === */
  :root {
    --brand-blue: #0056A3;
    --brand-blue-light: #E8F1FA;
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
  }

  /* Header layout */
  #header .header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 80px;
    gap: 20px;
  }

  /* === SHRINK ON SCROLL === */
  body.scrolled #header.full-header {
    height: 65px;
    background: var(--navbar-bg);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  /* Keep content from hiding under fixed header */
  body {
    padding-top: 80px;
  }

  /* === LOGO AREA === */
  #logo {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    margin: 0;
    padding: 0;
  }

  #logo img {
    height: 55px;
    width: auto;
    transition: all 0.3s ease;
  }

  body.scrolled #logo img {
    height: 45px;
  }

  /* === PARTNER LOGOS === */
  .header-misc {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .header-misc img {
    height: 40px;
    width: auto;
    transition: all 0.3s ease;
  }

  body.scrolled .header-misc img {
    height: 35px;
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
    display: flex;
    align-items: center;
  }

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

  .primary-menu>.menu-item>.menu-link:hover {
    color: var(--brand-blue);
  }

  .primary-menu>.menu-item>.menu-link:hover::after {
    width: 70%;
  }

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

  .primary-menu .menu-item:hover>.sub-menu-container {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .sub-menu-container .menu-link {
    color: var(--text-dark);
    padding: 8px 20px;
    display: block;
    font-size: 14px;
    transition: all 0.25s ease;
  }

  .sub-menu-container .menu-link:hover {
    background: var(--brand-blue);
    color: #fff;
    transform: translateX(4px);
    border-radius: 4px;
  }

  /* === RTL FIXES === */
  html[lang="ar"] #header .header-row {
    flex-direction: row-reverse !important;
    justify-content: space-between !important;
    align-items: center !important;
    gap: 20px;
  }

  html[lang="ar"] #logo {
    margin: 0 !important;
    padding: 0 !important;
    text-align: right !important;
    direction: rtl !important;
  }

  html[lang="ar"] .header-misc {
    margin: 0 !important;
  }

  /* === MOBILE HEADER FIXES === */
  @media (max-width: 991px) {

    #header.full-header {
      height: auto;
      padding: 10px 0;
    }

    #header .header-row {
      flex-wrap: wrap;
      justify-content: space-between;
      height: auto;
      gap: 10px;
    }

    /* Hamburger icon */
    #primary-menu-trigger {
      display: block !important;
      width: 40px;
      height: 40px;
      cursor: pointer;
    }

    .svg-trigger path {
      stroke: var(--brand-blue);
      stroke-width: 5;
      fill: none;
      stroke-linecap: round;
    }

    /* Hide menu initially */
    .primary-menu {
      display: none;
      flex-direction: column;
      background: var(--navbar-bg);
      width: 100%;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      border-radius: 6px;
      margin-top: 10px;
      overflow: hidden;
      max-height: 0;
      opacity: 0;
      transition: all 0.4s ease;
    }

    /* Show on active */
    .primary-menu.active {
      display: flex;
      max-height: 500px;
      opacity: 1;
    }

    /* Mobile links */
    .primary-menu .menu-link {
      padding: 14px 20px;
      border-bottom: 1px solid #eee;
      justify-content: flex-start;
    }

    .primary-menu .menu-link:hover {
      background: var(--brand-blue-light);
      color: var(--brand-blue);
    }

    /* Submenu */
    .sub-menu-container {
      position: static !important;
      box-shadow: none !important;
      transform: none !important;
      opacity: 1 !important;
      visibility: visible !important;
      padding-left: 20px;
    }

    html[lang="ar"] .primary-menu .menu-link {
      text-align: right;
    }

    #logo img,
    .header-misc img {
      max-height: 45px;
    }
  }
</style>

<header id="header" class="full-header transparent-header dark" data-sticky-class="not-dark">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row">

        <div id="logo">
          <a href="/" class="standard-logo">
            <img src="{{ asset($setting->logoFullPath) }}" alt="Logo">
          </a>
        </div>

        <div class="header-misc">
          <a href="/" class="standard-logo">
            <img src="{{ asset('public/images/logos/gef.png') }}" alt="Logo">
          </a>
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
</header>

<script>
  // Shrink header on scroll
  document.addEventListener('scroll', function () {
    document.body.classList.toggle('scrolled', window.scrollY > 4);
  });

  // Mobile menu toggle
  document.addEventListener('DOMContentLoaded', function () {
    const trigger = document.querySelector('#primary-menu-trigger');
    const menu = document.querySelector('.primary-menu');

    if (trigger && menu) {
      trigger.addEventListener('click', function () {
        menu.classList.toggle('active');
      });
    }
  });
</script>
