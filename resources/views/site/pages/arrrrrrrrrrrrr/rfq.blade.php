@extends('site.appar')
@section('title', 'طلب عرض سعر')
@section('content')
      <div id="content" class="site-content">

            <div class="container default-entry-header"><h1 class="entry-title simple-title">طلب عرض سعر</h1>
               <div class="breadcrumbs circle-style" itemprop="breadcrumb">
               <a href="/ar">الرئيسية</a><span> طلب عرض سعر</span></div>
            <!-- .container -->
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div id="main-content" class="main-container">
                        <div id="primary" class="content-area">
                           <div id="main" class="site-content" role="main">
                              <article id="post-17" class="post-17 page type-page status-publish hentry">
                                 <div class="entry-content clearfix">
                                    <div class="woocommerce">
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
                                       
                                       <div class="mt-4 @if($rfq_content->count() > 0) row @endif">
                                             @if($rfq_content->count() > 0)
                                          <div class="col-xl-8 col-lg-12 col-md-12 col-12">
										  
											<form class="woocommerce-cart-form" action="/rfq/update/m" method="get">
                                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                   <thead>
                                                      <tr>
                                                            <th class="product-thumbnail">المنتج</th>
                                                            <th class="product-name">&nbsp;</th>
                                                         <th class="product-quantity">الكمية</th>
                                                         <th class="product-remove">&nbsp;</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
												   @if($rfq_content->count() > 0)
												   @foreach($rfq_content as $item)
                                                      <tr class="woocommerce-cart-form__cart-item cart_item">
                                                         <td class="product-thumbnail"  data-title="product">
                                                               <a href="/product/{{$item->associatedModel->slug}}/ar">
                                                               <img width="1020" height="1020" src="{{ asset('storage/'.$item->associatedModel['images']->first()['full']) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" data-src="{{ asset('storage/'.$item->associatedModel['images']->first()['full']) }}" />
                                                               <noscript><img width="1020" height="1020" src="{{ asset('storage/'.$item->associatedModel['images']->first()['thumbnail']) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" /></noscript>
                                                            </a>
                                                         
                                                         </td>
                                                         <td class="product-name" data-title="Product">
 
                                                               <a href="/product/{{$item->associatedModel->slug}}/ar">{{$item->associatedModel->name2}}</a>	
                                           @if($item->attributes->count() > 0)
                                              @foreach($item->attributes as $key => $t)														
                                              <i class="d-block"><span>{{$key}}:</span> {{$t}}</i>
                                              @endforeach
                                           @endif												
                                                             </td>
                                                         <td class="product-quantity" data-title="Quantity">
                                                            <div class="quantity">
															   <label class="screen-reader-text" for="quantity_6033c1e18efd4"> الكمية</label>
                                                               <input
                                                                  type="number"
                                                                  id="{{$item->id}}"
                                                                  class="input-text qty text"
                                                                  step="1"
                                                                  min="1"
                                                                  max="{{$item->associatedModel->quantity}}"
                                                                  name="qty[]"
                                                                  value="{{$item->quantity}}"
                                                                  title="Qty"
                                                                  size="4"
                                                                  placeholder=""
                                                                  inputmode="numeric" />
																   <input
                                                                  type="hidden"
                                                                  name="id[]"
                                                                  value="{{$item->id}}" />	
                                                            </div>
                                                         </td>
                                                         
                                                         <td class="product-remove">
                                                            <a href="{{ route('rfq.delete' , $item->id) }}" class="remove" aria-label="Remove this item">&times;</a>								
                                                         </td>
                                                      </tr>
                                                      @endforeach
													  
																</form>
                                                         <td colspan="6" class="actions">
                                                               <div class="coupon row">
                                                                     <div class="col-6 header rfq mr-5">
                                                                           <div class="search-switcher hidden-sm hidden-xs">
                                                      
                                                                                 <span class="search-opener"><i style="cursor:pointer" class="single_add_to_cart_button button">اضافة منتجات </i></span>
                                                                                 
                                                               <form role="search" method="get" class="search-form-container" action="#" style="z-index:9999">
                                                                  <div class="popup-overlay"></div>
                                                                  <div class="search-content-popup">
                                                                     <a class="close-popup" href="javascript:void(0)"><i class="fa fa-close" onClick="window.location.reload()"></i></a>
                                                                     <h3>بحث</h3>
                                                                           <div class="categories-list">
                                                                        <ul class="items-list">
                                                                           <li class="cat-item selected"><a href="javascript:void(0)" data-slug="">كل التصنيفات</a></li>
                                                                           @foreach($cats as $cat)
                                                                           @if(!$loop->first)
                                                                                       <li class="cat-item"><a data-slug="{{ $cat->slug }}" href="javascript:void(0)">{{ $cat->name2 }}</a></li>
                                                                                       @endif
                                                                                       @endforeach
                                                                                    </ul>
                                                                     </div>
                                                                           <div class="field-container agota-autocomplete-search-wrap">
                                                                        <input type="search" autocomplete="off" id="woocommerce-product-search-field-ByEqK" class="search-field" placeholder="Search Products…" value="" name="s" title="Search for:">
                                                                        <input type="submit" class="btn-search" value="Search"><i class="icon-search"></i>
                                                                                 <div class="agota-autocomplete-search-results" style="display: none;"></div>
                                                                        <div class="agota-autocomplete-search-loading">
                                                                           <img loading="lazy" class=" lazy " style="max-width: 30px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://demo.lion-themes.net/agota/wp-content/themes/agota/images/loading.gif" alt="Loading">
                                                                        </div>
                                                                              </div>
                                                                  </div>
                                                               </form>											</div>
                                                            </div>
                                                
                                                <button type="submit" class="button" name="update_cart" value="Update cart">تحديث </button>
                                                               </div>
                                                            
                                                            
                                                         </td>
													
													  @endif
                                                   </tbody>
                                                </table>
                                          </div>
										  
                                          <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                                             <div class="cart-collaterals">
                                                <div class="cart_totals ">
                                                   
                                                   <div cellspacing="0" class="shop_table shop_table_responsive">
                                                     
									   @if($rfq_content->count() > 0)
                                                   <div class="wc-proceed-to-checkout mt-5">
                                                      <a href="/rfq/details/ar" class="checkout-button button alt wc-forward">
                                                     اكمل لمعلومات الاتصال</a>
                                                   </div>
										  @endif
                                                </div>
                                             </div>
                                          </div>
                                          @else
                                          <h3 class="text-center">فارغ</h3>
                                       <div class="header rfq">
                                          <div class="search-switcher hidden-sm hidden-xs">
							
                                                <span class="search-opener"><i style="cursor:pointer" class="single_add_to_cart_button button">اضافة منتج</i></span>
                                                
                              <form role="search" method="get" class="search-form-container" action="#" style="z-index:9999">
                                 <div class="popup-overlay"></div>
                                 <div class="search-content-popup">
                                    <a class="close-popup" href="javascript:void(0)"><i class="fa fa-close" onClick="window.location.reload()"></i></a>
                                    <h3>Searching</h3>
                                          <div class="categories-list">
                                       <ul class="items-list" id="rfqcats">
                                          <li class="cat-item selected">
                                             <a href="javascript:void(0)" data-slug="">كل التصنيفات</a></li>
                                          @foreach($cats as $cat)
                                          @if(!$loop->first)
                                                      <li class="cat-item"><a data-slug="{{ $cat->slug }}" href="javascript:void(0)">{{ $cat->name2 }}</a></li>
                                                      @endif
                                                      @endforeach
                                                   </ul>
                                       <input type="hidden" name="cat" id="catslugrfq" class="search-cat-field rfq" value=""> 
                                    </div>
                                          <div class="field-container agota-autocomplete-search-wrap">
                                       <input type="search" autocomplete="off" id="woocommerce-product-search-field-ByEqK" class="search-field" placeholder="Search Products…" value="" name="s" title="Search for:">
                                       <input type="submit" class="btn-search" value="Search"><i class="icon-search"></i>
                                                <div class="agota-autocomplete-search-results" style="display: none;"></div>
                                       <div class="agota-autocomplete-search-loading">
                                          <img loading="lazy" class=" lazy " style="max-width: 30px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://demo.lion-themes.net/agota/wp-content/themes/agota/images/loading.gif" alt="Loading">
                                       </div>
                                             </div>
                                 </div>
                              </form>											</div>
                           </div>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <!-- .entry-content -->
                              </article>
                              <!-- #post-## -->					
                           </div>
                           <!-- #content -->
                        </div>
                        <!-- #primary -->
                     </div>
                     <!-- #main-content -->
                  </div>
               </div>
            </div>
         </div>
		 
@stop
@push('scripts')

     
	 <script> 
         function addToRfq(id) {
            var _me_result = $(".agota-autocomplete-search-results");
            var quantity = 1 ;
			var productId = id ;
            $.ajax({
               url:'/rfq/add/item',
            data:{"action":"addtoRFQ",'quantity':quantity, 'productId':productId},
            success:function(results){
               $(".fa.fa-plus.rfqplus"+id).removeClass('fa-plus').addClass('fa-check');
               _me_result.show();
            }
            });
            
         
      }	
      </script> 
<style>body .header .search-switcher .search-form-container .search-content-popup{padding:0 !important}</style>
	  @endpush