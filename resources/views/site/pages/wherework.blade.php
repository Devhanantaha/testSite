@extends('site.app')
@section('title', __('site.wherework'))
@section('content')

<section id="page-title">
  <div class="container clearfix">
  <h1>{{ __('site.where') }}</h1>
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('site.home') }}</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{ __('site.where') }}</li>
  </ol>
  </div>
  </section>
<!-- /section -->
<section id="content">
<div class="content-wrap">
    <div class="container clearfix">
        <div class="position-relative clearfix">
            <h4 class="text-center">{{ __('site.where-bio') }}
            </h4>
            <div class="input-group w-50 mx-auto">
            
            <input type="text" id="icons-filter" class="form-control" value="" placeholder="{{ __('site.search-gov') }}">
            </div>
            <ul class="icons-list topmargin clearfix">
                @foreach ($states as $state)                    
                     <li><i class="icon-world"></i><a href="#"><span>{{ $state->LocalName }}</span></a></li>
                @endforeach
        
        </div>
    </div>
</div>


</section>
<style>
    ul.icons-list { list-style: none; }

    ul.icons-list li {
        float: left;
        width: 25%;
        margin-bottom: 20px;
        font-size: 16px;
        padding: 0 15px;
    }

    ul.icons-list li i {
        position: relative;
        top: 5px;
        margin-right: 20px;
        width: 24px;
        height: 24px;
        line-height: 24px;
        text-align: center;
        font-size: 24px;
    }

    .device-lg ul.icons-list li { width: 33.333%; }

    .device-md ul.icons-list li,
    .device-sm ul.icons-list li { width: 50%; }

    .device-xs ul.icons-list li { width: 100%; }

  .dark .menu-link {
  color: #000;
}
</style>
<!-- /section -->

          @stop
@push('scripts')
<script>
	// jQuery Typing
    (function(f){function l(g,h){function d(a){if(!e){e=true;c.start&&c.start(a,b)}}function i(a,j){if(e){clearTimeout(k);k=setTimeout(function(){e=false;c.stop&&c.stop(a,b)},j>=0?j:c.delay)}}var c=f.extend({start:null,stop:null,delay:400},h),b=f(g),e=false,k;b.keypress(d);b.keydown(function(a){if(a.keyCode===8||a.keyCode===46)d(a)});b.keyup(i);b.blur(function(a){i(a,0)})}f.fn.typing=function(g){return this.each(function(h,d){l(d,g)})}})(jQuery);

jQuery(document).ready( function($){

    $('#icons-filter').typing({
        stop: function (event, $elem) {
            var filterValue = $elem.val(),
                count = 0;

            if( $elem.val() ) {

                $(".icons-list li").each(function(){
                    if ($(this).text().search(new RegExp(filterValue, "i")) < 0) {
                        $(this).fadeOut();
                    } else {
                        $(this).show();
                        count++
                    }
                });
            } else {
                $(".icons-list li").show();
            }

            count = 0;
        },
        delay: 500
    });

});
</script>
  
@endpush