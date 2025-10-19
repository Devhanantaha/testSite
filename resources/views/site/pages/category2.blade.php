@extends('site.app')
@section('title', $category->LocalName)
@section('content')


<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$category->LocalName}}</h2>
          <ol>
            <li><a href="/{{$local}}">{{$heading['home']}}</a></li>
            <li>{{$category->LocalName}}</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    

  </main><!-- End #main -->
  <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Services</h2>
          <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p>
        </div>

        <div class="row gy-5">
@foreach($category->products as $product)
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
			
                <a href="/product/{{$product->slug}}/{{ $local }}" class="stretched-link">
              <div class="img">
                <img src="assets/img/services-1.jpg" class="img-fluid" alt="">
              </div>
			  </a>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-activity"></i>
                </div>
                <a href="/product/{{$product->slug}}/{{ $local }}" class="stretched-link">
                  <h3>{{$product->categories[0]->LocalName}}</h3>
                </a>
                <p>{{$product->LocalName}}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
  @endforeach
    </div>
	  </div>
		</section>
<div class="container">
    <div class="row" style="margin-top:50px">
        <!-- Product-->
		@foreach($category->products as $product)
        <div class="col-lg-4 col-sm-6 mb-5">
            <div class="product-card mx-auto mb-3">
                
                <a class="product-thumb" href="/product/{{$product->slug}}/{{ $local }}"><img src="{{ asset('storage/'.$product['images']->first()['thumbnail']) }}" alt="Product Thumbnail"></a>
                <div class="product-card-body"><a class="product-meta" href="/product/{{$product->slug}}/{{ $local }}">{{$product->categories[0]->LocalName}}</a>
                    <h5 class="product-title"><a href="/product/{{$product->slug}}/{{ $local }}">{{$product->LocalName}}</a></h5><span class="product-price">
						{{--<del>$62.00</del>$49.99</span>--}}
                </div>
            </div>
        </div>
		@endforeach
        <!-- Product-->
       
    </div>
</div>
</section>
		@stop 
	@push('scripts')
	


@endpush