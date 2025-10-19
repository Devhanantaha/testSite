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
<div class="row justify-content-sm-center row-70">

  @foreach($products as $product)
	  <div class="col-md-6 col-xl-3">
		<div class="product product-grid">
		  <div class="product-img-wrap">
		  <img src="{{ asset('storage/'.$product['images']->first()['thumbnail']) }}" alt="" width="300" height="400">
		   
		  </div>
		  <div class="product-caption">
			<ul class="product-categories">
			  <li><a href="#">Falcon</a></li>
			</ul>
			<h6 class="product-title"><a href="/product/{{$product->slug}}/en">{{ $product->name }}</a></h6>
		   @if($product->sale_price > 0 && $product->sale_price > $product->price)
		   <p class="product-price sale-price"><span>{{$product->price}}</span><span>{{$product->sale_price}}</span>
			</p>
			@else
			<p class="product-price"><span>{{$product->price}}</span>
			</p>						
			@endif
			@if(!$product->attribs )
			<a class="add_to_cart button-primary button button-icon button-icon-left" href="#c" data-product_id ="{{$product->id}}" data-quantity ="1">
			<span class="icon novi-icon icon-md linear-icon-cart"></span><span>Add to cart</span></a>
			@else	
			<a class="button-gray-light-outline button button-icon button-icon-left" href="/product/{{$product->slug}}/en">
			<span class="icon novi-icon icon-md linear-icon-magic-wand"></span><span>Select options</span></a>

			@endif
			
		  </div>
		</div>
	  </div>
    @endforeach
</div>



   

	<script src="/assets/js/addto.js"></script>


									
   @else 
   <h3> No products Filtered </h3>
 
@endif
@php
$currprs = \Session::get('ProductIds');
@endphp

  <script>
   function listView() {
	     @php
\Session(['type' => 'grid']);
@endphp
 var items = [];
 @foreach($currprs as $cp) 

	items.push("{{$cp}}")
	@endforeach
	$.ajax({ 
        method:'get', 
        url: "/test/{{$cat}}",
        data      : {"items":items,"type":'list'}, // pass in json format 
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