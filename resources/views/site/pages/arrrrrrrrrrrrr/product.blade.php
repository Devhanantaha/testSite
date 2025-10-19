@extends('site.appar')
@section('title', $product->name2)
@section('content')
<section class="section-md bg-default">
        <div class="container">
          
  @include('site.partials.flash')
          <div class="row row-60">
            <div class="col-md-6 col-lg-5">
              <!-- Slick Carousel-->
              <div class="slick-slider carousel-parent" data-arrows="true"  data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel" data-lightgallery="group">
				  @foreach ($product->images as $primage)					 
				  <div class="item"><a class="img-thumbnail-variant-2" href="{{ asset('storage/'. $primage['full']) }}" data-lightgallery="item">
                    <figure> <img src="{{ asset('storage/'. $primage['full']) }}" alt="EM300E" width="535" height="714"/>
                    </figure>
                    <div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div></a>
               	 </div> 
				  @endforeach
			</div>
              <div class="slick-slider" id="child-carousel" data-for=".carousel-parent" data-arrows="false" data-loop="false" data-dots="false" data-swipe="true" data-items="3" data-sm-items="3" data-md-items="3" data-lg-items="4" data-xl-items="5" data-slide-to-scroll="1">
				@foreach ($product->images as $primaget)
                <div class="item"><img src="{{ asset('storage/'. $primaget['thumbnail']) }}" alt="EM300E" width="89" height="120"/>
					@endforeach
				</div>
			</div>
            </div>
			
            <div class="col-md-6 col-lg-7">
              <div class="product-single">
                <p class="product-stock">
                  @if ($product->quantity > 0)
                 متوفر
                  @else
                  غير متوفر
                @endif
              </p>
                <h4>{{ $product->name2 }}</h4>
                 <p class="product-price"><span>{{ $product->price }}</span></p> 
                <p class="product-text">{{ strip_tags(str_limit($product->description2,250))}}</p>
              
