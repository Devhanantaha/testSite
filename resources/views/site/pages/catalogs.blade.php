@extends('site.app')
@section('title', 'catalogs')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">Catalogs</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/en">Home</a></li>
            <li class="active">Catalogs</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="bg-default section-lg">
            <div class="container">
             <div class="row row-50">
               @foreach ($catalogs as $catalog)
               <div class="col-md-6">
                 <h6 class="font-bold">{{ $catalog->name }}</h6>
                 <p class="mt-0" style="font-size: 13px;color: #231f20;;line-height: 1.5">
                    {!!  strip_tags(str_limit($catalog->content,250))!!}
                </p>
               </div>
               <div class="col-md-2">
                 <div style="float:right;margin-top: 65px;font-size: 11px;font-weight: bold;color: #231f20;">
                        <a style="color:black" class="icon icon-md linear-icon-download2 link-gray-4" href="{{ asset('storage/'.$catalog->file) }}"></a>
                </div>
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