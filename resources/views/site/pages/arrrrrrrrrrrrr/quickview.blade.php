<div id="quickview-container-16546">
      <div class="quickview-container woocommerce">
         <a href="#" class="quickview-close" ></a> 
         <div class="woocommerce-notices-wrapper"></div>
         <div itemscope itemtype="http://schema.org/Product" id="product-{{ $product->id }}" class="product single-product post-16546 type-product status-publish has-post-thumbnail product_brand-brand-6 product_cat-living-room product_tag-hot product_tag-trend first instock sale shipping-taxable purchasable product-type-simple">
            <div class="product_detail">
               <div class="row">
                  <div class="img-quickview">
                     <div class="slider_img_productd">
                        <div id="quickview-slick-carousel">
                           <div class="col-sm-12">
                              <div class="image-additional slick-carousel" data-dots="true" data-nav="true" data-focusonselect="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1">
                                 <div data-thumb="{{ asset('storage/'.$product['images']->first()['full']) }}" class="img-thumbnail woocommerce-product-gallery__image"> <a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-2.jpg"><img width="1200" height="1200" src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-2.jpg" class="attachment-shop_single size-shop_single wp-post-image" alt="" loading="lazy" id="image" title="" data-src="https://wpbingosite.com/wordpress/funio/wp-content/uploads/2020/12/Image-2.jpg" data-large_image="{{ asset('storage/'.$product['images']->first()['full']) }}" data-large_image_width="1200" data-large_image_height="1200" /></a> </div>
                                 @if($product->images->count() > 0)
                                 @foreach($product->images as $primage)
                                 <div class="img-thumbnail">
                                    <div class="item-additional" title=""><img width="1200" height="1200" src="{{ asset('storage/'. $primage['full']) }}" class="attachment-shop_single size-shop_single" alt="Image-3" loading="lazy" title="Image-3" /></div>
                                 </div>
                                 @endforeach
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="bwp-single-info">
                     <div class="content_product_detail entry-summary">                    
                        <h1 itemprop="name" class="product_title entry-title">{{$product->name}} </h1>
                        <div class="price-single">
                           <div class="price">
                                 @if($product->sale_price > 0)
                                 <del><span class="woocommerce-Price-amount amount">
                                 <bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$product->price / $currencyRate, 2, '.', '')}}</bdi>
                                 </span></del>
                                 <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$product->sale_price / $currencyRate, 2, '.', '')}}</bdi></span></ins></span>
                                 @else
                                  <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$product->price / $currencyRate, 2, '.', '')}}</bdi></span></ins></span>
                                  @endif
                           </div> 
                            @if($product->sale_price > 0)
                           <div class="product-lable">
                              <div class="onsale rrtl">{{round((($product->price - $product->sale_price)*100) /$product->price )}}%-</div>
                           </div>
                        @endif
                        </div>
                        <div itemprop="description" class="description">
                           <p>{{ strip_tags(str_limit($product->description,350))}}</p>
                        </div>
                        @if($product->attributes->count() < 1 && $product->quantity > 0 )
                        <form class="cart" method="post" enctype='multipart/form-data' action="/product/add/cart">@csrf
                           <input type="hidden" name="productId" value="{{ $product->id }}" />
                           <input type="hidden" name="price" value="{{  $product->sale_price > 0 ? $product->sale_price : $product->price }}" />
                            <div class="quantity-button">
                               <div class="quantity"> <button type="button" class="plus">+</button> <label class="screen-reader-text" for="quantity_602fc5071d18a">Alvarado Sideboard quantity</label> <input type="number" id="quantity_602fc5071d18a" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" /> <button type="button" class="minus">-</button> </div>
                               <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button> 
                            </div>
                         </form>
                        @else
                        <a rel="nofollow" href="/product/{{$product->slug}}/en" class="button product_type_variable add_to_cart_button">Select Options</a>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            <!-- .summary --> 
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
   <script type='text/javascript' id='funio-script-js-after'>jQuery(function($){"use strict";$(document).on("click",".plus, .minus",function(){var t=$(this).closest(".quantity").find(".qty"),a=parseFloat(t.val()),n=parseFloat(t.attr("max")),s=parseFloat(t.attr("min")),e=t.attr("step");a&&""!==a&&"NaN"!==a||(a=0),(""===n||"NaN"===n)&&(n=""),(""===s||"NaN"===s)&&(s=0),("any"===e||""===e||void 0===e||"NaN"===parseFloat(e))&&(e=1),$(this).is(".plus")?t.val(n&&(n==a||a>n)?n:a+parseFloat(e)):s&&(s==a||s>a)?t.val(s):a>0&&t.val(a-parseFloat(e)),t.trigger("change")})});</script>
   <script  src="/assets/js/product.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js" integrity="sha512-An4a3FEMyR5BbO9CRQQqgsBscxjM7uNNmccUSESNVtWn53EWx5B9oO7RVnPvPG6EcYcYPp0Gv3i/QQ4KUzB5WA==" crossorigin="anonymous"></script>
   <script>
   
   
            $("#quickview-slick-carousel .slick-carousel").slick({
               dots: true ,
               arrows: true ,
            });
            $('.quickview-close').on("click",function(e){
               e.preventDefault();
               $('.bwp-quick-view').empty().removeClass("active");});

            $('#addToCart').submit(function (e) {
		$(this).addClass("loading");
    });
   </script>