

@extends('site.app')
@section('title', $category->name)
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
</style>
<div id="bwp-main" class="bwp-main" style="
    margin-top: 80px;
">
            <div data-bg_default ="" class="page-title bwp-title empty-image" >
               <div class="container" >
                  <div class="content-title-heading">
                     <span class="back-to-shop">{{ $category->name }}</span>
                     <h1 class="text-title-heading"> {{ $category->name }}</h1>
                  </div>
                  <div class="breadcrumb" >
				  <a href="/">Home</a>
				  <span class="delimiter"></span>Products
				  <span class="delimiter"></span>{{ $category->name }}
				  </div>
                  <div class="woocommerce-product-subcategorie-content">
                     <div class="subcategorie-content">
                        <ul class="woocommerce-product-subcategories   slick-carousel image_categories" data-nav="true" data-columns4="1" data-columns3="2" data-columns2="3" data-columns1="4" data-columns="5">
						
									@foreach($categories as $cat)
										@foreach($cat->items as $item)
						
                           <li data-id_category="387" class="product-category product @if($item->slug == $category->slug ) active @endif">
                              <a href="{{ route('category.show2', $item->slug) }}">
                                 <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="Armchairs" data-lazy-src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/4-2.jpg"/>
                                 <noscript><img src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/4-2.jpg" alt="Armchairs"/></noscript>
                              </a>
                              <div class="woocommerce-loop-category">
                                 <h2 class="woocommerce-loop-category__title"> <a href="{{ route('category.show2', $item->slug) }}">{{ $item->name }}</a></h2>
                              </div>
                           </li>
						   @endforeach
						   @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div id="primary" class="content-area">
               <main id="main" class="site-main" role="main">
                  <div class="sidebar  shop-layout-full">
                     <div class="container">
                        <div class="main-archive-product row">
                           <div class="bwp-sidebar sidebar-product col-xl-3 col-lg-3 col-md-12 col-12">
                              <div class="button-filter-toggle hidden-lg hidden-md"> Close</div>
                              <aside id="bwp_ajax_filte-6" class="widget bwp_ajax_filte">
                                 <div id="bwp_filter_ajax20217441411613391776" class="bwp-woocommerce-filter-product">
                                    <div  class="bwp-filter-ajax">
                                       <form id="bwp_form_filter_product">
                                          <div class="bwp-filter bwp-filter-category">
                                             <h3>Categories</h3>
                                             <div id="pa_category" class="filter_category_product">
                                        @foreach($category->children as $item)
                                                <div data-id_category="387" class="item-category ">
                                                   <label class="name">{{ $item->name }}</label>
                                                   <div class="count">{{ $item->products()->count() }}</div>
                                                </div>
												@endforeach
                                             </div>
                                          </div>
                                          <div class="bwp-filter-price">
                                             <h3>Price</h3>
                                             <div class="content-filter-price">
											 
											 <input type="hidden" id="hidden_minimum_price" value="" />
											<input type="hidden" id="hidden_maximum_price" value="" />
                                                <div id="bwp_slider_price"></div>
                                                <div class="price-input"> <span>Range : </span> 
												<span class="input-text text-price-filter" id="text-price-filter-min-text">21 - 350</span> 
                                                </div>
                                             </div>
                                          </div>
										  @foreach( $category->attributes as $attribute)
                                          <div class="bwp-filter bwp-filter-color">
                                             <h3>{{ $attribute->name }}</h3>
                                             <ul id="pa_color">
											 @foreach($attribute->values as $attributeValue)
                                        @if ($attributeValue->attribute_id == $attribute->id)
                                                <li class="filter_color blue"> <span > <input value="{{$attributeValue->value}}" class="common_selector {{ $attribute->code }}"  type="checkbox" > </span><label class="count">{{ $attributeValue->value }}<mark>1</mark></label></li>
												  @endif
                                    @endforeach
                                                </ul>
                                          </div>
										  @endforeach
                                       </form>
                                    </div>
                                 </div>
                              </aside>
                              <aside id="bwp_feature_product_widget-2" class="widget bwp_feature_product_widget">
                                 <div class="bwp-widget-feature-product">
                                    <h3 class="widget-title">Feature Product</h3>
                                    <div class="block_content">
                                       <ul class="content-products">
                                          <li class="item-product">
                                             <div class="item-thumb">
                                                <a href="#">
                                                   <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="" data-lazy-src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-21.jpg" />
                                                   <noscript><img src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-21.jpg" alt="" /></noscript>
                                                </a>
                                             </div>
                                             <div class="content-bottom">
                                                <div class="rating none">
                                                   <div class="star-rating none"></div>
                                                </div>
                                                <div class="item-title"> <a href="#">Cole Lounge Chair</a></div>
                                                <div class="price"> <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>130.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>125.00</bdi></span></ins></div>
                                             </div>
                                          </li>
                                          <li class="item-product">
                                             <div class="item-thumb">
                                                <a href="https://wpbingosite.com/wordpress/funio/shop/copeland-furniture-audrey/">
                                                   <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="" data-lazy-src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-26.jpg" />
                                                   <noscript><img src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-26.jpg" alt="" /></noscript>
                                                </a>
                                             </div>
                                             <div class="content-bottom">
                                                <div class="rating none">
                                                   <div class="star-rating none"></div>
                                                </div>
                                                <div class="item-title"> <a href="https://wpbingosite.com/wordpress/funio/shop/copeland-furniture-audrey/">Copeland Furniture Audrey</a></div>
                                                <div class="price"> <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>100.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>90.00</bdi></span></ins></div>
                                             </div>
                                          </li>
                                          <li class="item-product">
                                             <div class="item-thumb">
                                                <a href="https://wpbingosite.com/wordpress/funio/shop/della-chair-navy/">
                                                   <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="" data-lazy-src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-30.jpg" />
                                                   <noscript><img src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-30.jpg" alt="" /></noscript>
                                                </a>
                                             </div>
                                             <div class="content-bottom">
                                                <div class="rating none">
                                                   <div class="star-rating none"></div>
                                                </div>
                                                <div class="item-title"> <a href="https://wpbingosite.com/wordpress/funio/shop/della-chair-navy/">Della Chair - Navy</a></div>
                                                <div class="price"> <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>100.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>90.00</bdi></span></ins></div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </aside>
                           </div>
                           <div class="col-xl-9 col-lg-9 col-md-12 col-12" >
                              <div class="bwp-top-bar top clearfix">
                                 <div class="woocommerce-notices-wrapper"></div>
                                 <a class="button-filter-toggle"></a>
                                 <div class="woocommerce-ordering pwb-dropdown dropdown">
                                    <span class="pwb-dropdown-toggle dropdown-toggle" data-toggle="dropdown">Default sorting</span>
                                    <ul class="pwb-dropdown-menu dropdown-menu">
                                       <li data-value="menu_order"  class="active"  ><a href="?shop-layout=full&orderby=menu_order">Default sorting</a></li>
                                       <li data-value="popularity"  ><a href="?shop-layout=full&orderby=popularity">Sort by popularity</a></li>
                                       <li data-value="rating"  ><a href="?shop-layout=full&orderby=rating">Sort by average rating</a></li>
                                       <li data-value="date"  ><a href="?shop-layout=full&orderby=date">Sort by latest</a></li>
                                       <li data-value="price"  ><a href="?shop-layout=full&orderby=price">Sort by price: low to high</a></li>
                                       <li data-value="price-desc"  ><a href="?shop-layout=full&orderby=price-desc">Sort by price: high to low</a></li>
                                    </ul>
                                 </div>
                                 <ul class="display hidden-sm hidden-xs">
                                    <li> <a data-col="col-xl-6 col-lg-6 col-md-6 col-6" class="view-grid two " href="?shop-layout=full&category-view-mode=grid&product_col_large=2"><span class="icon-column"><span class="layer first"><span></span><span></span></span><span class="layer middle"><span></span><span></span></span><span class="layer last"><span></span><span></span></span></span></a></li>
                                    <li> <a data-col="col-xl-4 col-lg-6 col-md-6 col-6" class="view-grid three active" href="?shop-layout=full&category-view-mode=grid&product_col_large=3"><span class="icon-column"><span class="layer first"><span></span><span></span><span></span></span><span class="layer middle"><span></span><span></span><span></span></span><span class="layer last"><span></span><span></span><span></span></span></span></a></li>
                                    <li> <a data-col="col-xl-3 col-lg-6 col-md-6 col-6" class="view-grid four " href="?shop-layout=full&category-view-mode=grid&product_col_large=4"><span class="icon-column"><span class="layer first"><span></span><span></span><span></span><span></span></span><span class="layer middle"><span></span><span></span><span></span><span></span></span><span class="layer last"><span></span><span></span><span></span><span></span></span></span></a></li>
                                    <li> <a class="view-list " href="?shop-layout=full&category-view-mode=list"><span class="icon-column"><span class="layer first"><span></span><span></span></span><span class="layer middle"><span></span><span></span></span><span class="layer last"><span></span><span></span></span></span></a></li>
                                 </ul>
                                 <div class="woocommerce-result-count hidden-md hidden-sm hidden-xs"> Showing 1&ndash;12 of 29 item(s)</div>
                                 <div class="woocommerce-filter-title"></div>
                              </div>
                              <div class="content-products-list">
                                 <ul id="results" class="products products-list row grid" data-col="col-lg-4 col-md-6 col-sm-6 col-6">
								 
                                 </ul>
                              </div>
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
		 @stop
	@push('scripts')
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
	<script>
   var SITEURL = "/category2/{{ $category->slug }}";
   var page = 1; //track user scroll as page number, right now page number is 1
   load_more(page); //initial content load
   $(window).scroll(function() { //detect page scroll
      if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
      page++; //page number increment
      load_more(page); //load content   
      }
    });     
    function load_more(page){
        $.ajax({
           url: SITEURL + "?page=" + page,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
              $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
            console.log(data.length);
            //notify user if nothing to load
            $('.ajax-loading').html("No more records!");
            return;
          }
          $('.ajax-loading').hide(); //hide loading animation once data is received
          $("#results").append(data); //append data into #results element          
           console.log('data.length');
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    };
</script>

@endpush