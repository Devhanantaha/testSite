@extends('site.app')
@section('title', 'Shopping Cart')
@section('content')
      <div id="bwp-main" class="bwp-main">
            <div data-bg_default ="" class="page-title bwp-title empty-image" >
               <div class="container" >
                  <div class="content-title-heading">
                     <span class="back-to-shop">Shop</span>
                     <h1 class="text-title-heading">
                        Cart		
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
                                       <p class="order-info"> Order #<mark class="order-number">{{$order->order_number}}</mark> was placed on <mark class="order-date"> {{ $order->created_at->toFormattedDateString() }}</mark> and is currently <mark class="order-status"> {{ $order->status }}</mark>.</p>
                                       <section class="woocommerce-order-details">
                                          <h2 class="woocommerce-order-details__title">Order details</h2>
                                          <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                             <thead>
                                                <tr>
                                                   <th class="woocommerce-table__product-name product-name">Product</th>
                                                   <th class="woocommerce-table__product-table product-total">Total</th>
                                                </tr>
                                             </thead>
                                             <tbody>
											  @foreach($order->items as $item)
                                                <tr class="woocommerce-table__line-item order_item">
                                                   <td class="woocommerce-table__product-name product-name"> <a href="https://wpbingosite.com/wordpress/funio/shop/zames-plastic-side-chair/?attribute_pa_size=m&attribute_pa_color=blue">{{ $item->product->name }} </a> <strong class="product-quantity">&times;&nbsp; {{ $item->quantity }}</strong></td>
                                                   <td class="woocommerce-table__product-total product-total"> <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{ config('settings.currency_symbol') }}</span>{{ round($item->price, 2) }}</bdi></span></td>
                                                </tr>
												@endforeach
                                             </tbody>
                                             <tfoot>
                                                <tr>
                                                   <th scope="row">Subtotal:</th>
                                                   <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>{{ round($order->grand_total, 2) }}</span></td>
                                                </tr>
                                                <tr>
                                                   <th scope="row">Total:</th>
                                                   <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#036;</span>{{ round($order->grand_total, 2) }}</span></td>
                                                </tr>
                                             </tfoot>
                                          </table>
                                       </section>
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