<form action="{{ route('product.add.cart') }}" method="POST">@csrf
    <input type="hidden" name="productId" value="{{$product->id}}" />
                @if($product->attributes->count() > 0)
                <div class="form-wrap product-select">
                    @foreach($attributes->sortBy('ordr')  as $attribute)
                    @php
                    $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray());									
                    @endphp
                    @if ($attributeCheck && $attribute->display == 1 || $attributeCheck &&  $product->variations->count() > 0)	
                    <!--Select 2-->
                    <select class="form-control" data-placeholder="{{ $attribute->name  }}" data-minimum-results-for-search="Infinity"  name="attributes[{{ $attribute->code }}]" @if($attribute->is_required == true ) required @endif>
                        
                      <option selected disabled>{{ $attribute->name2  }}</option>
                      @foreach($product->attributes as $attributeValue)
                        @if ($attributeValue->attribute_id == $attribute->id  )
                      <option @if ($product->attribs == 0) selected @endif @if ($attributeValue->quantity < 1 && $product->variations->count() < 1 ) disabled @endif @if($product->variations->count() > 0) onclick="variant({{$attributeValue->id}})" @endif  value="{{$attributeValue->value}}" >{{$attributeValue->valuear}}</option>
                      @endif
                      @endforeach
                    </select>
                    							
                    @endif
                    @endforeach
                  </div>
                  @endif
                  <div class="group group-middle">
                      <input class="form-input" type="number" name="quantity" data-zeros="false" value="1" min="1" max="{{ $product->quantity }}">
                      <button class="button button-primary button-icon button-icon-left" type="submit">
                        <span class="icon novi-icon icon-md linear-icon-cart"></span><span>اضف للسلة</span></button>
                    </div>
                   </form>
				</div>

			               
                <ul class="product-meta">
                  <li>
                    <dl class="list-terms-minimal">
                      <dt>Category</dt>
                      <dd>
                        <ul class="product-categories">
							@foreach ($product->categories as $prcat)
							<li><a>{{ $prcat->name2 }}</a></li>								
							@endforeach
                        </ul>
                      </dd>
                    </dl>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-12">
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal" id="tabs-1">
                <!-- Nav tabs-->
                <ul class="nav nav-custom nav-custom-tabs nav-custom__align-left">
                  <li class="nav-item"><a class="nav-link active" href="#tabs-1-2" data-toggle="tab">التفاصيل الفنية</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">الدعم</a></li>
                </ul>
              </div>
              <div class="tab-content text-left">
				  <div class="tab-pane fade show active" id="tabs-1-2">
				  <div class="productDetails2-dataPanel-inner">
				  <ul>
              @foreach($attributes->sortBy('ordr')  as $attribute)
              @php
              $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray());									
              @endphp
              @if ($attributeCheck)
            <li>{{ $attribute->name }} 	: @foreach($product->attributes as $pr_attrib)
                @if ($pr_attrib->attribute_id == $attribute->id  )
                {{ $pr_attrib->value }} 
                @endif	 
                @endforeach</li>

			@endif
      @endforeach
            </ul> </div>
                </div>
                <div class="tab-pane fade" id="tabs-1-3">
				<p>
               <ul id = 'sprtul'style='display:flex'>
			   				<li><i><img src="https://elwaha.com.eg/uploads/1577189368icon.png"><a href="https://elwaha.com.eg/uploads/1573383273.jpg">Builtin draft</a></i></li>				<li><i><img src="https://elwaha.com.eg/uploads/1577189385icon.png"><a href="https://elwaha.com.eg/uploads/1579010933.pdf">Productsheet</a></i></li>			   </ul></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
	  <style>
     .form-control {
    padding: 8px;
    display: inherit;
    margin-bottom: 8px;
    border-color: #003f63;
    cursor: pointer;
    color: gray;
}
.form-control option {
    background: #003f63a3;
    color: #fff;
    cursor: pointer;
}
	  #sprtul li{margin-right:50px}
	  .productDetails2-dataPanel-inner ul li:before{    content: "• ";
    display: block;
    width: 15px;
    float: left;
    margin: 0px 0px 0px -15px;}
	.tabs-custom.tabs-horizontal .nav-custom-tabs li a:hover, .tabs-custom.tabs-horizontal .nav-custom-tabs li a.active{color:#231f20}
	.tabs-custom .nav-custom-tabs li a{color:#5a6870}
	 .tabs-custom.tabs-horizontal .nav-custom-tabs li a.active:before{
		    content: "";
    position: absolute;
    left: 50%;
    right: -57px;
    bottom: 10px;
    border-bottom: 2px solid rgb(0, 185, 173);
    border-bottom-width: 2px;
    border-bottom-style: solid;
    border-bottom-color: rgb(0, 185, 173);
	}
	.tabs-custom.tabs-horizontal .nav-custom__align-left li:first-of-type a:before{
	left: 39%;
    right: -17px;
	}
	.tabs-custom.tabs-horizontal .nav-custom__align-left li:last-of-type a:before{
	left: 49%;
    right: -14px;
	}
			@media(max-width:767px){
			.tabs-custom.tabs-horizontal .nav-custom__align-left li:first-of-type a:before {
			left: 11%;
			right: 12px;
		}
		.tabs-custom.tabs-horizontal .nav-custom-tabs li a.active:before {left: 6%;
			right: 9px;}
			.tabs-custom.tabs-horizontal .nav-custom__align-left li:last-of-type a:before {
			left: 11%;
			right: 6px;}
		}
	  </style>
      <!-- Divider-->
      <div class="container">
        <div class="divider"></div>
      </div>

      <section class="section-md bg-gray-lighter">
        <div class="container text-center">
          <h3>منتجات ذات صلة</h3>
          <!-- Owl Carousel-->
          <div class="owl-carousel carousel-product" data-autoplay="true" data-items="1" data-md-items="2" data-lg-items="3" data-xl-items="4" data-stage-padding="0" data-loop="false" data-margin="50" data-mouse-drag="true" data-nav="true">
              @foreach($related as $rel)
            <div class="item">
              <div class="product product-grid"><a href="/product/{{$rel->slug}}/ar">
                <div class="product-img-wrap"><img src="{{ asset('storage/'.$rel['images']->first()['thumbnail']) }}" alt="{{$rel->name2}}" width="300" height="400"/>
                </div>
                <div class="product-caption">
                  <h6 class="product-title">{{$rel->name2}}</a></h6></div>
              </div>
            </div>
            @endforeach
          </div>			 		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		   		             </div>
      </div>
	  </section>
	  
	  @stop