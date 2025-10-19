@extends('site.appar')
@section('title', $category->name2)
@section('content')

<link rel="stylesheet" href="https://elwaha.com.eg/css/jquery-ui.css">
<style>p+p {
      margin-top: 0;
      font-size: 12px;
  }</style>
<section class="bg-default">
      <div>
        <div class="row row-60 flex-lg-row-reverse">
          <div class="col-lg-9 order-sp-2 section-xl section-divided__main section-divided__main-left">
            <div class="section-md">
                <div class="filter-shop-box mb-5">
                    <a href="#g" onclick="listView()" class="text-center @if(\Session::get('type') != "list") active @endif" data-toggle="tooltip" data-placement="top" title="عرض قائمة">
                    <i class="icon icon-md linear-icon-list " style="box-shadow:0 0px 0px rgba(0,0,0,.175)!important"></i>
                  </a>
                  <a href="#g" onclick="gridView()" class="text-center @if(\Session::get('type') != "grid") active @endif" data-toggle="tooltip" data-placement="top" title="عرض شبكة">
                      <i class="icon icon-md linear-icon-grid " style="box-shadow:0 0px 0px rgba(0,0,0,.175)!important"></i>
                    </a>
                  </div>
           <div class="filter_data" id="results">

              </div>
            </div>
          </div>
          <div class="col-lg-3 order-sp-1 section-divided__aside section__aside-left" style="background: #003f63;opacity: .85;">
            <!-- Categories-->
            <section class="section-md">
              <div class="left-top title-bottom-c">
          <h6 class="left-top-text" style="top:-29px">{{ $category->name2 }}</h6>
          </div> 
          <div style="padding: 0px 45px 0px 45px;" >
             <h6 style="color:#fff;font-size: 16px;margin-bottom: 15px;"> تصفية حسب :</h6>
             
         <div class="">
               <b  style="font-weight:bold;color:#fff">السعر</b><br>
               <input type="hidden" id="hidden_minimum_price" value="" />
              <input type="hidden" id="hidden_maximum_price" value="" />
              <label id="price_show" class="filter containerr" style="margin-bottom: 10px;">{{$minprice}} - {{$maxprice}}</label>
              <div id="price_range"style="margin-bottom: 48px;"></div>
           </div>                       
           <hr style="margin-top: 8px;margin-bottom: 8px;">

@if($category->attributes->count() > 0  && $category->products->count() > 0 )
@foreach( $category->attributes as $attribute)
             <b style="font-weight:bold;color:#fff"> {{ $attribute->name2 }}</b><br>
             @foreach($attribvalues as $attributeValue)	
               @if ($attributeValue->attribute_id == $attribute->id )
               <label class="filter containerr">{{$attributeValue->valuear}}
               <input  class="common_selector {{ $attribute->code }}" value="{{$attributeValue->value}}"  type="checkbox">
               <span class="checkmark"></span>
             </label>            
               @endif
               @endforeach
                         
             <hr style="margin-top: 8px;margin-bottom: 8px;">
             
					@endforeach
					@endif           
                            
          </div>
            </section>
          </div>
        </div>
      </div>
    </section>

		@stop 
	@push('scripts')
	


	<script>
  $(document).ready(function(){
	
    filter_data();
	

    function filter_data()
    {
		$(".quickview-wrapper").addClass("open");
        var action = 'fetch_data';
		@foreach( $category->attributes as $attribute)
        var {{$attribute->code}} = get_filter('{{$attribute->code}}');
        @endforeach
		var cats = get_filter('cats') ;
		var brands =  get_brands();
		var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();	
		var currencyactiveelement = get_currency();	
      var sortactiveelement = $('#sorting').val();
    //  alert(sortactiveelement);
        $.ajax({
	url:"{{url("fetch_data")}}/{{ $category->slug }}/ar",
            method:"get",			
        dataType: "html",
		
            data:{action:action,brands:brands,cats:cats,minimum_price:minimum_price,maximum_price:maximum_price,sortactiveelement:sortactiveelement,currencyactiveelement:currencyactiveelement,@foreach( $category->attributes as $attribute) {{$attribute->code}}:{{$attribute->code}}, @endforeach },
            success:function(data){
				
		$(".quickview-wrapper").removeClass("open");
                $('#results').html(data);
            }
        });
    }
	function get_currency()
    {
		var filter = [];	
		$('#currency').children('li').each(function () {
            if (this.classList.contains("active")){				
			var currencyactiveelement = this.dataset.value
				filter.push(currencyactiveelement);
			}
        });
        return filter ;
    }
    function get_brands()
    {
		var filter = [];	
		$('#brands').children('li').each(function () {
            if (this.classList.contains("selected")){				
			var currencyactiveelement = this.dataset.value
				filter.push(currencyactiveelement);
			}
        });
        return filter ;
    }
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
 //alert(filter);
        return filter;
    }
	
    $('.common_selector').click(function(){
        filter_data();
    });
	$('#sorting').change(function(){
        filter_data();
    });
    $('#brands li').click(function(){
       $(this).toggleClass('selected');
        filter_data();
    });

	   function get_rate(active) {
		 var action= 'get_rate';
		 
		 var active= active;
			$.ajax({ 
				method:'get', 
				url: "/get_rate/",
				data      : {"action":action, "active":active}, // pass in json format 
				success   : function(data) {
					
						$('.bwp-top-bar.bottom').hide();
					 $('#text-price-filter-min-text').html(data);
				},
				error : function(err){
					console.log(err)
				}
			});
		 //fin ajax 
		  }; 
	$('#price_range').slider({
        range:true,
        min:{{$minprice}},
        max:{{$maxprice}},
        values:[{{$minprice}}, {{$maxprice}}],
        step:1,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        },
		slide:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
        }
    });


});
</script>

	
<script>
   $("aside.widget").click(function(){
      $(this).children("ul").toggle();
      $( this ).children("h3").toggleClass('opened');;
   });
</script>
 <script type="text/javascript">(function () {
   var c = document.body.className;
   t = c.replace(/home/, 'woocommerce');
   document.body.className = c;
   document.body.className = t;
   })()
</script> 
@endpush