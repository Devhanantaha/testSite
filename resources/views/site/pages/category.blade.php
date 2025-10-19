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
          <h2>{{$category->LocalName}}</h2>
          <p>{!!$category->LocalDescription!!}</p>
        </div>

        <div class="row gy-5">
@foreach($category->products as $product)
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
			
                <a href="/product/{{$product->slug}}/{{ $local }}" class="stretched-link">
              <div class="img">
                <img src="{{ asset('storage/'.$product['images']->first()['thumbnail']) }}" class="img-fluid" alt="">
              </div>
			  </a>
              <div class="details position-relative">
                
                <a href="/product/{{$product->slug}}/{{ $local }}" class="stretched-link">
                  <h3>{{$product->LocalName}}</h3>
                </a>
                <p> {{$product->categories[0]->LocalName}}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
  @endforeach
    </div>
	  </div>
		</section>

		@stop 
	@push('scripts')
	

@endpush