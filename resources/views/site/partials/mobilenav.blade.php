
<div class="quickview-wrapper">
<div class="overlay-bg" onclick="hideQuickView()"><div class="lds-ripple"><div></div><div></div></div></div> 
<div class="quick-modal">
<span class="closeqv"><i class="fa fa-close"></i></span>
<div id="quickview-content"></div><div class="clearfix"></div>
</div>
</div>
<div class="mobile-menu-overlay"></div>
<div class="mobile-navigation hidden-md hidden-lg">
<div id="close-menu-moblie"><a href="#"><i class="fa fa-close"></i></a></div>
<form role="search" method="get" class="search-form-container" action="#">
<div class="popup-overlay"></div>
<div class="search-content-popup">
<a class="close-popup" href="javascript:void(0)"><i class="fa fa-close"></i></a>
<h3>Searching</h3>
<div class="categories-list">
<input type="hidden" name="cat" class="search-cat-field" value="" /> 
</div>
<div class="field-container agota-autocomplete-search-wrap">
<input type="search" autocomplete="off" id="woocommerce-product-search-field-0F56f" class="search-field" placeholder="Search Products&hellip;" value="" name="s" title="Search for:" />
<input type="submit" class="btn-search" value="Search" /><i class="icon-search"></i>
<div class="agota-autocomplete-search-results"></div>
<div class="agota-autocomplete-search-loading">
<img style="max-width: 30px;" src="https://demo.lion-themes.net/agota/wp-content/themes/agota/images/loading.gif" alt="Loading"/>
</div>
</div>
<input type="hidden" name="post_type" value="product" />
</div>
</form>	
<div class="mobile-menu-container">
    <ul id="menu-main-menu" class="nav-menu mobile-menu">
        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor  menu-item-6939 active">
            <a href="/" aria-current="page">Home</a>

</li>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5355 dropdown"><a href="#/">Products</a>
    <ul class="sub-menu">
        
@foreach($categories as $cat)
@foreach($cat->items as $category)
        <li class="menu-item menu-item-type-custom menu-item-object-custom @if ($category->items->count() > 0) menu-item-has-children dropdown @endif menu-item-5934 ">
			<a href="{{ route('category.show2', $category->slug) }}/en">{{$category->name}}</a>
			@if ($category->items->count() > 0)
			<ul class="sub-menu">					
				@foreach($category->items as $item)
				<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5938">
					<a href="{{ route('category.show2', $item->slug) }}/en">{{$item->name}}</a></li>
				@endforeach
			</ul>
		@endif
        </li>
        @endforeach
        @endforeach
    </ul>
</li>

<li class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-5353 dropdown"><a href="#/blog/">Falcon</a>
	<ul class="sub-menu">
	@foreach($top_menu as $page)
	<li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="{{ route('page.show' , $page->slug)}}/en">{{$page->name}}</a></li>
	@endforeach
	<li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="#">Media</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="#">Blogs & News</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="#">Catalogs</a></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="/contact/en">Contact</a></li>
	</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor  menu-item-6939 active">
		<a href="ar" aria-current="page">Arabic</a>

</li>
</ul></div>
<div class="my-account-link">							
<a href="/login" title="">Login / Register<i class="fa fa-user-o"></i></a>
</div>	
<div class="wishlist-link">
<a href="/wishlist/">
Wishlist<i class="fa fa-heart-o"></i>
</a>
</div>
</div>

<div class="cart-side-content">
<div class="cart-side-backdrop toggle-cartside"></div>
<div class="cart-widget-content"><div class="widget woocommerce widget_shopping_cart">
    <h2 class="widgettitle"><span>Your Cart</span><a href="javascript:void(0)" class="toggle-cartside"><i class="fa fa-times"></i></a></h2>
    <div class="widget_shopping_cart_content">
        	<div class="minicart-list">
					<ul class="woocommerce-mini-cart cart_list product_list_widget ">
							@foreach($cart_content as $item)
						<li class="woocommerce-mini-cart-item mini_cart_item">
					<a href="{{ route('checkout.cart.remove', $item->id)}}"
					class="remove remove_from_cart_button">×</a>
						<a href="/product/{{ $item->associatedModel->slug }}/en">
							<img width="400" height="508"
								src="{{ asset('storage/'.$item->associatedModel['images']->first()['thumbnail']) }}" 
								class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy"
								>{{ $item->name }}
							</a>
						<span class="quantity">{{$item->quantity}} × <span class="woocommerce-Price-amount amount"><bdi>
							<span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ $item->price }}</bdi></span></span>
											</li>@endforeach
					</ul>
					</div>
					
		<div class="minicart-bottom">
				<p class="woocommerce-mini-cart__total total"><strong>Total:</strong>
					 <span class="woocommerce-Price-amount amount"><bdi>
						 <span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{$cart_total}}</bdi></span></p>
						
				
				<p class="woocommerce-mini-cart__buttons buttons"><a href="/cart/en" class="button wc-forward">View cart</a>
					<a href="/checkout/en" class="button checkout wc-forward">Checkout</a></p>
			</div>
        </div>
    </div></div><ul class="side-sticky-icons">
	<li><a href="/login"><span class="icon-user icons"></span></a></li><li class="quick-wishlist"><a href="#/wishlist/"><span class="badge">0</span><span class="icon-star icons"></span></a></li><li class="quick-compare"><a class="yith-woocompare-open" href="javascript:void(0)"><span class="badge">0</span><span class="icon-layers icons"></span></a></li><li class="quick-cart"><a class="toggle-cartside" href="javascript:void(0)"><span class="badge">0</span><span class="icon-handbag icons"></span></a></li></ul></div>
	
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
				<button class="pswp__button pswp__button--share" aria-label="Share"></button>
				<button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button>
				<button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div>
			<button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
			<button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button>
			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>
		</div>
	</div>
</div>