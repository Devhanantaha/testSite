@extends('site.appar')
@section('title', 'المشروعات')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">المشروعات</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/ar">الرئيسية</a></li>
            <li class="active">المشروعات</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="section novi-bg novi-bg-img section-lg bg-default">
            <div class="container">
              <div class="row row-60">
                  @foreach ($projects as $project)
                  <div class="col-md-6 col-xl-4">
                        <div class="thumbnail-classic">
                          <a href="{{ route('page.show', $project->slug) }}/ar">
                              <img src="{{ asset('storage/'.$project->image) }}" alt="" width="418" height="315"></a>
                          <div class="caption">
                            <h5><a class="thumbnail-classic-title" href="{{ route('page.show', $project->slug) }}/ar">{{ $project->name2 }}</a></h5>
                            <p>{!! strip_tags(str_limit($project->descr2,250)) !!}</p>
                          </div>
                        </div>
                      </div>  
                  @endforeach
                              
                
              </div>
            </div>
          </section>
      <!-- Divider-->
      <div class="container">
        <div class="divider"></div>
      </div>

          @stop