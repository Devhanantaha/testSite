@if(isset($query) )
                        <div class="tab-pane fade in show active" id="one">
                            <div class="row">
							
@if(isset($_POST["action"]))
		@php
		$ar = array();
		@endphp
	@foreach($category->attributes as $filter)			
		@php
		if(isset($_POST[$filter['name']])){
				
		$ar = array(implode("','", $_POST[$filter['name']])) ;
			array_merge($ar, $_POST[$filter['name']]);
			print_r($ar);
			}
			@endphp	
	@endforeach	
count ar :{{count($ar)}}	
		@foreach ($ar as $i => $a)
		@foreach($category->products as $product) 
					@foreach($product->attributes as $productattribute)
						
						<h6> i= {{$i}} , a ={{$a}},  </h6>
						
						@if ($productattribute->value == $a)  
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="product-style-03 margin-top-40">
													@if ($product->images->count() > 0)
																<a href="{{ route('product.show', $product->slug) }}">
														<div class="thumb">
														   <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">										   
														</div></a>
													@else											
														<div class="thumb">
															<img src="https://via.placeholder.com/740" alt="">
														</div>
													@endif
												<div class="content text-center">
												
													<span class="brand">Brand: DasKind</span>
													<h6 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h6>
													<div class="content-price d-flex align-self-center justify-content-center">
														 @if ($product->sale_price != 0)
															 <span class="old-price">{{ config('settings.currency_symbol').$product->price }}</span>
														<span class="new-price"> {{ config('settings.currency_symbol').$product->sale_price }}</span>                                  
														@else
															<span class="new-price"> {{ config('settings.currency_symbol').$product->price }}</span>
														@endif
													</div>
												</div>
											</div>
										</div>
						@endif	
						@endforeach
					@endforeach
		@endforeach
		
@endif
                                        </div>
                                    </div>
@else
<h6>no</h6>
@endif

 
