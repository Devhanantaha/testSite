@extends('site.app')
@section('title', 'Blogs and News')
@section('content')
<div id="content" class="site-content"><div class="page-banner blog-banner has-banner" style="min-height: 600px;">
<div class="page-banner-content">
<h1 class="entry-title">Blogs and News</h1><div class="breadcrumbs circle-style" itemprop="breadcrumb"><a href="/">Home</a><span> Blogs and News</span></div></div></div>
<div class="main-container">
<div class="container none-sidebar">
<div class="maincol-sidebar-none" id="main-blog">
<main id="main" class="blog-page blog-column-3 box-grid-layout site-main">

<div class="list-posts" data-col="3" data-pady="10">
@foreach($blogs as $blog)
<article id="post-5452" class="col-sm-4 post-5452 post type-post status-publish format-standard has-post-thumbnail hentry category-creative category-image">
<div class="post-wrapper">

<div class="post-thumbnail">
<a href="/blog-post/{{$blog->slug}}">
<img width="1338" height="870" src="{{ asset('storage/'.$blog->image) }}" class="attachment-agota-category-thumb size-agota-category-thumb wp-post-image ls-is-cached lazyloaded" alt="" loading="lazy" itemprop="image" data-src="{{ asset('storage/'.$blog->image) }}" ></a>
</div>

<div class="post-info">
<header class="entry-header">


<h2 class="entry-title">
<a href="/blog-post/{{$blog->slug}}" rel="bookmark">{{$blog->name}}</a>
</h2>
</header>

<div class="entry-content">
<div >
<div class="elementor-inner">
<div class="elementor-section-wrap">
<section class="elementor-section elementor-top-section elementor-element elementor-element-c7d8aaa elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="c7d8aaa" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8ac4ad1" data-id="8ac4ad1" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-b52487f elementor-widget elementor-widget-text-editor" >
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p>{{$blog->content}}</p></div>
</div>
</div>
<div class="elementor-element elementor-element-c41467f none-blog elementor-widget elementor-widget-read-more" >
<div class="elementor-widget-container">
</div></div></div></div></div></div></div></section></div></div></div>					</div>


<ul class="post-entry-data">
<li class="post-date">Post date: <a href="/blog-post/{{$blog->slug}}">{{$blog->created_at->format('d/M/Y')}}</a></li>

</ul>					</div>
</div>
</article>
@endforeach
</div>
<nav class="pagination-center pagination-row">
{{$blogs->links()}}
</nav>				 
</main>
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