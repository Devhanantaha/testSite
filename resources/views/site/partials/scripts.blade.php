
<script src="{{ asset('public/js/jquery.js') }}"></script>
<script src="{{ asset('public/js/plugins.min.js') }}"></script>
   <!-- Swiper JS -->
   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

   <!-- Initialize Swiper -->
   <script>
     var swiper = new Swiper(".swiper-parent", {
      navigation: {
          nextEl: ".slider-arrow-right",
          prevEl: ".slider-arrow-left",
        },
     });
   </script>
   <script>
     $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 100) {
        //clearHeader, not clearheader - caps H
        $("#header").addClass("sticky-header sticky-header-shrink").removeClass("dark");
    }else{
      $("#header").removeClass("sticky-header sticky-header-shrink").addClass("dark");
    }
}); 

$(".toggle").click(function(){
  $(this).children('.toggle-content').toggle();
});

$(".bg-overlay").click(function(){
  $(this).children('.bg-overlay-content').addClass('animated');
  $(this).children('.bg-overlay-content a').addClass('animated');
});


$("#primary-menu-trigger").click(function(){
  $('ul.menu-container').toggle();
  $('body').toggleClass('primary-menu-open');
});
   </script>

	@stack('scripts')