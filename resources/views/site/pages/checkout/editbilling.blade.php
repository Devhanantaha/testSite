@extends('site.app')
@section('title', 'Checkout')
@section('content')

            
<div id="content" class="site-content">
      <div data-bg_default ="" class="page-title bwp-title empty-image" >
         <div class="container default-entry-header" >
               <h1 class="entry-title simple-title">
                Edit Address	
               </h1>
            </div>
            <!-- Page Title -->
            <div class="breadcrumbs circle-style">
               <div class="bwp-breadcrumb">
                  <a href="/my-account">My Account </a>
                   <span class="delimiter"></span>
                    <span class="current"> Edit Address</span> </div>
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
   <form method="post" action ="/my-account/address/update/billing">@csrf
      <h3>Shipping address</h3>
      <div class="woocommerce-address-fields">
         <div class="woocommerce-address-fields__field-wrapper">
            <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
               <label for="billing_first_name" class="">First name&nbsp;<abbr class="required" title="required">*</abbr></label>
               <span class="woocommerce-input-wrapper">
               <input type="text" class="input-text " name="first_name" id="first_name" placeholder="" value="{{$address['first_name']}}" autocomplete="given-name"></span>
            </p>
            <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
               <label for="billing_last_name" class="">Last name&nbsp;<abbr class="required" title="required">*</abbr></label>
               <span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="last_name" id="last_name" placeholder="" value="{{$address['last_name']}}" autocomplete="family-name">
               </span>
            </p>
           <p class="form-row form-row-wide address-field validate-required validate-country" id="billing_country_field" data-priority="80">
		   <label for="billing_country" class="">Country&nbsp;<abbr class="required" title="required">*</abbr></label>
		   <span class="woocommerce-input-wrapper">
			  <select name="country" id="billing_country" class="state_select " autocomplete="address-level1" data-placeholder="Select an option&hellip;"  data-input-classes="">
			  
				 <option value="">Select an option&hellip;</option>
			  @foreach($countries as $country)
				 <option value="{{$country->id}}"@if($country->name == $address['country'] || $country->id == $address['country']) selected @endif >{{$country->name}}</option>
				@endforeach
			  </select>
		   </span>
		</p>
		  <p class="form-row form-row-wide address-field validate-required validate-Country" id="billing_state_field" data-priority="80">
		   <label for="billing_state" class="">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label>
		   <span class="woocommerce-input-wrapper">
			  <select name="city" id="billing_state" class="state_select " autocomplete="address-level1" data-placeholder="Select an option&hellip;"  data-input-classes="">
			   @foreach($states as $state)
				 <option value="{{$state->id}}"@if($state->name == $address['city'] || $state->id == $address['city']) selected @endif >{{$state->name}}</option>
				@endforeach
			  </select>
		   </span>
		</p>
            <p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field"><label for="address" class="">Street address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
			<input type="text" class="input-text " name="address" id="billing_address_1" placeholder="House number and street name" value="{{$address['address']}}" autocomplete="address-line1" data-placeholder="House number and street name"></span></p>
           
            
            <p class="form-row form-row-wide validate-required validate-phone" >
			<label for="billing_phone" class="">
			Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
			<span class="woocommerce-input-wrapper">
			<input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" value="{{$address['phone']}}" autocomplete="tel">
			</span></p>
			
            <p class="form-row form-row-wide validate-required validate-phone" >
			<label for="billing_phone" class="">
			Company<abbr class="required" title="required"></abbr></label>
			<span class="woocommerce-input-wrapper">
			<input type="tel" class="input-text " name="company" id="company" placeholder="" value="{{$address['company']}}" autocomplete="tel">
			</span></p>
            <p class="form-row form-row-wide validate-required validate-email"><label for="billing_email" class="">
			Email address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
			<input type="email" class="input-text " name="email" id="billing_email" placeholder="" value="{{$address['email']}}" autocomplete="email username"></span></p>
         </div>
         <p>
            <button type="submit" class="button" name="save_address" value="Save address">Save address</button>
            <input type="hidden" id="woocommerce-edit-address-nonce" name="woocommerce-edit-address-nonce" value="3a3e3857db"><input type="hidden" name="_wp_http_referer" value="/wordpress/funio/my-account/edit-address/billing/">				<input type="hidden" name="action" value="edit_address">
         </p>
      </div>
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
         t = c.replace(/home page-template page-template-page-templates page-template-homepage page-template-page-templateshomepage-php elementor-page/, 'woocommerce-account my-account'); t = c.replace(/page-template-page-template-absolute-header/, 'my-account');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
	  	<script>
$(document).ready(function() {
	$('#billing_country').on('change', function() {
		var country_id = this.value;
		$("#billing_state").html('');
		$.ajax({
			url:"{{url('get-states-by-country')}}",
			type: "get",
			data: {
			country_id: country_id,
			},
			dataType : 'json',
			success: function(result){
				$.each(result.states,function(key,value){
				$("#billing_state").append('<option value="'+value.id+'">'+value.name+'</option>');
				});
			}
		});
	});  
});
</script>

@endpush