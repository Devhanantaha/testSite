@extends('site.app')
@section('title', 'Shopping Cart')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">Cart</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/en">Home</a></li>
            <li class="active">Cart</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="section-lg bg-default">
         <div class="container">
               @if(\Session::has('success'))
               <div class="alert alert-success" role="alert">
                     {{ \Session::get('success') }}	</div>
                  @endif
                  @if(\Session::has('error'))
               <div class="alert alert-danger" role="alert">
                  {{ \Session::get('error') }}	</div>
                  @endif
           <div class="table-responsive">
         @if($cartCount > 0)     
   <form class="woocommerce-cart-form" action="/cart/update/m" method="get">

             <table class="table-cart">
               <thead>
                 <tr>
                   <th colspan="2">Product</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Total</th>
                 </tr>
               </thead>
               <tbody>
           @foreach($cart_content as $item)
                  <tr>
                   <td class="table-cart-remove-item">
                      <a href="{{ route('checkout.cart.remove', $item->id)}}"><span class="icon icon-sm linear-icon-cross2 icon-gray-4"></span></a></td>
                   <td style="min-width: 330px">
                     <div class="unit flex-row unit-spacing-md align-items-center">
                        <a class="thumbnail-classic-title" href="/product/{{$item->associatedModel->slug}}/en">
                       <div class="unit-left">
                          <img src="{{ asset('storage/'.$item->associatedModel['images']->first()['thumbnail']) }}" alt="{{ $item->name }}" width="141" height="188">
                       </div>
                       </a><div class="unit-body"><a class="thumbnail-classic-title" href="/product/{{$item->associatedModel->slug}}/en">
                         <h6>EM300E</h6>
                  </a>
                       </div>
                  <style>.unit-bodyp{line-height:1.3;font-size:15px}.unit-body blockquote{line-height:1;font-size:15px}</style>
                     </div>
                   </td>
                   <td>L.E {{ $item->price }}</td>
                   <td>
               <input class="form-input" 
               min="1"
               max="{{$item->associatedModel->quantity}}"
               name="qty[]"
               value="{{$item->quantity}}"
               type="number"
                data-zeros="false" >
               
                <input
                type="hidden"
                name="id[]"
                value="{{$item->id}}" />	
               
                   </td>
                   <td>L.E {{ $item->getPriceSumWithConditions() }}</td>
                 </tr>
                      @endforeach       
                           </tbody>
             </table>
          </div>
          <div class="row row-50 text-center">
            <div class="col-md-8 text-md-left">
               <div class="group-xs">
               <a href="/shop/en" class="button button-white">Continue Shopping </a>
               </div>
            </div>
            <div class="col-md-4 text-md-right">
               <input type="submit" class="button button-primary" value="Update Cart "></input>
            </div>
            <div class="col-sm-12">
                  <hr>
                </div>
                <div class="col-sm-12">
                     <div class="text-md-end">
                       <dl class="heading-5 list-terms-minimal">
                         <dt>Total</dt>
                         <dd>L.E {{ $cart_total }}</dd>
                       </dl><a class="button button-primary" href="/checkout/en"> Proceed to Checkout</a>
                     </div>
                   </div>
           </div>
         </form>
         @else
         <h3 class="text-center "> Cart Empty</h3>
         @endif
         </div>
       </section>
		 
@stop
