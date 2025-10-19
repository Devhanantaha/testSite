@extends('site.app')
@section('title', $state->LocalName)
@section('content')
<section id="page-title" >
  <div class="container clearfix">
  <h1>{{ $phase->LocalName }} / {{ $state->LocalName }}</h1>
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/{{ $local }}">{{$heading['home']}}</a></li>
  <li class="breadcrumb-item"><a href="/where-we-work/{{ $local }}">{{$heading['where']}}</a></li>
  <li class="breadcrumb-item"><a href="/where-we-work/{{ $local }}">{{ $phase->LocalName }}</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{ $state->LocalName }}</li>
  </ol>
  </div>
  </section>
  <style>
    .dark .menu-link {
    color: #000;
  }
  </style>
<!-- /section -->
<section id="content" >
<div class="content-wrap">
<div class="container clearfix">
<div class="tabs tabs-responsive clearfix ui-tabs ui-corner-all ui-widget ui-widget-content">
<ul class="tab-nav clearfix ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header" role="tablist">
  <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="tab-responsive-1" aria-labelledby="ui-id-34" aria-selected="true" aria-expanded="true"><a href="#tab-responsive-1" tabindex="0" class="ui-tabs-anchor" id="ui-id-33">{{$heading['overview']}}</a></li>
<li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab " aria-controls="tab-responsive-2" aria-labelledby="ui-id-34" aria-selected="false" aria-expanded="false"><a href="#tab-responsive-2" tabindex="-1" class="ui-tabs-anchor" id="ui-id-34">{{$heading['stories']}}</a></li>
<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tab-responsive-3" aria-labelledby="ui-id-35" aria-selected="false" aria-expanded="false"><a href="#tab-responsive-3" tabindex="-1" class="ui-tabs-anchor" id="ui-id-35">{{$heading['voices']}}</a></li>
<li class="d-none d-md-block ui-tabs-tab ui-corner-top ui-state-default ui-tab" role="tab" tabindex="-1" aria-controls="tab-responsive-4" aria-labelledby="ui-id-36" aria-selected="false" aria-expanded="false"><a href="#tab-responsive-4" tabindex="-1" class="ui-tabs-anchor" id="ui-id-36">{{$heading['gallery']}}</a></li>
</ul>
<div class="tab-container" data-active="">

  <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-responsive-1" aria-labelledby="ui-id-33" role="tabpanel" style="display: block;" aria-hidden="false">
    <h3>{{$heading['projects']}}</h3>
    <ul>
        @foreach ($phase->products as $project)
            <li> <a href="{{ route('project.show' , $project->slug) }}/{{ $local }}">{{ $project->LocalName }}</a> </li>
        @endforeach
    </ul>
    </div>
<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-responsive-2" aria-labelledby="ui-id-34" role="tabpanel" style="display: none;" aria-hidden="true">
  <div class="row">
    @foreach ($state->stories as $story)
    <div class="col-md-2">
        <img src="/storage/{{ $story->image }}">
       </div>
       <div class="col-md-10">
         <h5 class="mb-1 mt-3">{{ $story->LocalName }}</h5>
         <p class="mb-2">{{ strip_tags(str_limit($story->LocalDescription,200))}}</p>
         <a href="{{ route('page.show' , $story->slug) }}/{{ $local }}" class="button button-border button-dark button-rounded text-uppercase m-0">{{$heading['readmore']}}</a>
       </div>
    @endforeach
  </div>
</div>
<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-responsive-3" aria-labelledby="ui-id-35" role="tabpanel" style="display: none;" aria-hidden="true">
<div class="row">
@foreach ($state->vedios as $vedio)
<div class="col-6 col-md-3" >
    <div class="portfolio-item">
    <div class="portfolio-image">
    <a href="#">
    <img src="/storage/{{ $vedio->image }}" alt="Mac Sunglasses">
    </a>
    <div class="bg-overlay">
    <div class="bg-overlay-content dark animated" data-hover-animate="fadeIn" data-hover-speed="350">
    <a href="{{ $vedio->LocalDescription }}" class="overlay-trigger-icon bg-light text-dark animated fadeInDownSmall" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350" data-lightbox="iframe"><i class="icon-line-play"></i></a>
    
    </div>
    <div class="bg-overlay-bg dark animated " data-hover-animate="fadeIn" data-hover-speed="350"></div>
    </div>
    </div>
    <div class="portfolio-desc">
    <h3><a href="{{ $vedio->LocalDescription }}">{{ $vedio->LocalName }}</a></h3>
    </div>
    </div>
</div>
@endforeach

</div>

</div>
<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-responsive-4" aria-labelledby="ui-id-36" role="tabpanel" style="display: none;" aria-hidden="true">
<p>
  <div class="masonry-thumbs grid-container grid-4" data-big="4" data-lightbox="gallery">
    @foreach ($state->projects as $product)
    @foreach ($product->images as $image)
    <a class="grid-item" href="/storage/{{ $image->full }}" data-lightbox="gallery-item" data-group="1">
      <img src="/storage/{{ $image->thumbnail }}" alt="{{ $product->LocalName }}">
    </a>
    @endforeach
    @endforeach
   
  </div>
</p>
</div>
</div>
</div>
</div>
</div>


</section>

<!-- /section -->

          @stop
@push('scripts')
<script>
  $('ul.tab-nav li:first-child').addClass('ui-tabs-active');
$('.tab-content').hide();
$('.tab-content:first').show();

// Click function
$('ul.tab-nav li').click(function(){
  $('ul.tab-nav li').removeClass('ui-tabs-active');
  $(this).addClass('ui-tabs-active');
  $('.tab-content').hide();
  
  var activeTab = $(this).find('a').attr('href');
  $(activeTab).fadeIn();
  return false;
});
$('.portfolio-carousel').owlCarousel({
    loop: true,
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
  markup: '<div class="mfp-iframe-scaler">'+
            '<div class="mfp-close"></div>'+
            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
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


var groups = {};
$('.grid-item').each(function() {
  var id = parseInt($(this).attr('data-group'), 10);
  
  if(!groups[id]) {
    groups[id] = [];
  } 
  
  groups[id].push( this );
});


$.each(groups, function() {
  
  $(this).magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false,
      gallery: { enabled:true }
  })
  
});
</script>
  
@endpush