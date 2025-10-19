<!DOCTYPE HTML>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.ar.styles')
	
</head>
<body class="home page-template page-template-page-templates page-template-homepage page-template-page-templateshomepage-php elementor-page  page theme-funio woocommerce-js banners-effect-6 elementor-default elementor-kit-17880 elementor-page-11550 loaded ">
@include('site.partials.ar.header')
@yield('content')
@include('site.partials.ar.footer')
@include('site.partials.scripts')
</body>
</html>
