@extends('site.app')
@section('title', $collection->name)
@section('content')
<style>
.page-template-homepage .bwp-header.header-v3 .bwp-navigation ul>li.level-0>a {
    color: #242424;
}
.bwp-header .header-desktop {
    border-bottom: 1px solid #e5e5e5;
    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgb(229, 229, 229);
}
.page-template-homepage .bwp-header.header-v3 .header-page-link .login-header .block-top-link .widget-title, .page-template-homepage .bwp-header.header-v3 .header-page-link .login-header>a, .page-template-homepage .bwp-header.header-v3 .header-page-link .mini-cart .cart-icon .icons-cart, .page-template-homepage .bwp-header.header-v3 .header-page-link .search-box .search-toggle, .page-template-homepage .bwp-header.header-v3 .header-page-link .wishlist-box a{
	color:#000
}
.bwp-top-bar.bottom{
	position:absolute;
	top: 20%;
	left:30%
}
</style>
<div id="content" class="site-content" >
            <div data-bg_default ="" class="page-title bwp-title empty-image" >
               <div class="main-container" >
                     <div class="page-banner shop-banner has-banner" 
                     style="min-height: 500px;">
                     <div class="page-banner-content">
                           <h1 class="entry-title">{{ $collection->name }}</h1><div class="breadcrumbs circle-style" itemprop="breadcrumb"><a href="/">Home</a><span> {{ $collection->name }}</span></div></div></div>
               </div>
            </div>
            <div id="primary" class="shop_content">
               <main id="main" class="site-main" role="main">
                  <div class="sidebar  shop-layout-full">
                     <div class="container maincol-sidebar-none">
                        <div class="main-archive-product row">
                           <div class="col-xl-12 col-lg-12 col-md-12 col-12" >
                              <div class="content-products-list">
                                 <div id="results" class="shop-products products col3-view" >
								 
  @foreach($collection->products as $product)
<div class="item-col post-5539 product type-product status-publish has-post-thumbnail product_cat-bedroom product_cat-lamp product_cat-outdoor product_tag-agota product_tag-furniture product_tag-livingroom product_tag-table first instock shipping-taxable purchasable product-type-simple">
<div class="product-wrapper style_1">

<div class="list-col4 ">
<div class="product-image">
      <a href="/product/{{ $product->slug  }}/en" title="{{ $product->name }}">
<img width="400" height="508"
src="{{ asset('storage/'.$product['images']->first()['thumbnail']) }}"class="primary_image ls-is-cached lazyloaded" alt="" loading="lazy" itemprop="image">				</a>
 <div class="item-buttons">
      <div class="button-switch">
          <p class="woocommerce @if($product->attribs) select_options @else add_to_cart_inline @endif">
              <a   @if($product->attribs) href="/product/{{ $product->slug }}/en" @else href="#" @endif 
                  class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                   data-price="{{ $product->price }}" 
                   data-quantity="1" data-product_id="{{$product->id}}" rel="nofollow"> @if($product->attribs) Select options @else Add to cart @endif</a>
          </p>
      </div>
      <div class="quickviewbtn">
          <a class="detail-link quickview"
          id="compareadd" rel="nofollow" type="submit" data-name ="{{$product->name}}" data-price="{{ $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" 
           title="add {{$product->name}} to Compare">Compare</a>
      </div>
      <div class="yith-wcwl-add-to-wishlist add-to-wishlist-5550  wishlist-fragment on-first-load" >
          <!-- ADD TO WISHLIST -->
          <div class="yith-wcwl-add-button">
              <a href="#" rel="nofollow" 
              id="wishadd" data-name ="{{$product->name}}" data-price="{{ $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" 
              class="add_to_wishlist single_add_to_wishlist" title="Add to wishlist">
                  <i class="yith-wcwl-icon fa fa-heart-o"></i>
                  <span>Add to wishlist</span>
              </a>
          </div>
      </div>
      <div class="rfq" >
          <!-- ADD TO WISHLIST -->
          <div class="rfq">
              <a href="#" rel="nofollow" 
              id="rfqadd" data-name ="{{$product->name}}" data-price="{{ $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" 
               class="add_to_wishlist single_add_to_wishlist" title="Add to RFQ">
                 
                  <span>Add to RFQ</span>
              </a>
          </div>
      </div>
  </div>
</div>
</div>
<div class="list-col8">
<div class="gridview">
<h3 class="product-name">
 <a href="/product/{{ $product->slug  }}/en" title="{{ $product->name }}">{{ $product->name}}</a>
</h3>
<div class="rating-price">
<div class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{ config('settings.currency_symbol') }}</span>{{$product->price}}</bdi></span></div>
</div>
</div>
<div class="listview">
<h3 class="product-name">
 <a href="/product/{{ $product->slug  }}/en" title="{{ $product->name }}">{{ $product->name}}</a>
</h3>
<div class="ratings"></div>
<div class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{ config('settings.currency_symbol') }}</span>{{$product->price}}</bdi></span></div>
<div class="product-desc"><p>{{ $product->description }}</p>
</div>
<div class="actions">
<ul class="add-to-links">
<li>
<p class="woocommerce add_to_cart_inline"><a href="?add-to-cart=5539" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="5539" data-product_sku="0026DF97" aria-label="Add “{{ $product->name}}” to your cart" rel="nofollow" title="Add to cart">Add to cart</a></p>							</li>

<li>

<div class="yith-wcwl-add-to-wishlist add-to-wishlist-5539  wishlist-fragment on-first-load" data-fragment-ref="5539" data-fragment-options="{&quot;base_url&quot;:&quot;&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:5539,&quot;parent_product_id&quot;:5539,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in your wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;fa-heart-o&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:&quot;after_add_to_cart&quot;,&quot;item&quot;:&quot;add_to_wishlist&quot;}">

<!-- ADD TO WISHLIST -->

<div class="yith-wcwl-add-button">
<a href="?add_to_wishlist=5539" rel="nofollow" data-product-id="5539" data-product-type="simple" data-original-product-id="5539" class="add_to_wishlist single_add_to_wishlist" data-title="Add to wishlist" title="Add to wishlist">
<i class="yith-wcwl-icon fa fa-heart-o"></i>		<span>Add to wishlist</span>
</a>
</div>
<!-- COUNT TEXT -->

</div>							</li>

</ul>
</div>
</div>
</div>
</div>
</div>
  
   @endforeach
   
                              <div class="bwp-top-bar bottom clearfix" style="display:none">
                                 <nav class="woocommerce-pagination shop-infinity" data-shop_paging="shop-infinity">
                                    <div class="woocommerce-load-more" data-paged="1">
                                       <div class="loading-filter"></div>
                                    </div>
                                 </nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </main>
            </div>
         </div>
									<div id="added"></div>
		@stop 
	@push('scripts')
	

	<script>
function quickView(product_id) {
		$(".quickview-"+product_id).addClass("loading");
		$.ajax({
			url:'/quickview',
		data:{"action":"quickviewproduct",'product_id':product_id},
		success:function(results){
			$('.bwp-quick-view').empty().html(results).addClass("active");
			$(".quickview-"+product_id).removeClass("loading");
		}
		});
	
}

</script>	

	<script src="/assets/js/addto.js"></script>
 <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/home page-template page-template-page-templates page-template-homepage page-template-page-templates/, 'archive post-type-archive post-type-archive-product theme-funio woocommerce woocommerce-page');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
@endpush