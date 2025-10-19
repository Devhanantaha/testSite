@foreach($products as $product)
<li class="item-search"> <a class="item-image" href="/product/{{$product->slug}}"><img class="pull-left" src="{{ asset('storage/'.$product['images']->first()['full']) }}"></a><div class="item-content"><a href="/product/{{$product->slug}}" title="{{$product->name}}"><span>{{$product->name}}</span></a><div class="price">
@if ($product->sale_price > 0)
												<del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$product->price / $currencyRate, 2, '.', '')}}</span></del>
												<span  id="productPrice" class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$product->sale_price / $currencyRate, 2, '.', '')}}</span>
												@else												
												<span  id="productPrice" class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$product->price / $currencyRate, 2, '.', '')}}</span>
												@endif
												@if ($product->sale_price > 0)
                                                <div class='product-lable'>
                                                   <div class="onsale">-{{round((($product->price - $product->sale_price)*100) /$product->price )}}%</div>
                                                </div>
												@endif
</div></div></li>
@endforeach