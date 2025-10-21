@extends('site.app')
@section('title', 'Homepage')
@section('content')

@push('css')
<style>

</style>
@endpush
@include('site.partials.flash')

@include('site.partials.home.slider')

<section id="content">
  <div class="content-wrap">
    <div class="row bottommargin-lg align-items-stretch">

      @include('site.partials.about')

    </div>


    <div class="section m-0">
      @include('site.partials.categories')

    </div>
  
  
        <!-- @include('site.partials.map') -->

    @include('site.partials.news')

  </div>
</section>


@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('.owl-carousel').owlCarousel({
    loop: false,
    margin: 30,
    dots: true,
    nav: true,
    items: 4,
  })
</script>
<script>
  $('.overlay-trigger-icon').magnificPopup({
    // you may add other options here, e.g.:
    preloader: true,
    type: 'iframe',
    iframe: {
      markup: '<div class="mfp-iframe-scaler">' +
        '<div class="mfp-close"></div>' +
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
        '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button

      patterns: {
        youtube: {
          index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

          id: 'v=', // String that splits URL in a two parts, second part should be %id%
          // Or null - full URL will be returned
          // Or a function that should return %id%, for example:
          // id: function(url) { return 'parsed id'; }

          src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
        },
        vimeo: {
          index: 'vimeo.com/',
          id: '/',
          src: '//player.vimeo.com/video/%id%?autoplay=1'
        },
        gmaps: {
          index: '//maps.google.',
          src: '%id%&output=embed'
        }

        // you may add here more sources

      },

      srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
    }


  });
</script>
@endpush