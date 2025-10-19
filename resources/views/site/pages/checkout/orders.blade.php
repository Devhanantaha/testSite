@extends('site.app')
@section('title', 'Checkout')
@section('content')

        
<div id="content" class="site-content">
      <div data-bg_default ="" class="page-title bwp-title empty-image" >
         <div class="container default-entry-header" >
               <h1 class="entry-title simple-title">
                 My Orders		
               </h1>
            </div>
            <!-- Page Title -->
            <div class="breadcrumbs circle-style">
               <div class="bwp-breadcrumb">
                  <a href="/my-account">My Account </a>
                   <span class="delimiter"></span>
                    <span class="current">Orders</span> </div>
            </div>
         </div>
      </div>
            <!-- .container -->
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div id="main-content" class="main-content">
                        <div id="primary" class="content-area">
                           <div id="content" class="site-content" role="main">
                              <article id="post-19" class="post-19 page type-page status-publish hentry">
                                 <div class="entry-content clearfix">
                                    <div class="row">
                                          <nav class="col-xs-12 col-md-3 myaccount-navigation">
                                             <ul class="nav">
                                                <li >
                                                   <a href="#4">Dashboard</a>
                                                </li>
                                                <li class="is-active">
                                                   <a href="/my-account/orders">Orders</a>
                                                </li>
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                                   <a href="/my-account/address/show">Addresses</a>
                                                </li>
                                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                                   <a href="/my-account/account/show">Account details</a>
                                                </li>
                                             </ul>
                                          </nav>
									   @if(\Auth::user()->orders->count() < 1 )
                              <div class="col-xs-12 col-md-9 myaccount-content">
										<div class="woocommerce-notices-wrapper"></div>
										<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
											
											No order has been made yet.	</div>

									</div>
									@else
									
                           <div class="col-xs-12 col-md-9 myaccount-content">
									<div class="woocommerce-notices-wrapper"></div>

									<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
									<thead>
									<tr>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Order</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Date</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Status</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">Total</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">Actions</span></th>
									</tr>
									</thead>

									<tbody>
									 @foreach(\Auth::user()->orders as $userorder )
									<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
									<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
									<a href="/user/order/{{$userorder->order_number}}">
									#{{$userorder->order_number}}								</a>

									</td>
									<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
									<time datetime="2021-03-21T11:20:27+00:00">{{ $userorder->created_at->toFormattedDateString() }}</time>

									</td>
									<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
									{{ $userorder->status }}
									</td>
									<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
									<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{ config('settings.currency_symbol') }}</span>{{ round($userorder->grand_total, 2) }}</span> for {{ $userorder->items->count() }} item
									</td>
									<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
									<a href="/user/order/{{$userorder->order_number}}" class="woocommerce-button button view">View</a>													</td>
									</tr>
									
									@endforeach
									</tbody>
									</table>

									</div>
									@endif
									
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

      <script type="text/javascript">(function () {
         var c = document.body.className;
         
          t = c.replace(/page-template-page-template-absolute-header/, 'my-account');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 

@endpush