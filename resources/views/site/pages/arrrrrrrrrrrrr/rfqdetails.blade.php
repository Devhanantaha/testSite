@extends('site.appar')
@section('title', 'معلومات الاتصال لطلب عرض سعر')
@section('content')
<style>@media (min-width: 993px){form.checkout{display: block !important}}</style>

         <div id="content" class="site-content">
               <div class="container default-entry-header"><h1 class="entry-title simple-title">معلومات الاتصال لطلب عرض سعر</h1><div class="breadcrumbs circle-style" itemprop="breadcrumb"><a href="/ar">الرئيسية</a><span> معلومات الاتصال </span></div></div>
            <!-- .container -->
            <div class="container" style="
            direction: rtl;
            text-align: right;
        ">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div id="main-content" class="main-container">
                        <div id="main-column" class="content-area">
                           <div id="content" class="site-content" role="main">
                              <article id="post-18" class="post-18 page type-page status-publish hentry">
                                 <div class="entry-content clearfix">
                                    <div class="woocommerce">
                                       <div class="woocommerce-notices-wrapper">                                         
            
                                             @if(\Session::has('error'))
                                             <ul class="woocommerce-error" role="alert">
                                                <li>{{\Session::get('error') }}</li>
                                             </ul>
                                             @endif
                                       </div>
                                       
									   @if($rfq_content->count() > 0)
                                       <form name="checkout"  onchange="myFunction()" class="checkout woocommerce-checkout" enctype="multipart/form-data">
                                          <div class="row">
                                             <div class="col-12">
                                                <div class="row " id="customer_details">
                                                   <div class="col-12">
                                                      <div class="woocommerce-billing-fields">
                                                         <h3>معلومات الاتصال بك</h3>
                                                         <div class="woocommerce-billing-fields__field-wrapper">
                                                            <p class="form-row  validate-required" id="billing_first_name_field" ><label for="first_name" class="">الاسم بالكامل&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="name" id="name" placeholder=""   autocomplete="given-name" /></span></p>
                                                            
                                                            
															
                                                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" ><label for="billing_address_1" class="">العنوان&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="address" id="address" placeholder="رقم المنزل واسم الشارع"   autocomplete="address-line1" /></span></p>                                                          
                                                            <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field"><label for="billing_phone" class="">التليفون&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="tel" class="input-text " name="phone" id="phone" placeholder=""   autocomplete="tel" /></span></p>
                                                            <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field"><label for="billing_email" class="">البريد الالكترونى </label><span class="woocommerce-input-wrapper"><input type="email" class="input-text " name="email" id="email" placeholder=""   autocomplete="email username" /></span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-12">
                                                      <div class="woocommerce-additional-fields">
                                                         <div class="woocommerce-additional-fields__field-wrapper">
                                                            <p class="form-row notes" id="order_comments_field" ><label for="notes" class=""> ملاحظات&nbsp;<span class="optional">(اختيارى)</span></label><span class="woocommerce-input-wrapper"><textarea name="notes" class="input-text " id="notes" placeholder="ملاحظات خاصة بالطلب"  rows="2" cols="5"></textarea></span></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <button type="submit" class="button alt mt-5" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">أطلب الآن</button>
                                          </div>
                                       </form>
									   @else
									   <h3 class="text-center"> No Items In RFQ </h3>
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
         <!-- #main -->
        
@stop
@push('scripts')
      <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/home page-template page-template-page-templates page-template-homepage page-template-page-templateshomepage-php elementor-page/, 'checkout');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
 <script>
	_HWIO.readyjs(function($){
       $('#place_order').click(function(e){
              e.preventDefault();
            
             var name= $('#name').val();          
             var address= $('#address').val();
             var phone= $('#phone').val();
             var email= $('#email').val();
             if (name == "") {
               alert("First Name must be filled out");
               return false;
            }
            
            if (address == "") {
               alert("address must be filled out");
               return false;
            }
            
            
            
            if (phone == "") {
               alert("phone must be filled out");
               return false;
            }
             $.ajax({
                type: 'get',
                url: "{{route('rfq.request')}}/en",
                data: {
                    name : name ,
                     email : email ,
                     address : address ,
                     phone : phone ,
                    notes: $('textarea#notes').val(),
					
                },
                success: function (data) {
                    if (data.status == true) {
						
                        $('#place_order').hide();
                        $('#content').html(data.content);
                     document.querySelector('#content').scrollIntoView();
                    } else {
                     }
                }, error: function(xhr, status, error){
         var errorMessage = xhr.status + ': ' + xhr.statusText
         alert('Error - ' + errorMessage);
     }
				});
			 
         
        });
	
});;
    </script>

@endpush