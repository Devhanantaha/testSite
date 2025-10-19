

@extends('site.app')
@section('title', $category->name)
@section('content')

    <div class="sale-area">
        <div class="">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <div class="sales-content-02" style="background: url('/assets/img/catbanner2.jpg') no-repeat center center/cover;background-attachment: fixed;">
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
.product-style-03 .thumb  {
    position: relative;
    overflow: hidden;
}
.product-style-03 .thumb:after {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: #558a1c12;
}
.product-style-03 .thumb img {
    min-height: 191px;
    padding: 30px;
    -o-object-fit: cover;
    object-fit: cover;
    -webkit-transition: all 3.5s ease 0s;
    -o-transition: all 3.5s ease 0s;
    transition: all 3.5s ease 0s;
}
.product-style-03:hover .thumb img {
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1);
}
.margin-bottom-80 {
    margin-bottom: 123px;
}

.widget_about ul li {
    list-style: none;
    width: 36px;
    height: 36px;
background: #558a1c;}
.filtered{display:block }

.hidden{display:none !important }

.hidden.filtered{display:block !important }

</style>	
<!-- collection area start  -->
    <div class="collection-area margin-top-60">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-sm-3">
                    <dl class="dlist-inline">
					
                        @foreach( $category->attributes as $attribute)
                       
							<div class="{{ $attribute->name }}">
                            <dt>{{ $attribute->name }}: </dt>
                            <dd>
                                <label class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}"></label>
                                    <label data-price="0" value="0"> Select a {{ $attribute->name }}</label>
                                    @foreach($attribute->values as $attributeValue)
                                        @if ($attributeValue->attribute_id == $attribute->id)
										<div class="form-check ">
											  <input class="form-check-input" type="checkbox" rel="{{ $attributeValue->value }}" onchange="changes();">
											  <label class="form-check-label" for="flexCheckDefault">
												{{ $attributeValue->value }}
											  </label>
											</div>
                                        @endif
                                    @endforeach
                            </dd>
							
							</div>
                    @endforeach
					   <p>
        <label for="amount">Price range:</label>
        <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" />
    </p>

    <div id="slider-range"></div>
    </div>
                    </dl>
                </div>
                <div class="col-9">
                    <div class="tab-content">
                        <div class="tab-pane fade in show active" id="one">
                            <div class="row">
								@forelse($pagproducts as $product)
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="product-style-03 margin-top-40 @foreach($product->attributes as $productattribute)
									{{$productattribute->value}}
									@endforeach
									" data-price="20">
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
@push('scripts')
 <script>
	  
	  function changes() {
		  @foreach( $category->attributes as $attribute)
				  var {{ $attribute->name }}s = document.querySelectorAll(".{{ $attribute->name }} input[type='checkbox']");
				 
				@endforeach
				  var filters = {
					  
		  @foreach( $category->attributes as $attribute)
					{{ $attribute->name }}: getClassOfCheckedCheckboxes({{ $attribute->name }}s),
				 		
		@endforeach 
		 };
  filterResults(filters);
}

function getClassOfCheckedCheckboxes(checkboxes) {
  var classes = [];

  if (checkboxes && checkboxes.length > 0) {
    for (var i = 0; i < checkboxes.length; i++) {
      var cb = checkboxes[i];

      if (cb.checked) {
        classes.push(cb.getAttribute("rel"));
      }
    }
  }

  return classes;
}

function filterResults(filters) {
  var rElems = document.querySelectorAll(".tab-pane .row .product-style-03");
  
  var hiddenElems = [];

  if (!rElems || rElems.length <= 0) {
    return;
  }

  for (var i = 0; i < rElems.length; i++) {
    var el = rElems[i];
	 @foreach( $category->attributes as $attribute)
    if (filters.{{ $attribute->name }}.length > 0) {
      var isHidden = true;

      for (var j = 0; j < filters.{{ $attribute->name }}.length; j++) {
        var filter = filters.{{ $attribute->name }}[j];

        if (el.classList.contains(filter)) {
          isHidden = false;
          break;
        }
      }

      if (isHidden) {
        hiddenElems.push(el);
      }
    }
@endforeach
  }

  for (var i = 0; i < rElems.length; i++) {
    rElems[i].classList.add("filtered");
  }

  if (hiddenElems.length <= 0) {
    return;
  }

  for (var i = 0; i < hiddenElems.length; i++) {
    hiddenElems[i].classList.remove("filtered");
	
    hiddenElems[i].classList.add("hidden");
  }
}
	  </script>
	  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script>

function showProducts(minPrice, maxPrice) {
    $(".tab-pane .row .product-style-03.filtered").hide().filter(function() {
        var price = parseInt($(this).data("price"), 10);
        return price >= minPrice && price <= maxPrice;
    }).show();
}

$(function() {
    var options = {
        range: true,
        min: 0,
        max: 500,
        values: [5, 300],
        slide: function(event, ui) {
            var min = ui.values[0],
                max = ui.values[1];

            $("#amount").val("$" + min + " - $" + max);
            showProducts(min, max);
        }
    }, min, max;

    $("#slider-range").slider(options);

    min = $("#slider-range").slider("values", 0);
    max = $("#slider-range").slider("values", 1);

    $("#amount").val("$" + min + " - $" + max);

    showProducts(min, max);
});
	  </script>
	  @endpush