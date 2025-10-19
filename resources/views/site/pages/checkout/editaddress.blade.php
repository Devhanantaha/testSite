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
                                    <div class="woocommerce">
                                       <nav class="woocommerce-MyAccount-navigation">
                                          <ul>
                                             <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                                                <a href="/my-account/">Dashboard</a>
                                             </li>
                                             <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                                <a href="/my-account/orders">Orders</a>
                                             </li>
                                             <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                                <a href="/my-account/address/show">Addresses</a>
                                             </li>
                                             <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                                <a href="/my-account/account/show">Account details</a>
                                             </li>
                                             <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                                <a href="/logout">Logout</a>
                                             </li>
                                          </ul>
                                       </nav>
                                       <div class="woocommerce-MyAccount-content">
	<div class="woocommerce-notices-wrapper"></div>
	
<p>
	The following addresses will be used on the checkout page by default.</p>

	<div class="u-columns woocommerce-Addresses col2-set addresses">

	
	<div class="u-column1 col-1 woocommerce-Address">
		<header class="woocommerce-Address-title title">
			<h3>Billing address</h3>
			<a href="/my-account/edit-address/billing/" class="edit">Add</a>
		</header>
		<address>
			You have not set up this type of address yet.		</address>
	</div>

	
	<div class="u-column2 col-2 woocommerce-Address">
		<header class="woocommerce-Address-title title">
			<h3>Shipping address</h3>
			<a href="/my-account/edit-address/shipping/" class="edit">Edit</a>
		</header>
		<address>
			EIT<br>Karim Malak<br>90 Makram<br>11231 mali<br>Denmark		</address>
	</div>


	</div>
	
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

      <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/home page-template page-template-page-templates page-template-homepage page-template-page-templateshomepage-php elementor-page/, 'woocommerce-account my-account');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 

@endpush