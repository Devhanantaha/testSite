@extends('site.app')
@section('title', $phase->LocalName)
@section('content')

<section id="page-title">
  <div class="container clearfix">
  <h1>{{$phase->LocalName}}</h1>
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/{{ $local }}">{{$heading['home']}}</a></li>
  <li class="breadcrumb-item "><a href="/where-we-work/{{ $local }}">{{$heading['where']}}</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{$phase->LocalName}}</li>
  </ol>
  </div>
  </section>
<!-- /section -->
<section id="content">
<div class="content-wrap">
    <div class="container clearfix">
        <div class="position-relative clearfix">
            <h4 class="text-center">{{$heading['where']}} -  {{$phase->LocalName}}. 
                
            </h4>
            <ul class="icons-list topmargin clearfix" >
                @foreach ($phase->products as $project) 
                @foreach ($states as $state)   
					@if($project->state->id == $state->id)
                     <li><i class="icon-world"></i><a href="/work/state/{{$state->id}}/{{$phase->slug}}/{{ $local }}"><span>{{ $state->LocalName }}</span></a></li>
				 @endif
                @endforeach
				@endforeach
            </ul>
        
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
@if ($local == "ar")
<style>
     ul.icons-list li {
        float: right;}
</style>  
@endif
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