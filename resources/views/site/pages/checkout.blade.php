@extends('site.app')
@section('title', 'Checkout')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">Checkout</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/en">Home</a></li>
            <li><a href="/cart/en">Cart</a></li>
            <li class="active">Checkout</li>
          </ul>
        </div>
      </div>
    </section>
    @if( $cart_sub_total > 0)
    <section class="section novi-bg novi-bg-img section-md bg-default" id="content">
         <div class="container">
               @if(\Session::has('success'))
               <div class="alert alert-success" role="alert">
                     {{ \Session::get('success') }}	</div>
                  @endif
                  @if(\Session::has('error'))
               <div class="alert alert-danger" role="alert">
                  {{ \Session::get('error') }}	</div>
                  @endif
           <!-- RD Mailform-->
           <form class="rd-mailform text-start row row-50" onchange="myFunction()" novalidate="novalidate">
             <div class="col-md-6 col-lg-4">
               <h5>Shipping Details</h5>
               <div class="form-wrap">
                 <input class="form-input form-control-has-validation" type="text" id="first_name" name="first_name" value="{{$address['first_name']}}" placeholder="First Name *" data-constraints="@Required">
                  <span class="form-validation"></span>
                
               </div>
               <div class="form-wrap">
                 <input class="form-input form-control-has-validation" type="text" name="first_name" id="last_name" value="{{$address['last_name']}}" placeholder="Last Name *" data-constraints="@Required">
                 <span class="form-validation"></span>
               </div>
               <div class="form-wrap">
                 <input class="form-input" id="company" type="text" name="company" id="company" value="{{$address['company']}}" placeholder="Company Name" >
           
               </div>
               <div class="form-wrap">
                 <input class="form-input form-control-has-validation"type="email" name="email" id="email" value="{{$address['email']}}" data-constraints="@Email @Required"><span class="form-validation"></span>
                 
               </div>
               <div class="form-wrap">
                 <input class="form-input form-control-has-validation"  type="text" name="phone" id="phone" value="{{$address['phone']}}"  data-constraints="@Numeric"><span class="form-validation"></span>
               
               </div>
               <div class="form-wrap">
                     <select name="city" id="city" class="form-control form-input form-control-has-validation " autocomplete="address-level1" data-placeholder="Select an option&hellip;"  data-input-classes="">
                     @foreach($states as $state)
                        <option value="{{$state->id}}"@if($state->name == $address['city'] || $state->id == $address['city']) selected @endif >{{$state->name}}</option>
                        @endforeach
                     </select>
               </div>
               <div class="form-wrap">
                     <input class="form-input form-control-has-validation" type="text" name="address" id="address" value="{{$address['address']}}" placeholder="Address *"  data-constraints="@Required"><span class="form-validation"></span>
                    
                   </div>
               <div class="form-wrap">
                 <input class="form-input form-control-has-validation" type="text" name="post_code" id="post_code" placeholder="Post Code" value="{{Auth::user()->post_code }}" ><span class="form-validation"></span>
               
               </div>
             </div>
             <div class="col-md-6 col-lg-8">
               <h5>Additional Information</h5>
               <div class="form-wrap">
                 <textarea class="form-input form-control-has-validation" id="notes" name="notes" placeholder="order Notes" ></textarea><span class="form-validation"></span>
                 
               </div>
               <section class="section novi-bg novi-bg-img section-md bg-default">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                        <h5>Your order</h5>
                        <div class="table-responsive">
                          <table class="table-checkout">
                            <thead>
                              <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($cart_content as $item)
                              <tr>
                                <td>
                                  <h6><a class="thumbnail-classic-title" href="single-product.html">{{ $item->name }}</a></h6>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                  <div class="product-price"><span>L.E {{ $item->getPriceSumWithConditions() }}</span></div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-md-end" colspan="2">
                                  <dl class="list-terms-minimal">
                                    <dt>Subtotal</dt>
                                    <dd>L.E {{ $cart_sub_total }}</dd>
                                  </dl>
                                  <dl class="heading-5 list-terms-minimal">
                                    <dt>Total</dt>
                                    <dd>L.E {{ $cart_total }}</dd>
                                  </dl>
                                </td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
             </div><hr>
              <section class="w-100">
                     <div class="payment-box">
                       <div class="form-wrap">
                         <label class="radio-inline">
                           <input type="radio"  name="payment_method" value="Cash On Delevery" class="mr-2" >Cash On Delivery
                         </label>
                       </div>
                       <div class="payment-box-inner">
                         <p>Cash On Delivery</p>
                       </div>
                     </div>
                     <div class="payment-box">
                       <div class="form-wrap">
                         <label class="radio-inline">
                           <input type="radio"  id="payment_method_paypal" class="input-radio mr-2" name="payment_method" value="paypal" >Credit Card
                         </label>
                       </div>
                       <div class="payment-box-inner">
                         <p> you can pay with your credit card </p>
                       </div>
                     </div>
                     <div class="payment-box-button">
                       <button class="button button-primary"   id="place_order" type="submit">Place order</button>
                     </div>
                 </section>
                 
         </form>
         </div>
       </section>
         
          
                   @else
                   <div class="text-center" style="
                   padding: 200px 0;
                   background: #fff;
               ">Cart Empty</div>
                   @endif
         <!-- #main -->
        
