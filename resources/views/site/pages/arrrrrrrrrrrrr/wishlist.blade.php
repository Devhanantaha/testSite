@extends('site.app')
@section('title', 'Wish list')
@section('content')
         <div id="content" class="site-content">
               <div class="container default-entry-header"><h1 class="entry-title simple-title">Wishlist</h1><div class="breadcrumbs circle-style" itemprop="breadcrumb"><a href="/">Home</a><span> Wishlist</span></div></div>
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
								 @if($wl_content->count() > 0)
                                    <form id="yith-wcwl-form" action="/" method="post" class="woocommerce yith-wcwl-form wishlist-fragment" data-fragment-options="{&quot;per_page&quot;:5,&quot;current_page&quot;:1,&quot;pagination&quot;:&quot;no&quot;,&quot;wishlist_id&quot;:106,&quot;action_params&quot;:&quot;&quot;,&quot;no_interactions&quot;:false,&quot;layout&quot;:&quot;&quot;,&quot;is_default&quot;:true,&quot;is_custom_list&quot;:true,&quot;wishlist_token&quot;:&quot;RM031JA4ZO0G&quot;,&quot;is_private&quot;:false,&quot;count&quot;:4,&quot;page_title&quot;:&quot;&quot;,&quot;default_wishlsit_title&quot;:&quot;&quot;,&quot;page_links&quot;:false,&quot;is_user_logged_in&quot;:false,&quot;is_user_owner&quot;:true,&quot;can_user_edit_title&quot;:true,&quot;show_price&quot;:true,&quot;show_dateadded&quot;:false,&quot;show_stock_status&quot;:true,&quot;show_add_to_cart&quot;:true,&quot;show_remove_product&quot;:true,&quot;add_to_cart_text&quot;:&quot;Add to Cart&quot;,&quot;show_ask_estimate_button&quot;:false,&quot;ask_estimate_url&quot;:&quot;&quot;,&quot;price_excl_tax&quot;:true,&quot;show_cb&quot;:false,&quot;show_quantity&quot;:false,&quot;show_variation&quot;:false,&quot;show_price_variations&quot;:false,&quot;show_update&quot;:false,&quot;enable_drag_n_drop&quot;:false,&quot;enable_add_all_to_cart&quot;:false,&quot;move_to_another_wishlist&quot;:false,&quot;repeat_remove_button&quot;:false,&quot;show_last_column&quot;:true,&quot;heading_icon&quot;:&quot;&lt;img src=\&quot;\&quot; width=\&quot;32\&quot; \/&gt;&quot;,&quot;share_enabled&quot;:false,&quot;template_part&quot;:&quot;view&quot;,&quot;additional_info&quot;:false,&quot;available_multi_wishlist&quot;:false,&quot;form_action&quot;:&quot;https:\/\/wpbingosite.com\/wordpress\/funio\/wishlist\/view\/RM031JA4ZO0G\/&quot;,&quot;ajax_loading&quot;:false,&quot;item&quot;:&quot;wishlist&quot;}">
                                      <div id="wishlist_table">
									   <table
                                          class="shop_table cart wishlist_table wishlist_view traditional responsive   "                                         
                                         
                                          >
                                          <thead>
                                             <tr>
                                                <th class="product-remove"> <span class="nobr"> </span></th>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name"> <span class="nobr"> Product name </span></th>
                                                <th class="product-price"> <span class="nobr"> Unit price </span></th>
                                                <th class="product-stock-status"> <span class="nobr"> Stock status </span></th>
                                                <th class="product-add-to-cart"> <span class="nobr"> </span></th>
                                             </tr>
                                          </thead>
                                          <tbody class="wishlist-items-wrapper" >
                                             <tr id="yith-wcwl-row-16536" data-row-id="16536">
											 @foreach($wl_content as $wl)
                                                <td class="product-remove">
                                                   <div> <a href="{{ route('wishlist.delete' , $wl->id) }}" class="remove remove_from_wishlist" title="Remove this product">&times;</a></div>
                                                </td>
                                                <td class="product-thumbnail">
                                                      <a href="/product/{{$wl->associatedModel->slug}}/en">
                                                      <img width="1020" height="1020" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201020%201020'%3E%3C/svg%3E" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" 
													  alt="" loading="lazy" data-lazy-src="{{ asset('storage/'.$wl->associatedModel['images']->first()['full']) }}" />
                                                      <noscript><img width="1020" height="1020" src="{{ asset('storage/'.$wl->associatedModel['images']->first()['full']) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" /></noscript>
                                                   </a>
                                                </td>
                                                <td class="product-name"> <a href="/product/{{$wl->associatedModel->slug}}/en">{{$wl->name}}</a></td>
                                                <td class="product-price">
		 @if($wl->sale_price > 0)
												 <del><span class="woocommerce-Price-amount amount">
												 <bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$wl->price / $currencyRate, 2, '.', '')}}</bdi>
												 </span></del>
												 <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$wl->sale_price / $currencyRate, 2, '.', '')}}</bdi></span></ins></span>
												 @else
												  <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$wl->price / $currencyRate, 2, '.', '')}}</bdi></span></ins></span>
												  @endif
                                    </td>
                                    @if($wl->quantity > 0)
                                          <td class="product-stock-status"> <span class="wishlist-in-stock">In Stock</span></td>
                                          @else
                                          <td class="product-stock-status"> <span class="wishlist-out-of-stock">Out Of Stock</span></td>
                                          @endif
                                          <td class="product-add-to-cart">
                                                @if($wl->quantity > 0)
                                              <a id="addtocart" rel="nofollow" href="#4" data-price="{{ $wl->sale_price > 0 ? $wl->sale_price : $wl->price }}" data-quantity="1" data-product_id="{{$wl->id}}"  class="button add_to_cart_button ajax_add_to_cart add_to_cart alt">Add to Cart</a>
                                             @endif
                                             </td>
                                             </tr>
                                             @endforeach
											 
                                          </tbody>
                                       </table>
									   </div>
                                       <div class="yith_wcwl_wishlist_footer"></div>
                                    </form>
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