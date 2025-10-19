@extends('site.appar')
@section('title', 'الاسئلة الشائعة')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">الاسئلة الشائعة</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/ar">الرئيسية</a></li>
            <li class="active">الاسئلة الشائعة</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="section-lg bg-default text-center">
        <div class="container">
          <h3>الاسئلة الشائعة</h3>
          <!-- Accordion-->
          <div class="text-left" id="accordion" role="tablist">   
            @foreach ($faqs as $faq)
                	<!-- Bootstrap panel-->
            <div class="panel panel-custom">
                <div class="panel-custom-heading" id="{{ $faq->id }}Heading" role="tab">
                  <h5 class="panel-custom-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#{{ $faq->id }}" href="#{{ $faq->id }}Collapse" aria-controls="{{ $faq->id }}Collapse">
                        {{ $faq->name2 }}
                    </a>
                  </h5>
                </div>
                <div class="panel-custom-collapse collapse" id="{{ $faq->id }}Collapse" role="tabpanel" aria-labelledby="{{ $faq->id }}Heading">
                  <div class="panel-custom-body" id ="pages">
                      {!! $faq->content2 !!}
                  </div>
                </div>
              </div>
            @endforeach         
					
          </div>
        </div>
      </section>

          @stop