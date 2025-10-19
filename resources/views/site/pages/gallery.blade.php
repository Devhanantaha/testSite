@extends('site.app')
@section('title', $pagename)
@section('content')
<section class="breadcrumbs-custom">
        <div class="parallax-container" >
          <div class=" parallax-content">
            <div class="container">
              <h2 class="breadcrumbs-custom-title">{{ $pagename }}</h2>
            </div>
          </div>
        </div>
      </section>
 
  <section class="section section-xl bg-default">
        <div class="container-fluid isotope-wrap isotope-custom-2">
          
            <div class="row row-30 isotope" data-lightgallery="group">
			@foreach($gallaries as $gal)
           <div class="col-sm-6 col-md-4 col-xl-3 isotope-item" data-filter="Type 1">
              <!-- Thumbnail Classic-->
              <article class="thumbnail-modern block-1">
			  <a class="thumbnail-modern-figure" href="/storage/{{$gal->image}}" data-lightgallery="item">
			  <img src="/storage/{{$gal->image}}" alt="" width="570" height="399"/></a>
                <div class="thumbnail-modern-caption">
                  <div>
                    <h4 class="thumbnail-modern-title">{{$gal->LocalName}}</h4>
                  </div>
                </div>
              </article>
            </div>
			@endforeach
          </div>
        </div>
      </section>
      
          @stop