@extends('site.app')
@section('title', 'Checkout')
@section('content')


            
<div id="content" class="site-content">
      <div data-bg_default ="" class="page-title bwp-title empty-image" >
         <div class="container default-entry-header" >
               <h1 class="entry-title simple-title">
                     Account Details
               </h1>
            </div>
            <!-- Page Title -->
            <div class="breadcrumbs circle-style">
               <div class="bwp-breadcrumb">
                  <a href="/my-account">My Account </a>
                   <span class="delimiter"></span>
                    <span class="current">  Account Details</span> </div>
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
    <form class="woocommerce-EditAccountForm edit-account" action="/update/user/{{ \Auth::user()->id }}" method="post">@csrf
    
        
        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
            <label for="first_name">First name&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="first_name" id="account_first_name" autocomplete="given-name" value="{{ \Auth::user()->first_name }}">
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
            <label for="account_last_name">Last name&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="last_name" id="account_last_name" autocomplete="family-name" value="{{ \Auth::user()->last_name }}">
        </p>
        <div class="clear"></div>
    
    
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="email_address">Email address&nbsp;<span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="account_email" autocomplete="email" value="{{ \Auth::user()->email }}">
        </p>
    
        <fieldset>
            <legend>Password change</legend>
    
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_1">New password (leave blank to leave unchanged)</label>
 
                   <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password" id="password_1" autocomplete="off">
                   <span class="show-password-input">
                      </span>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_2">Confirm new password</label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password" id="password_2" autocomplete="off"><span class="show-password-input"></span>
            </p>
        </fieldset>
        <div class="clear"></div>
    
        
        <p>
            <input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce" value="42681496bd"><input type="hidden" name="_wp_http_referer" value="/wordpress/funio/my-account/edit-account/">		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
            <input type="hidden" name="action" value="save_account_details">
        </p>
    
        </form>
    
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