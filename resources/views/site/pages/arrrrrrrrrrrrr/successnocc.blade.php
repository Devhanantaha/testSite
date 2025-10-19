@section('main')

<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">اكتمل الطلب</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="#">شراء</a></li>
            <li class="active">اكتمل الطلب</li>
          </ul>
        </div>
      </div>
    </section>
<div id="content" class="section novi-bg novi-bg-img section-md bg-default"">
      
            <!-- .container -->
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div>
                        <div id="primary" class="content-area">
                           <div id="content" class="site-content">
                              <article >
                                 <div>
                                    <div class="text-center">
                                       <div>
                                          <p class="h3">شكرا تم استلام طلبك</p>
                                          <ul>
                                             <li class="h5">
                                                رقم الطلب:<strong>{{$order->order_number}}</strong>
                                             </li>
                                             <li>
                                                التاريخ:	<strong>{{ $order->created_at->toFormattedDateString() }}</strong>
                                             </li>
                                             <li>
                                                الاجمالى:					<strong><span><bdi>
                                                   <span>L.E</span>{{ $order->grand_total }}</bdi></span></strong>
                                             </li>
                                             <li >
                                                طريقة الشراء:						<strong>{{ $order->payment_method }}</strong>
                                             </li>
                                          </ul>
                                          <section >
                                             <h2 >تفاصيل الطلب</h2>
                                             <table class="w-100" >
                                                <thead>
                                                   <tr>
                                                      <th >Product</th>
                                                      <th>Total</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach($order->items as $item)
                                                   <tr >
                                                      <td>
                                                         <a href="/product/{{ $item->product->slug }}/en">{{ $item->product->name2 }}</a> <strong class="product-quantity">&times;&nbsp;{{ $item->quantity }}</strong>	
                                                      </td>
                                                      <td >
                                                         <span><bdi><span >L.E</span>{{ $item->price }}</bdi></span>	
                                                      </td>
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot>
                                                   <tr>
                                                      <th scope="row">الشحن:</th>
                                                      <td>{{$order->ship_method}} </td>
                                                   </tr>
                                                   <tr>
                                                      <th scope="row">طريقة الشراء:</th>
                                                      <td>{{ $order->payment_method }}</td>
                                                   </tr>
                                                   <tr>
                                                      <th scope="row">الاجمالى:</th>
                                                      <td><span >
                                                         <span>L.E</span>{{$order->grand_total}}</span></td>
                                                   </tr>
                                                </tfoot>
                                             </table>
                                          </section>
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