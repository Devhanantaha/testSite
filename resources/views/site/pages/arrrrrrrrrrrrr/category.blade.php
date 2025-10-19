

@extends('site.app')
@section('title', $category->name)
@section('content')
<div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-inner d-flex justify-content-between">
                        <h2 class="page-title">{{ $category->name }}</h2>
                        <ul class="page-list">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="#">{{ $category->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
<!-- collection area start  -->
    <div class="collection-area margin-top-60">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade in show active" id="one">
                            <div class="row">
								@forelse($pagproducts as $product)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="product-style-03 margin-top-40">
                                        <div class="thumb">
											@if ($product->images->count() > 0)
												<a href="{{ route('product.show', $product->slug) }}">
										   <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></a>
											@else
											<img src="https://via.placeholder.com/740" alt="">
											@endif
                                        </div>
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
								@empty
								 <p>No Products found in {{ $category->name }}.</p>
							@endforelse
									
                            </div>
                        </div>
						
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between pagination">
                                <h6>Showing {{$pagproducts->firstItem()}} to {{$pagproducts->lastItem()}} of {{$pagproducts->total()}} products </h6>
                                <ul>
								 {{ $pagproducts->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- collection area end  -->

@stop