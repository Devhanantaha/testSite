@extends('site.app')
@section('title', 'Compare list')
@section('content')
         <div id="content" class="site-content">
               <div class="container default-entry-header"><h1 class="entry-title simple-title">Compare list</h1><div class="breadcrumbs circle-style" itemprop="breadcrumb"><a href="/">Home</a><span> Compare List</span></div></div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div id="main-content" class="main-content">
                        <div id="primary" class="content-area">
                           <div id="content" class="site-content" role="main">
                              <article id="post-9" class="post-9 page type-page status-publish hentry">
                                 <div class="entry-content clearfix">
                                       <div class="woocommerce-notices-wrapper">
                                             @if(\Session::has('success'))
                                                <div class="woocommerce-message" role="alert">
                                                      {{ \Session::get('success') }}	</div>
                                                   @endif
                                                   @if(\Session::has('error'))
                                                <div class="woocommerce-error" role="alert">
                                                   {{ \Session::get('error') }}	</div>
                                                   @endif
                                             </div>
								 @if($cl_content->count() > 0)                                 
                                    <table class="shop_table cart wishlist_table wishlist_view traditional responsive   " data-pagination="no" data-per-page="5" data-page="1" data-id="216" data-token="D48ONYS6RANT">
                                          <thead>
                                             <tr>
                                                <th class="product-name">Attribute / Product</th>
                                                @foreach($cl_content as $wl )
                                                <th class="product-name">
                                                   <span class="nobr font-weight-bold">
                                                         {{ $wl->associatedModel->name }}  <a href="{{ route('comparelist.delete' , $wl->id) }}" class="remove remove_from_wishlist fa ml-3" title="Remove this product">&times;</a>		</span>
                                                </th>
                                                @endforeach
                                             </tr>
                                          </thead>
                                          <tbody class="wishlist-items-wrapper">
                                             <tr></tr>
                                             @foreach($cat->attributes as $catattrib)
                                             <tr>
                                                <td class="product-name">
                                                   <a href="#">
                                                         {{ $catattrib->name }} 					</a>
                                                </td>
                                                @foreach($cl_content as $wl )
                                                @php
                                                $attributeCheck = in_array($catattrib->id, $wl->associatedModel->attributes->pluck('attribute_id')->toArray());									
                                                @endphp
                                                @if($attributeCheck  )
                                                <td class="product-name">
                                                      @foreach( $wl->associatedModel->attributes as $prattrib)
                                                      @if($catattrib->id == $prattrib->attribute_id )
                                                      {{ $prattrib->value }}
                                                      @endif
                                                      @endforeach
                                                   </td>
                                                   @else
                                                   <td class="product-name"> - </td>
                                                @endif
                                                @endforeach
                                             </tr>
                                             @endforeach
                                             <tr>
                                                   <td class="product-name">
                                                         <a href="#">
                                                               Add to Cart					</a>
                                                      </td>
                                                      @foreach($cl_content as $wl )
                                                      <td class="product-name">
                                                            @if($wl->quantity > 0)
                                                          <a id="addtocart" rel="nofollow" href="#4" data-price="{{ $wl->sale_price > 0 ? $wl->sale_price : $wl->price }}" data-quantity="1" data-product_id="{{$wl->id}}"  class="button add_to_cart_button ajax_add_to_cart add_to_cart alt">Add to Cart</a>
                                                         @endif
                                                      </td>
                                                      @endforeach
                                             </tr>
                                         
                                          </tbody>
                                       </table>
									@else
									<h2 class="text-center">No Items</h2>
									@endif
                                 </div>

                              </article>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 <div id="added"></div>
        @stop
		@push('scripts')

     
	 <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/home page-template page-template-page-templates page-template-homepage page-template-page-templateshomepage-php elementor-page/, 'wishlist');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
	  <script>
	  $('#addtocart').click(function(){
        var quantity = this.dataset.quantity ;
        var productId = this.dataset.product_id ;
        var price = this.dataset.price ;
		$.ajax({
			url:'/product/add/cart/single/en',
		data:{"action":"addToCart",productId:productId,quantity:quantity,price:price},
		  method:"get",	
		success:function(result){
			
                $('#cartcount').html(result['cartcount']);
                $('#added').html(result['added']);
                $('#minicart ul').html(result['minicart']);
                $('#carttotal').html(result['carttotal']);
			$('#results .products-thumb .product-button a.'+productId).removeClass("loading").addClass("added_to_cart");
			
				setTimeout(function(){
				 $(".funio-product-added").hide('slow');
					}, 3000);
           
       
		}
		});
		$.ajax({
			url:'/wishlist/delete/item/'+productId,
		data:{"action":"addToCart",productId:productId,quantity:quantity,price:price},
		  method:"get",	
		success:function(result){
			
			
				setTimeout(function(){
				 location.reload();
					}, 3000);
           
       
		}
		});
    });
	
	  </script>
	  <script>
    if ($(window).width() < 500) {
       $.ajax({
			url:'/wishlist/mobile/',
		data:{"action":"addToCart"},
		  method:"get",	
		success:function(result){
			
			
                $('#wishlist_table').html(result);
				
           
       
		}
		});
    }
	  </script>
	  @endpush