@extends('site.app')
@section('title', 'Shopping Cart')
@section('content')
      <div id="bwp-main" class="bwp-main">
            <div data-bg_default ="" class="page-title bwp-title empty-image" >
               <div class="container" >
                  <div class="content-title-heading">
                     <span class="back-to-shop">Shop</span>
                     <h1 class="text-title-heading">
                        Order Tracking		
                     </h1>
                  </div>
                  <!-- Page Title -->
                  <div id="breadcrumb" class="breadcrumb">
                     <div class="bwp-breadcrumb"><a href="/">Home</a> <span class="delimiter"></span> <span class="current">Cart</span> </div>
                  </div>
               </div>
            </div>
			
         <div id="bwp-main" class="bwp-main">
            <div data-bg_default ="" class="page-title bwp-title empty-image" >
               <div class="container" >
                  <div class="content-title-heading">
                     <span class="back-to-shop">Shop</span>
                     <h1 class="text-title-heading"> Order Tracking</h1>
                  </div>
                  <div id="breadcrumb" class="breadcrumb">
                     <div class="bwp-breadcrumb"><a href="/">Home</a> <span class="delimiter"></span> <span class="current">Order Tracking</span></div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div id="main-content" class="main-content">
                        <div id="primary" class="content-area">
                           <div id="content" class="site-content" role="main">
                              <article id="post-14932" class="post-14932 page type-page status-publish hentry">
                                 <div class="entry-content clearfix">
                                    <div class="woocommerce">
                                          @if(\Session::has('error'))
                                          <ul class="woocommerce-error" role="alert">
                                             <li> Sorry, the order could not be found. Please contact us if you are having difficulty finding your order details.</li>
                                          </ul>
                                          @endif
                                       <div class="woocommerce-page-header">
                                          <ul>
                                             <li class="shopping-cart-link"> <a href="/cart/">Shopping Cart<span class="cart-count">({{$cart_content->count()}})</span></a></li>
                                             <li class="checkout-link"><a href="/checkout/">Checkout</a></li>
                                             <li class="order-tracking-link active"><a href="#">Order Tracking</a></li>
                                          </ul>
                                       </div>
                                       <form action="/order-tracking/show" method="post" class="woocommerce-form woocommerce-form-track-order track_order">@csrf
                                          <p>To track your order please enter your Order ID in the box below and press the &quot;Track&quot; button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                          <p class="form-row form-row-first"><label for="orderid">Order ID</label> <input class="input-text" type="text" name="orderid" id="orderid" value="" placeholder="Found in your order confirmation email." /></p>
                                          
                                          <div class="clear"></div>
                                          <p class="form-row"><button type="submit" class="button" name="track" value="Track">Track</button></p>
                                          <input type="hidden" id="woocommerce-order-tracking-nonce" name="woocommerce-order-tracking-nonce" value="567136c692" /><input type="hidden" name="_wp_http_referer" value="/wordpress/funio/order-tracking/" />
                                       </form>
                                    </div>
                                 </div>
                              </article>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         </div>
		 
@stop
@push('scripts')

     
	 <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/home page-template page-template-page-templates page-template-homepage page-template-page-templateshomepage-php elementor-page/, 'woocommerce-cart cart');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
	  @endpush