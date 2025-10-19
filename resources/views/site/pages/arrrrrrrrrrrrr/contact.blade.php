@extends('site.appar')
@section('title', 'اتصل بنا')
@section('content')
<section class="section-lg bg-default">
            <div class="container">
              <div class="row row-50">
                <div class="col-md-5 col-lg-4" style="
                direction: rtl;
                text-align: right;
            ">
                  <h3>تفاصيل الاتصال</h3>
                  <ul class="list-xs contact-info">
                    <li>
                      <dl class="list-terms-minimal">
                        <dt>العنوان</dt>
                        <dd>{{ config('settings.address_ar') }}</dd>
                      </dl>
                    </li>
                    <li>
                      <dl class="list-terms-minimal">
                        <dt>تليفون</dt>
                        <dd>
                          <ul class="list-semicolon">
                                                            <li><a href="tel:{{ config('settings.phone') }}">{{ config('settings.phone') }}</a></li>
                                                                <li><a href="tel:{{ config('settings.mobile') }}">{{ config('settings.mobile') }}</a></li>
                                                              </ul>
                        </dd>
                      </dl>
                    </li>
                    <li>
                      <dl class="list-terms-minimal">
                        <dt>البريد الالكترونى</dt>
                        <dd><a href="mailto:{{ config('settings.default_email_address') }}">{{ config('settings.default_email_address') }}</a></dd>
                      </dl>
                    </li>
                    <li>
                      <dl class="list-terms-minimal">
                        <dt>اوقات العمل</dt>
                        <dd>{{ config('settings.work_dayes2') }}</dd>
                      </dl>
                    </li>
                    <li>
                      <ul class="list-inline-sm">
                         <li><a class="icon-sm fa-facebook icon" href="{{ config('settings.social_facebook') }}"></a></li>													                   
                          <li><a class="icon-sm fa-instagram icon" href="{{ config('settings.social_instagram') }}"></a></li>
                           <li><a class="icon-sm fa-youtube icon" href="{{ config('settings.social_youtube') }}"></a></li>	
                             <li><a class="icon-sm fa-linkedin icon" href="{{ config('settings.social_linkedin') }}"></a></li> 
                                         </ul>
                    </li>
                  </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                  <h3 class="text-right">كن على تواصل</h3>
                  <!-- RD Mailform-->
                  <form class="rd-mailform_style-1"  method="post" action="/contactm">
                       @csrf
                       
                            <div class="form-wrap form-wrap_icon linear-icon-man">
                      <input class="form-input" id="contact-name" type="text" name="name" Required>
                      <label class="form-label" for="contact-name">اسمك</label>
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-envelope">
                      <input class="form-input" id="contact-email" type="email" name="email" email Required>
                      <label class="form-label" for="contact-email">بريدك الالكترونى</label>
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-telephone">
                      <input class="form-input" id="contact-phone" type="text" name="phone" Numeric>
                      <label class="form-label" for="contact-phone">تليفونك</label>
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-feather">
                      <textarea class="form-input" id="contact-message" name="message" @Required></textarea>
                      <label class="form-label" for="contact-message">رسالتك</label>
                    </div>
                    <button class="button button-primary" type="submit">أرسل</button>
                  </form>
                </div>
              </div>
            </div>
          </section>
    
@stop