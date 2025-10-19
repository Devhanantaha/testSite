@extends('site.app')
@section('title', 'Checkout')
@section('content')

         <div id="content" class="site-content">
            <div data-bg_default ="" class="page-title bwp-title empty-image" >
               <div class="container default-entry-header" >
                     <h1 class="entry-title simple-title">
                        My Account		
                     </h1>
                  </div>
                  <!-- Page Title -->
                  <div class="breadcrumbs circle-style">
                     <div class="bwp-breadcrumb">
                        <a href="/">Home</a>
                         <span class="delimiter"></span>
                          <span class="current">My Account</span> </div>
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
                                             <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                                                <a href="#4">Dashboard</a>
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
                                          </ul>
                                       </nav>
                                       <div class="col-xs-12 col-md-9 myaccount-content">
                                          <div class="woocommerce-notices-wrapper"></div>
                                          <p>
                                             Hello <strong>{{\Auth::user()->first_name}}</strong> 
                                          </p>
                                          <p>
                                             From your account dashboard you can view your <a href="/my-account/orders/">recent orders</a>, manage your <a href="/my-account/address/show">shipping and billing addresses</a>, and <a href="/my-account/edit-account/">edit your password and account details</a>.
                                          </p>
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
         t = c.replace(/page-template-page-template-absolute-header/, 'my-account');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 

@endpush