@extends('site.appar')
@section('title', 'careers')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">الوظائف</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/ar">الرئيسية</a></li>
            <li><a href="#">الوظائف</a></li>
          </ul>
        </div>
      </div>
    </section>
    <section class="section-lg bg-default text-center">
        <div class="container">
          <h3>الوظائف الحالية</h3>
          <!-- Accordion-->
          <div class="text-left" id="accordion" role="tablist">   
              @foreach ($careers as $career)
                    <!-- Bootstrap panel-->
              <div class="panel panel-custom">
                  <div class="panel-custom-heading" id="{{ $career->id }}Heading" role="tab">
                    <h5 class="panel-custom-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#{{ $career->id }}" href="#{{ $career->id }}Collapse" aria-controls="{{ $career->id }}Collapse">
                          {{ $career->name2 }}
                      </a>
                    </h5>
                  </div>
                  <div class="panel-custom-collapse collapse" id="{{ $career->id }}Collapse" role="tabpanel" aria-labelledby="{{ $career->id }}Heading">
                    <div class="panel-custom-body" id ="pages">
                        {!! $career->content2 !!}
                        <br>
                        <a class="button button-primary" href="/careers/{{ $career->id }}/ar">تقدم</a>
                    </div>
                  </div>
                </div>
              @endforeach         
            
            </div>
        </div>
      </section>

          @stop