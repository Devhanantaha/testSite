 <div class="green">
   <div class="border-top-0 pt-5" style="background-color:#82bc41">
     <div class="container clearfix">
       <div class="heading-block center m-0">
         <h3 style="color:#fff">{{ __('site.videos') }} </h3>
       </div>
     </div>
     <div class="clear"></div>
   </div>
   <div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget py-5 container" 
   data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="3">
     @foreach ($vedios as $vedio)
     <div class="portfolio-item">
       <div class="portfolio-image">
         <a href="#">
           <img src="{{ asset('/storage/'. $vedio->image)}} " alt="{{ $vedio->LocalName }}">
         </a>
         <div class="bg-overlay">
           <div class="bg-overlay-content dark animated" data-hover-animate="fadeIn" data-hover-speed="350">
             <a href="{{strip_tags( $vedio->LocalDescription) }}" 
             class="overlay-trigger-icon bg-light text-dark animated fadeInDownSmall" 
             data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" 
             data-hover-speed="350" data-lightbox="iframe"><i class="icon-line-play"></i></a>
           </div>
           <div class="bg-overlay-bg dark animated " data-hover-animate="fadeIn" data-hover-speed="350"></div>
         </div>
       </div>
       <div class="portfolio-desc">
         <h3><a href="{{ $vedio->LocalDescription }}">{{ $vedio->LocalName }}</a></h3>
       </div>
     </div>
     @endforeach
   </div>
 </div>
</div>