@stop
@push('scripts')
@if( $cart_sub_total > 0)
<script>
    function myFunction() {
        if (document.getElementById("payment_method_paypal").checked){
            document.getElementById("place_order").innerHTML = "Continue with Credit Card";
        } else {
            
				$('#place_order').show();
            document.getElementById("place_order").innerHTML = "Place order"
        }
    }
    </script>
      <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/home page-template page-template-page-templates page-template-homepage page-template-page-templateshomepage-php elementor-page/, 'checkout');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
 <script>
	$(document).ready(function(){
       $('#place_order').click(function(e){
              e.preventDefault();
               if(document.querySelectorAll('input[name="payment_method"]:checked').length === 0){
               alert('Please Select Payment method')
            }else{
			   if (document.getElementById("payment_method_paypal").checked){
            document.getElementById("place_order").innerHTML = "Continue with Credit Card";
           
             var ship_method = 'Normal Shipping' ;
             var first_name= $('#first_name').val();
             var last_name= $('#last_name').val()  ;          
             var address= $('#address').val();
             var country= "Egypt";
             var city= $('#city').val();
             var phone= $('#phone').val();
             if (first_name == "") {
               alert("First Name must be filled out");
               return false;
            }
            
            if (last_name == "") {
               alert("Last Name must be filled out");
               return false;
            }
            
            if (address == "") {
               alert("address must be filled out");
               return false;
            }
            
            if (country == "") {
               alert("country must be filled out");
               return false;
            }
            
            
            if (city == "") {
               alert("city must be filled out");
               return false;
            }
            
            
            if (phone == "") {
               alert("phone must be filled out");
               return false;
            }
             $.ajax({
                type: 'get',
                url: "{{route('checkout.place.order')}}",
                data: {
                    payment_method: 'Credit Card',
                    company: $('#company').val(),
                    first_name : first_name ,
                     last_name : last_name ,
                     address : address ,
                     country : country ,
                     city : city ,
                     phone : phone ,
                    post_code: $('#post_code').val(),
                    notes: $('textarea#notes').val(),
                    ship_method : ship_method ,
					
                },
                success: function (data) {
                    if (data.status == true) {
						
                        $('#place_order').hide();
                        $('#content').html(data.content);
                        $('#itemCount').html('0');
                     document.querySelector('#content').scrollIntoView();
                    } else {
                     }
                }, error: function(xhr, status, error){
         var errorMessage = xhr.status + ': ' + xhr.statusText
         alert('Error - ' + errorMessage);
     }
				});
			 }else{
				 var ship_method = 'Normal Shipping' ;
             var payment_method =$('input[name="payment_method"]:checked').val();
             
             var first_name= $('#first_name').val();
             var last_name= $('#last_name').val()  ;          
             var address= $('#address').val();
             var country= "Egypt";
             var city= $('#city').val();
             var phone= $('#phone').val();
             if (first_name == "") {
               alert("First Name must be filled out");
               return false;
            }
            
            if (last_name == "") {
               alert("Last Name must be filled out");
               return false;
            }
            
            if (address == "") {
               alert("address must be filled out");
               return false;
            }
            
            if (country == "") {
               alert("country must be filled out");
               return false;
            }
            
            
            if (city == "") {
               alert("city must be filled out");
               return false;
            }
            
            
            if (phone == "") {
               alert("phone must be filled out");
               return false;
            }
				  $.ajax({
                type: 'get',
                url: "{{route('checkout.place.order.nocc')}}",
                data: {
                    company: $('#company').val(),
                    post_code: $('#post_code').val(),
                    notes: $('textarea#notes').val(),
					ship_method : ship_method ,
					payment_method : payment_method ,
					first_name : first_name ,
					last_name : last_name ,
					address : address ,
					country : country ,
					city : city ,
					phone : phone ,
					
                },
                success: function (data) {
                    if (data.status == true) {
						
                     $('#content').html(data.content);                     
                     $('#itemCount').html('0');
                     document.querySelector('#content').scrollIntoView();
                    } else {
                     }
                }, error: function(xhr, status, error){
         var errorMessage = xhr.errors + ': ' + xhr
         alert('Error - ' + errorMessage);
     }
            });
          }
         }
        });
		$("#shipping_method li input").click(function(){
			var val= this.value ; 
			$.ajax({
                type: 'POST',
                url: "{{route('shipping.set')}}",
                data: {
                    val: val,
					
                },
					beforeSend: function (xhr) {
				$('.bwp-top-bar.bottom').show();
            var token = '{{ csrf_token() }}';

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                success: function (data) {
						
                        $('#cst').html(data['cartsubtotal']);
                        $('#ct').html(data['carttotal']);
                        $('#shipcond').html(data['condvalue']);
                   
                }, error: function (reject) {
                }
            });
});
});;
    </script>
	<script>
$(document).ready(function(){
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
});;
</script>
@endif
@endpush