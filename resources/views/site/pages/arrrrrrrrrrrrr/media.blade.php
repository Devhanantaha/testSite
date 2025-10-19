@extends('site.appar')
@section('title', 'الوسائط')
@section('content')
<div id="content" class="site-content"><div class="page-banner blog-banner has-banner" style="min-height: 600px;">
<div class="page-banner-content">
<h1 class="entry-title">الوسائط</h1><div class="breadcrumbs circle-style" itemprop="breadcrumb"><a href="/ar">الرئيسية</a><span> الوسائط</span></div></div></div>
<div class="main-container">
<div class="container none-sidebar">
<div class="maincol-sidebar-none" id="main-blog">
<main id="main" class="blog-page blog-column-3 box-grid-layout site-main">

<div class="row" >
@foreach($media as $product)
<div class="col-md-4">
{!! $product->content2 !!}
</div>  
      



		
@endforeach	
<nav class="pagination-center pagination-row">
{{$media->links()}}
</nav>				 
</main>
</div>
</div>

</div>
</div>
</div>
@stop
	@push('scripts')
	 <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/home/, 'blog ');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
	
	@endpush