@extends('site.app')
@section('title', 'Checkout')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
        <div class="container">
          <div class="breadcrumbs-custom__inner">
            <p class="breadcrumbs-custom__title">Search Results</p>
            <ul class="breadcrumbs-custom__path">
              <li><a href="/">Home</a></li>
              <li class="active">Search Results</li>
            </ul>
          </div>
        </div>
	  </section>
	  
	  <section class="section novi-bg novi-bg-img section-xl bg-default">
			<div class="container">
			  <div class="rd-search-results">
	  <div id="search-results">
	
@if ($products->count() > 0)
		
	<ol class="search-list">
					
		@foreach($products as $product)
		@php
		$stribe = strip_tags($product->name) ;
		@endphp

			<li class="search-list-item">	
				<h5 class="search-title">
					<a target="_top" href="/product/{!! str_slug($stribe)!!}/en" class="search-link">
						{!! $product->name !!}</a>
					</h5>
					<p>{!! $product->description !!}</p> 
			</li>
		@endforeach
	 </ol>
@endif
	 @if ($cats->count() > 0)
		
	 <ol class="search-list">
					 
		 @foreach($cats as $cat)
		 @php
		 $stribe = strip_tags($cat->name) ;
		 @endphp
 
			 <li class="search-list-item">	
				 <h5 class="search-title">
					 <a target="_top" href="{{ route('category.show2',  str_slug($stribe) ) }}/en" class="search-link">
						 {!! $cat->name !!}</a>
					 </h5>
					 <p>{!! $cat->description !!}</p> 
			 </li>
		 @endforeach
	  </ol>
	 @endif

@if ($products->count() < 1  && $cats->count() < 1)
<h3>No search results </h3>
@endif
	  </div>
	
	</div>
			</div>
		  </section>


@stop