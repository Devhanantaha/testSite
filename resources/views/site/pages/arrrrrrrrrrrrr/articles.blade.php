@extends('site.appar')
@section('title', 'المقالات')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">المقالات</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/ar">الرئيسية</a></li>
            <li class="active">المقالات</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="bg-default section-lg">
        <div class="container">
         <div class="row row-50">
           @foreach ($articles as $article)
           <div class="col-md-6">
             <h6 class="font-bold">{{ $article->name2 }}</h6>
             <p class="mt-0" style="font-size: 13px;color: #231f20;;line-height: 1.5">
                {!!  strip_tags(str_limit($article->content2,250))!!}
            </p>
           </div>
           <div class="col-md-2">
             <div style="float:right;margin-top: 65px;font-size: 11px;font-weight: bold;color: #231f20;">
               <a href="{{ route('page.show', $article->slug) }}/ar">اقرأ المزيد >></a></div>
           </div>
     <hr style="width:65%;margin-left:15px">
               
           @endforeach
        </div>
      </section>
      <!-- Divider-->
      <div class="container">
        <div class="divider"></div>
      </div>

          @stop