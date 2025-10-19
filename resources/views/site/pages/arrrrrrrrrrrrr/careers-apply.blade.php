@extends('site.appar')
@section('title', 'careers')
@section('content')
<section class="section novi-bg novi-bg-img breadcrumbs-custom">
      <div class="container">
        <div class="breadcrumbs-custom__inner">
          <p class="breadcrumbs-custom__title">{{ $career->name2 }}</p>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/ar">الرئيسية</a></li>
            <li><a href="/careers/ar">الوظائف</a></li>
            <li class="active">تقدم الى {{ $career->name2 }}</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="section-xl bg-default text-center">
        <div class="container">
          
@include('site.partials.flash')
          <h3><span style="color:#231f2080">تقدم الى </span> {{ $career->name2 }}</h3>
          <div class="row justify-content-lg-center">
            <div class="col-lg-10 col-xl-8">
              <!-- RD Mailform -->
              <form class="rd-mailform_style-1" method="post" action="/career-apply" enctype="multipart/form-data">
        @csrf
        			
			  <input type="hidden" name="jop" value="{{ $career->name }}">
                <div class="form-wrap form-wrap_icon linear-icon-man">
                  <input class="form-input" id="contact-captcha-name" type="text" name="name" required>
                  <label class="form-label rd-input-label" for="contact-captcha-name">Your name</label>
                </div>
                <div class="form-wrap form-wrap_icon linear-icon-envelope">
                  <input class="form-input" id="contact-captcha-email" type="email" name="email" email>
                  <label class="form-label rd-input-label" for="contact-captcha-email">Your e-mail</label>
                </div>
				<div class="form-wrap form-wrap_icon linear-icon-file-add">
                  <input class="form-input" id="contact-captcha-file" type="file" name="cv" required style="padding-left: 120px;">
                  <label class="form-label rd-input-label" for="contact-captcha-file">Your CV</label>
                </div>
                <div class="form-wrap form-wrap_icon linear-icon-telephone">
                  <input class="form-input" id="contact-captcha-phone" type="text" name="phone" numeric required>
                  <label class="form-label rd-input-label" for="contact-captcha-phone">Your phone</label>
                </div>
                <div class="form-wrap form-wrap_icon linear-icon-feather">
                  <textarea class="form-input" id="contact-captcha-message" name="message" required></textarea>
                  <label class="form-label rd-input-label" for="contact-captcha-message">Your message</label>
                </div>
                <button class="button button-primary" type="submit">send</button>
              </form>
            </div>
          </div>
        </div>
      </section>

          @stop