@php
$arr = \Session::put('ProductIds', [] , 'type' , '', 'currency', 'egp');
if(count($products) > 0)
  {
	  foreach($products as $pr)
	  {
		\Session::push('ProductIds', $pr->sku);
	  }
  }
@endphp


@if(count($products) > 0)


  @foreach($products as $product)
  <div class="produc row justify-content-sm-center ">
        <div class=" col-6 col-md-3" style="padding-right:0px">
             <div class=" product-grid ">
                 <div class="product-img-wrap">
                     <a href="/product/{{$product->slug}}/en">
                         <img src="{{ asset('storage/'.$product['images']->first()['thumbnail']) }}" alt="EM300E" class="img-responsive" width="300" height="400">
                     </a>						   						   
                 </div>
             </div>
         </div>				   
          <div class=" col-6 col-md-9">
                 <div class="product-caption">
                     <a href="/product/{{$product->slug}}/en">
                       <h6 class="product-title" style="margin-top: 8px;font-weight: bold;color:#9fa5aa;line-height:.5">{{ $product->name }}</h6>
                       <p style="color:#9fa5aa;font-size:13px" class="product-title">{{$product->categories[0]->name}}<br> {{ strip_tags(str_limit($product->description,250))}}<br></p><p>Price: L.E {{$product->price}}</p>
                     </a><br>
                     @if(!$product->attribs )
                     <a href="#c" style=" font-size: small; " data-product_id ="{{$product->id}}" data-quantity ="1" class="font-italic add_to_cart"> 
                     <i class="icon icon-md linear-icon-cart link-gray-4"></i> Add to Cart </a>
                     @else
                     
                     <a href="/product/{{$product->slug}}/en" style=" font-size: small; " class="font-italic "> 
                            <i class="icon icon-md linear-icon-eye link-gray-4"></i> Select Options </a>
                    @endif
                 </div>
         </div>	
     </div>
  
   @endforeach
   

	<script src="/assets/js/addto.js"></script>


									
   @else 
   <h3> No products Filtered </h3>
 
@endif

@php
$currprs = \Session::get('ProductIds');

@endphp

  <script>

   function gridView() {
	     @php
\Session(['type' => 'list']);
@endphp
 var items = [];
 @foreach($currprs as $cp) 

	items.push("{{$cp}}")
	@endforeach
	$.ajax({ 
        method:'get', 
        url: "/test/{{$cat}}",
        data      : {"items":items,"type":'grid'}, // pass in json format 
        success   : function(data) {
			
				$('.bwp-top-bar.bottom').hide();
             $('#results').html(data);
        },
        error : function(err){
            console.log(err)
        }
    });
 //fin ajax 
  };
        

</script>