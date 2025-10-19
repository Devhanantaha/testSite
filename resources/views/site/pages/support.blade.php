@extends('site.app')
@section('title', 'Support')
@section('content')
<style>
@font-face{font-family:Poppins-Regular;src:url(../fonts/poppins/Poppins-Regular.ttf)}@font-face{font-family:Poppins-Medium;src:url(../fonts/poppins/Poppins-Medium.ttf)}@font-face{font-family:Poppins-Bold;src:url(../fonts/poppins/Poppins-Bold.ttf)}@font-face{font-family:Poppins-SemiBold;src:url(../fonts/poppins/Poppins-SemiBold.ttf)}*{margin:0;padding:0;box-sizing:border-box}body,html{height:100%;font-family:Poppins-Regular,sans-serif}a{font-family:Poppins-Regular;font-size:14px;line-height:1.7;color:#666;margin:0;transition:all .4s;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s}a:focus{outline:none!important}a:hover{text-decoration:none}h1,h2,h3,h4,h5,h6{margin:0}p{font-family:Poppins-Regular;font-size:14px;line-height:1.7;color:#666;margin:0}ul,li{margin:0;list-style-type:none}input{outline:none;border:none}input[type=number]{-moz-appearance:textfield;appearance:none;-webkit-appearance:none}input[type=number]::-webkit-outer-spin-button,input[type=number]::-webkit-inner-spin-button{-webkit-appearance:none}textarea{outline:none;border:none}textarea:focus,input:focus{border-color:transparent!important}input:focus::-webkit-input-placeholder{color:transparent}input:focus:-moz-placeholder{color:transparent}input:focus::-moz-placeholder{color:transparent}input:focus:-ms-input-placeholder{color:transparent}textarea:focus::-webkit-input-placeholder{color:transparent}textarea:focus:-moz-placeholder{color:transparent}textarea:focus::-moz-placeholder{color:transparent}textarea:focus:-ms-input-placeholder{color:transparent}input::-webkit-input-placeholder{color:#ccc}input:-moz-placeholder{color:#ccc}input::-moz-placeholder{color:#ccc}input:-ms-input-placeholder{color:#ccc}textarea::-webkit-input-placeholder{color:#ccc}textarea:-moz-placeholder{color:#ccc}textarea::-moz-placeholder{color:#ccc}textarea:-ms-input-placeholder{color:#ccc}button{outline:none!important;border:none;background:0 0}button:hover{cursor:pointer}iframe{border:none!important}.container-contact100{width:100%;min-height:100vh;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;flex-wrap:wrap;justify-content:flex-end;align-items:center;background:0 0;position:relative;z-index:1}.contact100-map{position:absolute;z-index:-2;width:calc(100% - 640px);height:100%;top:0;left:0}.wrap-contact100{width:100%;min-height:100vh;background:#fff;border-radius:2px;padding:82px 55px 33px;position:relative}.show-wrap-contact100{visibility:visible;opacity:1}.contact100-form{width:100%;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;flex-wrap:wrap;justify-content:space-between;padding-bottom:68px}.contact100-form-title{display:block;width:100%;font-family:Poppins-Bold;font-size:39px;color:#333;line-height:1.2;text-align:left;padding-bottom:64px}.wrap-input100{width:100%;position:relative;border-bottom:2px solid #dbdbdb;margin-bottom:45px}.label-input100{font-family:Poppins-SemiBold;font-size:18px;color:#999;line-height:1.2;padding-left:2px}.input100{display:block;width:100%;background:0 0;font-family:Poppins-Regular;font-size:22px;color:#555;line-height:1.2;padding:0 2px}.focus-input100{position:absolute;display:block;width:100%;height:100%;top:0;left:0;pointer-events:none}.focus-input100::before{content:"";display:block;position:absolute;bottom:-2px;left:0;width:0;height:2px;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s;background:#df254e;background:-webkit-linear-gradient(45deg,#d5007d,#e53935);background:-o-linear-gradient(45deg,#d5007d,#e53935);background:-moz-linear-gradient(45deg,#d5007d,#e53935);background:linear-gradient(45deg,#d5007d,#e53935)}input.input100{height:50px}textarea.input100{min-height:140px;padding-top:13px;padding-bottom:13px}.input100:focus+.focus-input100::before{width:100%}.has-val.input100+.focus-input100::before{width:100%}.container-contact100-form-btn{width:100%;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;flex-wrap:wrap;justify-content:center}.wrap-contact100-form-btn{display:block;position:relative;z-index:1;border-radius:25px;overflow:hidden}.contact100-form-bgbtn{position:absolute;z-index:-1;width:300%;height:100%;background:#df2351;background:-webkit-linear-gradient(-135deg,#191918,#1a1a18,#e42c32,#ebc2c1);background:-o-linear-gradient(-135deg,#191918,#1a1a18,#e42c32,#ebc2c1);background:-moz-linear-gradient(-135deg,#191918,#1a1a18,#e42c32,#ebc2c1);background:linear-gradient(-135deg,#191918,#1a1a18,#e42c32,#ebc2c1);top:0;left:-100%;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s}.contact100-form-btn{display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;justify-content:center;align-items:center;padding:0 20px;min-width:244px;height:50px;font-family:Poppins-Medium;font-size:16px;color:#fff;line-height:1.2}.wrap-contact100-form-btn:hover .contact100-form-bgbtn{left:0}@media(max-width:576px){.wrap-contact100{padding:82px 15px 33px}}.validate-input{position:relative}.alert-validate::before{content:attr(data-validate);position:absolute;max-width:70%;background-color:#fff;border:1px solid #c80000;border-radius:2px;padding:4px 30px 4px 10px;bottom:calc((100% - 25px)/2);-webkit-transform:translateY(50%);-moz-transform:translateY(50%);-ms-transform:translateY(50%);-o-transform:translateY(50%);transform:translateY(50%);right:2px;pointer-events:none;font-family:Poppins-Medium;color:#c80000;font-size:14px;line-height:1.4;text-align:left;visibility:hidden;opacity:0;-webkit-transition:opacity .4s;-o-transition:opacity .4s;-moz-transition:opacity .4s;transition:opacity .4s}.alert-validate::after{content:"\f06a";font-family:FontAwesome;display:block;position:absolute;color:#c80000;font-size:18px;bottom:calc((100% - 25px)/2);-webkit-transform:translateY(50%);-moz-transform:translateY(50%);-ms-transform:translateY(50%);-o-transform:translateY(50%);transform:translateY(50%);right:8px}.alert-validate:hover:before{visibility:visible;opacity:1}@media(max-width:992px){.alert-validate::before{visibility:visible;opacity:1}}.true-validate::after{content:"\f26b";font-family:Material-Design-Iconic-Font;font-size:22px;color:#00ad5f;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;align-items:center;justify-content:center;position:absolute;bottom:calc((100% - 25px)/2);-webkit-transform:translateY(50%);-moz-transform:translateY(50%);-ms-transform:translateY(50%);-o-transform:translateY(50%);transform:translateY(50%);right:5px}.contact100-more{font-family:Poppins-Medium;font-size:16px;color:#fff;position:fixed;z-index:-1;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;justify-content:center;align-items:center;min-width:212px;height:50px;border-radius:25px;background-color:#39b54a;padding:0 20px;top:50%;left:calc((100% - 640px)/2);-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.contact100-more i{font-size:20px;margin-right:10px}@media(max-width:1200px){.wrap-contact100{width:440px}.contact100-map{width:calc(100% - 440px)}.contact100-more{left:calc((100% - 440px)/2)}}@media(max-width:768px){.wrap-contact100{width:100%}.contact100-map{display:none}.contact100-more{position:absolute;background-color:transparent;color:#39b54a;bottom:0;top:auto;left:50%;z-index:10}}

.faq-section .mb-0 > a {
display: block;
    position: relative;
    background: gainsboro;
    margin: 18px;
    padding: 19px;
    color: #e10005;
}

.faq-section .mb-0 > a:after {
  content: "\f067";
  font-family: "FontAwesome";
  position: absolute;
  right: 20px;
  font-weight: 600;
}
.collapse.in {
    padding: 0 20px;
}

.faq-section .mb-0 > a[aria-expanded="true"]:after {
  content: "\f068";
  font-family: "FontAwesome";
  font-weight: 600;
}

</style>
@if ($local == "ar")
<style>
.faq-section .mb-0 > a:after {
    right: auto;
    left: 50px;
}
.contact100-form-title {
    text-align: right;
}
</style>
@endif

<div class="container-contact100" style="margin-top:120px">
@if (\Session::has('success'))
<div class=" alert alert-success text-center" style="
width: 100%;
">
Thank you for your message , We will reply to you ASAP
</div>
@endif
@if (\Session::has('error'))
<div class=" alert alert-danger text-center" style="
width: 100%;
">
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</div>
@endif

<div class="wrap-contact100" @if ($local == "ar")
	dir="rtl" style="text-align: right"
@endif>
<span class="contact100-form-title">
{{ $headings['contactinq'] }}
</span>
<div class="card">
  <div class="card-body">
    <div class="flex flex-column mb-5 mt-4 faq-section">
      <div class="row">
        <div class="col-md-12">
          <div id="accordion">
            <div class="card">
              <div class="card-header" id="heading-1">
                <h5 class="mb-0">
                  <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                    {{ $headings['engsuport'] }}
                                    </a>
                </h5>
              </div>
              <div id="collapse-1" class="collapse " data-parent="#accordion" aria-labelledby="heading-1">
                <div class="card-body">
                  
<form class="contact100-form validate-form" action="/contactm" method="post" name="eng">
@csrf
<input type="hidden" name="form" value="eng">
<div class="wrap-input100 validate-input" data-validate="Name is required">
<span class="label-input100"> {{ $headings['name'] }} *</span>
<input class="input100" type="text" name="name" placeholder=" {{ $headings['name'] }}..." required>
<span class="focus-input100"></span>
</div>


<div class="wrap-input100 validate-input" data-validate="Name is required">
<span class="label-input100"> {{ $headings['serial'] }} *</span>
<input class="input100" type="text" name="serial" placeholder=" {{ $headings['serial'] }} ..." required>
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" >
<span class="label-input100"> {{ $headings['hospital'] }}*</span>
<input class="input100" type="text" name="co" placeholder=" {{ $headings['hospital'] }}..." required>
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
<span class="label-input100"> {{ $heading['email'] }}</span>
<input class="input100" type="email" name="email" placeholder="{{ $heading['email'] }}..." required>
<span class="focus-input100"></span>
</div>
<div class="wrap-input100">
<span class="label-input100"> {{ $headings['phone'] }} *</span>
<input class="input100" type="text" name="phone" placeholder="{{ $headings['phone'] }} ..." required>
<span class="focus-input100"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Message is required">
<span class="label-input100"> {{ $headings['request'] }} *</span>
<textarea class="input100" name="message" placeholder=" {{ $headings['comments'] }}..."required></textarea>
<span class="focus-input100"></span>
</div>
<div class="container-contact100-form-btn">
 <div class="wrap-contact100-form-btn">
<div class="contact100-form-bgbtn"></div>
<button class="contact100-form-btn">
	{{ $headings['send'] }}
</button>
</div>
</div>
</form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="heading-2">
                <h5 class="mb-0">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
					{{ $headings['salesinq'] }}
                                    </a>
                </h5>
              </div>
              <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                <div class="card-body">
					  <form class="contact100-form validate-form" action="/contactm" method="post">
						@csrf
						
<input type="hidden" name="form" value="sales">
						<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100"> {{ $headings['name'] }} *</span>
						<input class="input100" type="text" name="name" placeholder=" {{ $headings['name'] }}..." required>
						<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<span class="label-input100"> {{ $heading['email'] }}</span>
						<input class="input100" type="email" name="email" placeholder=" {{ $heading['email'] }}..." required>
						<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100">
						<span class="label-input100"> {{ $headings['phone'] }} *</span>
						<input class="input100" type="text" name="phone" placeholder=" {{ $headings['phone'] }}..." required>
						<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100"> {{ $headings['serial'] }} # *</span>
						<input class="input100" type="text" name="serial" placeholder=" {{ $headings['serial'] }} ..." required>
						<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Message is required">
						<span class="label-input100"> {{ $headings['request'] }} *</span>
						<textarea class="input100" name="message" placeholder=" {{ $headings['comments'] }}..."required></textarea>
						<span class="focus-input100"></span>
						</div>
						<div class="container-contact100-form-btn">
						 <div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							{{ $headings['send'] }}
						</button>
						</div>
						</div>
						</form>
                </div>
              </div>
            </div>
			<div class="card">
              <div class="card-header" id="heading-3">
                <h5 class="mb-0">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
					{{ $headings['generalinq'] }}
                                    </a>
                </h5>
              </div>
              <div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                <div class="card-body">
					  <form class="contact100-form validate-form" action="/contactm" method="post">
						@csrf
						
<input type="hidden" name="form" value="general">
						<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100"> {{ $headings['name'] }} *</span>
						<input class="input100" type="text" name="name" placeholder=" {{ $headings['name'] }}..." required>
						<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<span class="label-input100"> {{ $heading['email'] }}</span>
						<input class="input100" type="email" name="email" placeholder=" {{ $heading['email'] }}..." required>
						<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100">
						<span class="label-input100"> {{ $headings['phone'] }} *</span>
						<input class="input100" type="text" name="phone" placeholder=" {{ $headings['phone'] }}..." required>
						<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Message is required">
						<span class="label-input100"> {{ $headings['request'] }} *</span>
						<textarea class="input100" name="message" placeholder=" {{ $headings['comments'] }}..."required></textarea>
						<span class="focus-input100"></span>
						</div>
						<div class="container-contact100-form-btn">
						 <div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							{{ $headings['send'] }}
						</button>
						</div>
						</div>
						</form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>

          @stop