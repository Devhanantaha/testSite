

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
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-8 col-5">
                            <ul class="nav nav-pills shop-tab">
                                <li><a data-toggle="pill" href="#one" class="active"><i class="fa fa-th-large"></i></a></li>
                                <li><a data-toggle="pill" href="#two"><i class="fa fa-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-7">
                            <form action="#">
                                <select class="form-control sort-select">
                                    <option>Default sorting</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by latest</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                                <i class="fa fa-chevron-down"></i>
                            </form> 
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade in show active" id="one">
                            <div class="row">
								@forelse($pagproducts as $product)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="product-style-03 margin-top-40">
                                        <div class="thumb">
											@if ($product->images->count() > 0)
										   <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">
											@else
											<img src="https://via.placeholder.com/740" alt="">
											@endif
                                            <ul class="cart-action">
                                                <li><a href="#"><i class="icon-add-to-cat"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="content text-center">
										
                                            <span class="brand">Brand: geek</span>
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
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 margin-top-20">
                    <div class="widget search-widget">
                        <form action="#">
                            <button type="submit"><i class="icon-search"></i></button>
                            <input type="text" placeholder="Search brand" name="search">
                        </form>
                    </div>
					@foreach($attributes as $attribute)
										
										
                    <div class="widget categories-widget" id="app">
                        <div class="accordion-style-2" id="{{ str_slug($attribute->name) }}a">
                            <div class="card">
                                <div class="card-header" id="{{ str_slug($attribute->name) }}h">
                                    <p class="mb-0">
                                        <a href="#" role="button" data-toggle="collapse" data-target="#{{ str_slug($attribute->name) }}" aria-expanded="true" aria-controls="{{ str_slug($attribute->name) }}c">{{ str_slug($attribute->name) }}</a>
                                    </p>
                                </div>
                                <div id="{{ str_slug($attribute->name) }}" class="collapse show" aria-labelledby="{{ str_slug($attribute->name) }}h" data-parent="#{{ str_slug($attribute->name) }}a">
                                    <div class="card-body">
                                        <form action="#">
										@foreach($attribute->values as $attributeValue)
                                            <div class="custom-control custom-checkbox mb-3">
                                              <input type="checkbox" class="custom-control-input" value="{{ $attributeValue->value }}">
                                              <label class="" for="customCheck">{{ $attributeValue->value }}</label>
                                            
											</div>
											@endforeach
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- collection area end  -->

@stop