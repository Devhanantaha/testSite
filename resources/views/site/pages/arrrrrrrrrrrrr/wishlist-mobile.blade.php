<ul class="shop_table cart wishlist_table wishlist_view responsive mobile ">
 @foreach($wl_content as $wl)
<li id="yith-wcwl-row-16536" >
<div class="item-wrapper">
<div class="product-thumbnail">
<a href="/product/{{$wl->slug}}">
<img width="1020" height="1020" src="{{ asset('storage/'.$wl->associatedModel['images']->first()['full']) }}" 
class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">							</a>
</div>

<div class="item-details">
<div class="product-name">
<h3>
<a href="/product/{{$wl->slug}}">
{{$wl->name}}								</a>
</h3>
					</div>

					<table class="item-details-table">



									<tbody><tr>
	<td class="label">
		Price:											</td>
	<td class="value">
		 @if($wl->sale_price > 0)
												 <del><span class="woocommerce-Price-amount amount">
												 <bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$wl->price / $currencyRate, 2, '.', '')}}</bdi>
												 </span></del>
												 <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$wl->sale_price / $currencyRate, 2, '.', '')}}</bdi></span></ins></span>
												 @else
												  <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">{{$currencysymbol}}</span>{{ number_format((float)$wl->price / $currencyRate, 2, '.', '')}}</bdi></span></ins></span>
												  @endif
		
		</td>
</tr>

</tbody></table>
			</div>
</div>

<div class="additional-info-wrapper">
			<table class="additional-info">

							<tbody><tr>
<td class="label">
	Stock:										</td>
<td class="value">
@if($wl->quantity > 0)
	<span class="wishlist-in-stock">In Stock</span>
@else

	<span class="wishlist-out-of-stock">Out of Stock</span>
	@endif
	</td>
</tr>
					</tbody></table>

<!-- Add to cart button -->
			<div class="product-add-to-cart">
<a rel="nofollow" href="/#4" id="addtocart" data-price="{{ $wl->sale_price > 0 ? $wl->sale_price : $wl->price }}" data-quantity="1" data-product_id="{{$wl->id}}"  class="button add_to_cart_button ajax_add_to_cart add_to_cart alt">Add to Cart</a>							</div>

<!-- Change wishlist -->

			<div class="product-remove">
<a href="/wishlist/{{$wl->id}}" class="remove_from_wishlist" title="Remove this product"><i class="fa fa-trash"></i></a>
</div>
	</div>
</li>
@endforeach
</ul>