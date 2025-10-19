@extends('site.app')
@section('title', 'Homepage')
@section('content')
<style>
  .owl-theme .owl-nav .owl-next {
    right: 20px;
    left: auto;
    width: 50px;
    height: 50px;
    border-radius: 100%;
    background: #fff;
    border: 1px solid #e1e1e1;
}
.owl-theme .owl-nav .owl-prev {
    left: 20px;
    width: 50px;
    height: 50px;
    border-radius: 100%;
    background: #fff;
    border: 1px solid #e1e1e1;
}
.owl-theme .owl-nav {
    opacity: 0;
    visibility: hidden;
}
.owl-theme .owl-nav >button {
    position: absolute;
    top: 30%;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    z-index: 11;
    height: 30px;
    width: 20px;
    line-height: 30px;
    text-align: right;
    font-size: 0;
    color: #555;
    width: 65px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    background: transparent;
    background-image: initial;
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat-x: initial;
    background-repeat-y: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: transparent;
}
.owl-theme .owl-nav >button:before {
    content: "\f054";
    font-family: 'FontAwesome';
    font-size: 2.1428rem;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    justify-content: center;
    font-size: 18px;
    color: #999;
    line-height: 48px;
}
.owl-theme:hover .owl-nav .owl-prev:before {
    content: "\f053";
}
</style>
@if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
       
<div id="content" class="site-content"><div id="main-content" class="home-content">
<div class="homepage-content">
<div data-elementor-type="wp-page" data-elementor-id="2465" class="elementor elementor-2465" data-elementor-settings="[]">
<div class="elementor-inner">
<div class="elementor-section-wrap">
<section class="elementor-section elementor-top-section elementor-element elementor-element-fcc74c5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="fcc74c5" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ead51db" data-id="ead51db" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-813cfd3 elementor-widget elementor-widget-slider_revolution" data-id="813cfd3" data-element_type="widget" data-widget_type="slider_revolution.default">
<div class="elementor-widget-container">
<div class="wp-block-themepunch-revslider">
<!-- START Slider 1 REVOLUTION SLIDER 6.2.10 --><p class="rs-p-wp-fix"></p>
<rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery" style="background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
<rs-module id="rev_slider_1_1" style="" data-version="6.2.10">
<rs-slides>
@foreach($banners as $banner)
<rs-slide data-key="rs-{{$banner->id}}" data-title="Slide" data-thumb="img/banners/Slider_home1.jpg" data-anim="ei:d;eo:d;s:d;r:0;t:fadefromleft;sl:d;">
<img loading="lazy" src="/uploads/{{$banner->full}}" title="Slider_home1" width="1920" height="930" class="rev-slidebg" data-no-retina>
<!--
--><rs-layer
id="slider-{{$banner->id}}-slide-{{$banner->id}}-layer-1" 
class="custom_font"
data-type="text"
data-rsp_ch="on"
data-xy="xo:292px,292px,126px,37px;y:t,t,t,m;yo:324px,324px,300px,0;"
data-text="w:normal;s:150,150,85,80;l:150,150,85,80;ls:-3px,-3px,0px,0px;"
data-dim="w:447px,447px,288px,auto;h:131px,131px,auto,auto;"
data-frame_0="x:-50,-50,-20px,-15px;y:0,0,0px,0px;"
data-frame_1="x:0,0,0px,0px;y:0,0,0px,0px;st:500;sp:2000;"
data-frame_999="o:0;st:w;sR:8000;"
style="z-index:5;font-family:Roboto;"
>{{ $banner->title }} 
</rs-layer>
<rs-layer
id="slider-{{$banner->id}}-slide-{{$banner->id}}-layer-2" 
class="custom_font"
data-type="text"
data-xy="xo:297px,297px,130px,30px;yo:495px,495px,400px,291px;"
data-text="w:normal;s:16,16,14,14;l:24;"
data-dim="w:auto,auto,auto,#2/3#;"
data-vbility="t,t,t,f"
data-rsp_bd="off"
data-frame_0="x:-50;"
data-frame_1="st:1000;sp:2000;sR:700;"
data-frame_999="o:0;st:w;sR:7300;"
style="z-index:10;font-family:Roboto;"
>
{!! $banner->name !!} 
</rs-layer><!--
--><rs-layer
id="slider-{{$banner->id}}-slide-{{$banner->id}}-layer-3" 
class="custom_font rev-btn"
data-type="button"
data-color="#000000"
data-xy="xo:298px,298px,130px,40px;y:t,t,t,m;yo:654px,654px,510px,120px;"
data-text="w:nowrap;s:16,16,14,16;l:60,60,60,48;fw:500;a:center;"
data-dim="w:auto,auto,200px,150px;minw:200px,200px,none,none;minh:60px,60px,none,none;"
data-wrpcls="button-home1"
data-rsp_bd="off"
data-padding="r:20,20,8,5;l:20,20,8,5;"
data-frame_0="x:-50;"
data-frame_1="st:1500;sp:2000;"
data-frame_999="o:0;st:w;sR:6950;"
data-frame_hover="c:#fff;bgc:#000;bor:0px,0px,0px,0px;"
style="z-index:11;background-color:rgba(255,255,255,1);font-family:Roboto;"
>Explore 
</rs-layer><!--
-->						</rs-slide>
@endforeach
</rs-slides>
</rs-module>
<script type="text/javascript">
setREVStartSize({c: 'rev_slider_1_1',rl:[1240,1240,778,600],el:[930,930,960,720],gw:[1920,1920,778,600],gh:[930,930,960,720],type:'standard',justify:'',layout:'fullwidth',mh:"0"});
var	revapi1,
tpj;
jQuery(function() {
tpj = jQuery;
revapi1 = tpj("#rev_slider_1_1")
if(revapi1==undefined || revapi1.revolution == undefined){
revslider_showDoubleJqueryError("rev_slider_1_1");
}else{
revapi1.revolution({
sliderLayout:"fullwidth",
visibilityLevels:"1240,1240,778,600",
gridwidth:"1920,1920,778,600",
gridheight:"930,930,960,720",
spinner:"spinner0",
perspective:600,
perspectiveType:"global",
editorheight:"930,496,960,720",
responsiveLevels:"1240,1240,778,600",
progressBar:{disableProgressBar:true},
navigation: {
onHoverStop:false,
bullets: {
enable:true,
tmp:"",
style:"agota",
h_align:"right",
v_align:"center",
h_offset:60,
v_offset:0,
direction:"vertical",
container:"layergrid"
}
},
fallbacks: {
allowHTML5AutoPlayOnAndroid:true
},
});
}
});
</script>
<script>
var htmlDivCss = unescape("%23rev_slider_1_1_wrapper%20.agota%20.tp-bullet%20%7B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background-color%3A%20%23ffffff%3B%0A%20%20width%3A%208px%3B%0A%20%20height%3A%208px%3B%0A%20%20opacity%3A%200.1%3B%0A%20%20position%3A%20relative%3B%0A%7D%0A%0A%23rev_slider_1_1_wrapper%20.agota%20.tp-bullet.selected%20%7B%0A%20%20%20%20overflow%3Ahidden%3B%0A%20%20%20%20border-radius%3A50%25%3B%0A%20%20%20%20width%3A14px%3B%0A%20%20%20%20height%3A14px%3B%0A%20%20%20%20background-color%3A%20rgba%280%2C%200%2C%200%2C%200%29%3B%0A%20%20%20%20box-shadow%3A%20inset%200%200%200%202px%20%23ffffff%3B%0A%20%20%20%20-webkit-transition%3A%20background%200.3s%20ease%3B%0A%20%20%20%20transition%3A%20background%200.3s%20ease%3B%0A%20%20%20%20position%3Arelative%3B%0A%20%20%20%20opacity%3A%201%3B%0A%20%20%20%20left%3A%20-3px%21important%3B%0A%7D%0A%23rev_slider_1_1_wrapper%20.agota%20.tp-bullet%3Aafter%20%7B%0A%20%20content%3A%20%27%20%27%3B%0A%20%20position%3A%20absolute%3B%0A%20%20bottom%3A%200%3B%0A%20%20height%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20background-color%3A%20%23ffffff%3B%0A%20%20box-shadow%3A%200%200%201px%20%23ffffff%3B%0A%20%20-webkit-transition%3A%20height%200.3s%20ease%3B%0A%20%20transition%3A%20height%200.3s%20ease%3B%0A%7D%0A%23rev_slider_1_1_wrapper%20.agota%20.tp-bullet.selected%3Aafter%20%7B%0A%20%20%0A%7D%0A%0A");
var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
if(htmlDiv) {
htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
}else{
var htmlDiv = document.createElement('div');
htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
}
</script>
<script>
var htmlDivCss = unescape("%0A%0A%23rev_slider_1_1%5Bdata-slideactive%3D%22rs-3%22%5D%20.agota%20.tp-bullet.selected%7B%0Awidth%3A%2014px%20%21important%3B%0Aheight%3A%2014px%20%21important%3B%0A%7D%0A%0A");
var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
if(htmlDiv) {
htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
}else{
var htmlDiv = document.createElement('div');
htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
}
</script>
</rs-module-wrap>
<!-- END REVOLUTION SLIDER -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-a8954bc banner-body elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a8954bc" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-extended">
<div class="elementor-row">
@foreach($featuredcat as $fcat)
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-8c3fbee" data-id="8c3fbee" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-46eb311 image-scale elementor-widget elementor-widget-image" data-id="46eb311" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="767" height="929" src="{{ asset('storage/'.$fcat->image) }}" class="attachment-large size-large" alt="" loading="lazy" />											</div>
</div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-9e7b1a9 banner-absolute align-nomal elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="9e7b1a9" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6266381" data-id="6266381" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-5555aca font-15 elementor-widget elementor-widget-text-editor" data-id="5555aca" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p>{{$fcat->name}}</p></div>
</div>
</div>
<div class="elementor-element elementor-element-3ae98cd elementor-align-left button-banner elementor-widget elementor-widget-button" data-id="3ae98cd" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="{{ route('category.show2', $fcat->slug) }}/en" class="elementor-button-link elementor-button elementor-size-xs" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Explore Items</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-f36cab4 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f36cab4" data-element_type="section">
<div class="elementor-container elementor-column-gap-extended">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-883da97" data-id="883da97" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-6351659 product-sellers elementor-invisible elementor-widget elementor-widget-specifyproducts" data-id="6351659" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="specifyproducts.default">
<div class="elementor-widget-container">
<div class="woocommerce">
<h3 class="vc_widget_title vc_products_title  center">
<span>Featured Products</span>
</h3>
<div class="widget-sub-title  center">
<p><br />
</p>
</div>
<div id="products-element-VvVVZ" class="inner-content">
<div class="products-block shop-products products grid-view">
<div class="row">
@foreach($featuredpro as $product)
<!-- Product Item -->
<div class="item-col col-lg-3 col-md-4 col-sm-6 col-xs-12 product " data-wow-duration="0.5s" data-wow-delay="100ms">
<div class="product-wrapper item-box-layout style_1">
<div class="list-col4">
<div class="product-image">
<a href="/product/{{ $product->slug  }}/en" title="product">
<img width="400" height="508" src="{{ asset('storage/'.$product['images']->first()['thumbnail']) }}" class="primary_image" alt="" loading="lazy"/>
</a>
<div class="item-buttons">
    <div class="button-switch">
        <p class="woocommerce @if($product->attribs) select_options @else add_to_cart_inline @endif">
            <a   @if($product->attribs) href="/product/{{ $product->slug }}/en" @else href="#" @endif class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-price="{{ $product->sale_price > 0 ? $product->sale_price : $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" rel="nofollow">Add to cart</a>
        </p>
    </div>
    <div class="quickviewbtn">
        <a class="detail-link quickview"
        id="compareadd" rel="nofollow" type="submit" data-name ="{{$product->name}}" data-price="{{ $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" 
         title="add {{$product->name}} to Compare">Compare</a>
    </div>
    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-5550  wishlist-fragment on-first-load" >
        <!-- ADD TO WISHLIST -->
        <div class="yith-wcwl-add-button">
            <a href="#" rel="nofollow" 
            id="wishadd" data-name ="{{$product->name}}" data-price="{{ $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" 
            class="add_to_wishlist single_add_to_wishlist" title="Add to wishlist">
                <i class="yith-wcwl-icon fa fa-heart-o"></i>
                <span>Add to wishlist</span>
            </a>
        </div>
    </div>
    <div class="rfq" >
        <!-- ADD TO WISHLIST -->
        <div class="rfq">
            <a href="#" rel="nofollow" 
            id="rfqadd" data-name ="{{$product->name}}" data-price="{{ $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" 
             class="add_to_wishlist single_add_to_wishlist" title="Add to RFQ">
               
                <span>Add to RFQ</span>
            </a>
        </div>
    </div>
</div>
<div class="deals-countdown">
<span class="countdown-row">	
<span class="countdown-section">
<span class="countdown-val days_left">201</span>
<span class="countdown-label">Days</span>
</span>
<span class="countdown-section">
<span class="countdown-val hours_left">16</span>
<span class="countdown-label">Hrs</span>
</span>
<span class="countdown-section">
<span class="countdown-val mins_left">4</span>
<span class="countdown-label">Mins</span>
</span>
<span class="countdown-section">
<span class="countdown-val secs_left">41</span>
<span class="countdown-label">Secs</span>
</span>
</span>
</div>			</div>
</div>
<span class="onsale">Sale!</span>
<div class="list-col8">
<div class="gridview">
<h3 class="product-name">
<a href="/product/{{$product->slug}}/en">Form Armchair Walnut Base</a>
</h3>
<div class="rating-price">
<div class="price"><del><span class="woocommerce-Price-amount amount"><bdi><span >&#36;</span>829.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="">&#36;</span>799.00</bdi></span></ins></div>
</div>
</div>
</div>
</div>		</div>

<!-- End Product Item -->
@endforeach
</div>
</div>				</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-eb797de elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="eb797de" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">

@foreach($featuredcol as $fcol)
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-cb2f3d0" >
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-2001e13 image-scale elementor-widget elementor-widget-image" >
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="915" height="450" src="{{ asset('storage/'.$fcol->image) }}" class="attachment-large size-large" alt="" loading="lazy" />											</div>
</div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-29df666 banner-absolute left-15 elementor-section-full_width elementor-section-height-default elementor-section-height-default">
<div class="elementor-container elementor-column-gap-extended">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6744579" >
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-ec15d6f elementor-widget elementor-widget-text-editor" >
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p>Ends Today</p></div>
</div>
</div>
<div class="elementor-element elementor-element-def706b elementor-widget elementor-widget-text-editor" >
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p>Elements Of Style</p></div>
</div>
</div>
<div class="elementor-element elementor-element-edd2af8 elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-text-editor" >
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p>Lorem ipsum dolor sit amet consectetur</p></div>
</div>
</div>
<div class="elementor-element elementor-element-e9d1018 button-banner elementor-widget elementor-widget-button" data-id="e9d1018" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Explore Items</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>

@endforeach
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-eac927e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="eac927e" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-02eaea1" data-id="02eaea1" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-2c45ef8 font-14 elementor-widget elementor-widget-specifyproducts" data-id="2c45ef8" data-element_type="widget" data-widget_type="specifyproducts.default">
<div class="elementor-widget-container">
<div class="woocommerce">
<h3 class="vc_widget_title vc_products_title  center">
<span>Sale products</span>
</h3>
<div class="widget-sub-title  center">
<p></p>
</div>
<div id="products-element-E2Ryl" class="inner-content">
<div class="products-block shop-products products grid-view">
<div data-dots="false" data-nav="true" data-owl="slide" data-ow-rtl="false" data-bigdesk="4" data-desksmall="3" data-bigtablet="3" data-tabletsmall="2" data-mobile="1" data-tablet="2" data-margin="20" data-item-slide="4" data-autoplay="1" data-playtimeout="5000" data-speed="250"  class="owl-carousel owl-theme products-slide">
@foreach($sale_products as $sale_pr)
<div class="product " data-wow-duration="0.5s" data-wow-delay="100ms">
<div class="product-wrapper item-box-layout style_1">
<div class="list-col4">
<div class="product-image">
<a href="/product/{{ $sale_pr->slug  }}/en" title="Form Armchair Walnut Base">
<img width="400" height="508" src="{{ asset('storage/'.$sale_pr['images']->first()['thumbnail']) }}" class="primary_image" alt="" loading="lazy"  />
				</a>
        <div class="item-buttons">
            <div class="button-switch">
                <p class="woocommerce @if($sale_pr->attribs) select_options @else add_to_cart_inline @endif">
                    <a   @if($sale_pr->attribs) href="/product/{{ $sale_pr->slug }}/en" @else href="#" @endif class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-price="{{ $sale_pr->sale_price > 0 ? $sale_pr->sale_price : $sale_pr->price }}" data-quantity="1" data-product_id="{{$sale_pr->id}}" rel="nofollow">Add to cart</a>
                </p>
            </div>
            <div class="quickviewbtn">
                <a class="detail-link quickview"
                id="compareadd" rel="nofollow" type="submit" data-name ="{{$sale_pr->name}}" data-price="{{ $sale_pr->price }}" data-quantity="1" data-product_id="{{$sale_pr->id}}" 
                 title="add {{$sale_pr->name}} to Compare">Compare</a>
            </div>
            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-5550  wishlist-fragment on-first-load" >
                <!-- ADD TO WISHLIST -->
                <div class="yith-wcwl-add-button">
                    <a href="#" rel="nofollow" 
                    id="wishadd" data-name ="{{$sale_pr->name}}" data-price="{{ $sale_pr->price }}" data-quantity="1" data-product_id="{{$sale_pr->id}}" 
                    class="add_to_wishlist single_add_to_wishlist" title="Add to wishlist">
                        <i class="yith-wcwl-icon fa fa-heart-o"></i>
                        <span>Add to wishlist</span>
                    </a>
                </div>
            </div>
            <div class="rfq" >
                <!-- ADD TO WISHLIST -->
                <div class="rfq">
                    <a href="#" rel="nofollow" 
                    id="rfqadd" data-name ="{{$product->name}}" data-price="{{ $product->price }}" data-quantity="1" data-product_id="{{$product->id}}" 
                     class="add_to_wishlist single_add_to_wishlist" title="Add to RFQ">
                       
                        <span>Add to RFQ</span>
                    </a>
                </div>
            </div>
        </div>
<div class="deals-countdown">
<span class="countdown-row">	
<span class="countdown-section">
<span class="countdown-val days_left">0</span>
<span class="countdown-label">Days</span>
</span>
<span class="countdown-section">
<span class="countdown-val hours_left">0</span>
<span class="countdown-label">Hrs</span>
</span>
<span class="countdown-section">
<span class="countdown-val mins_left">1</span>
<span class="countdown-label">Mins</span>
</span>
<span class="countdown-section">
<span class="countdown-val secs_left">40</span>
<span class="countdown-label">Secs</span>
</span>
</span>
</div>			</div>
</div>
<span class="onsale">Sale!</span>
<div class="list-col8">
<div class="gridview">
<h3 class="product-name">
<a href="#/form-armchair-walnut-base/">{{ $sale_pr->name }} </a>
</h3>
<div class="rating-price">
<div class="price"><del><span class="woocommerce-Price-amount amount"><bdi><span class="">&#36;</span>829.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="">&#36;</span>799.00</bdi></span></ins></div>
</div>
</div>
</div>
</div>						</div>

@endforeach
</div>
</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
if (typeof initOwl !== "undefined") initOwl($('#products-element-E2Ryl [data-owl="slide"]'));
});
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3d6d7ad elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3d6d7ad" data-element_type="section">
<div class="elementor-container elementor-column-gap-extended">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8400942" data-id="8400942" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-ec6412a elementor-widget elementor-widget-blogposts" data-id="ec6412a" data-element_type="widget" data-widget_type="blogposts.default">
<div class="elementor-widget-container">
<div class="blog-posts style_1">
<h3 class="vc_widget_title vc_blog_title  center"><span>Our Blog Posts</span></h3>
<div class="widget-sub-title  center">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.</div>
<div class="owl-carousel owl-theme" data-dots="false" data-nav="true" data-owl="slide" data-ow-rtl="false" data-bigdesk="3" data-desksmall="3" data-tabletsmall="1" data-bigtablet="2" data-mobile="1" data-tablet="2" data-margin="30" data-item-slide="3" data-autoplay="" data-playtimeout="5000" data-speed="250" >
<div class="item-post post-5415 " data-wow-delay="100ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/sunt-in-culpa-qui-officia-deserunt/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/14-2-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/14-2-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/14-2-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/sunt-in-culpa-qui-officia-deserunt/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/sunt-in-culpa-qui-officia-deserunt/">Sunt In Qui Officia Deserunt</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/sunt-in-culpa-qui-officia-deserunt/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5479 " data-wow-delay="200ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/how-wear-the-summer-stlye/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/2-3-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/2-3-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/2-3-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/how-wear-the-summer-stlye/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/how-wear-the-summer-stlye/">How Wear The Summer Stlye</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/how-wear-the-summer-stlye/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5476 " data-wow-delay="300ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/men-wearing-canvas-boots/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/11-3-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/11-3-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/11-3-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/men-wearing-canvas-boots/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/men-wearing-canvas-boots/">Men Wearing Canvas Boots</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/men-wearing-canvas-boots/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5473 " data-wow-delay="400ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/miranda-skoczek-homestay/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/4-4-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/4-4-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/4-4-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/miranda-skoczek-homestay/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/miranda-skoczek-homestay/">Miranda Skoczek Homestay</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/miranda-skoczek-homestay/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5470 " data-wow-delay="500ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/girl-with-hat-in-the-beach/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/13-2-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/13-2-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/13-2-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/girl-with-hat-in-the-beach/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/girl-with-hat-in-the-beach/">Girl With Hat In The Beach</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/girl-with-hat-in-the-beach/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5467 " data-wow-delay="600ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/sunglasses-to-wear-this-summer/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/12-2-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/12-2-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/12-2-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/sunglasses-to-wear-this-summer/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/sunglasses-to-wear-this-summer/">Sunglasses To Wear This Summer</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/sunglasses-to-wear-this-summer/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5464 " data-wow-delay="700ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/romantic-letters-decoration/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/7-4-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/7-4-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/7-4-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/romantic-letters-decoration/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/romantic-letters-decoration/">Romantic Letters Decoration</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/romantic-letters-decoration/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5459 " data-wow-delay="800ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/the-three-best-herbal-teas/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/8-3-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/8-3-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/8-3-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/the-three-best-herbal-teas/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/the-three-best-herbal-teas/">The three best herbal teas</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/the-three-best-herbal-teas/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5456 " data-wow-delay="900ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/simple-easy-diy-flower-deco/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/9-3-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/9-3-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/9-3-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/simple-easy-diy-flower-deco/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/simple-easy-diy-flower-deco/">Simple &#038; Easy DIY Flower Deco</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/simple-easy-diy-flower-deco/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
<div class="item-post post-5452 " data-wow-delay="1000ms" data-wow-duration="0.5s">
<div class="post-wrapper">
<div class="post-thumb">
<a href="#/take-a-look-at-the-most-photo/"><img width="669" height="435" src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/10-3-669x435.jpg" class="attachment-agota-post-thumb size-agota-post-thumb wp-post-image" alt="" loading="lazy" srcset="https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/10-3-669x435.jpg 669w, https://demo.lion-themes.net/agota/wp-content/uploads/2020/06/10-3-1338x870.jpg 1338w" sizes="(max-width: 669px) 100vw, 669px" /></a>
</div>
<div class="post-info">
<div class="categories-list">
</div>
<ul class="post-entry-data">
<li class="post-date"><span>Post date:</span> <a href="#/take-a-look-at-the-most-photo/">26 Jun, 2020</a></li>
</ul>						
<h3 class="post-title"><a href="#/take-a-look-at-the-most-photo/">Take A Look At The Most Photo</a></h3>
<div class="post-excerpt">
<p>It is accompanied by a case that can contain up to three different diffusers and can be used for dry …</p>								</div>
<div class="readmore-excerpt">
<a class="readmore" href="#/take-a-look-at-the-most-photo/"><span class="readmore-text">Continue Reading</span></a>
</div>
</div>
</div>
</div>
</div>
</div> 			<script type="text/javascript">
jQuery(document).ready(function($) {
if (typeof initOwl !== "undefined") initOwl($('.blog-posts [data-owl="slide"]'));
});
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-3ce7ce4 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3ce7ce4" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-aafda28" data-id="aafda28" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-45d197a elementor-widget elementor-widget-ourbrands" data-id="45d197a" data-element_type="widget" data-widget_type="ourbrands.default">
<div class="elementor-widget-container">
<div class="brand_widget ">
<div data-owl="slide" data-ow-rtl="false" data-data-desksmall="4" data-tabletsmall="2" data-bigtablet="4" data-mobile="1" data-tablet="3" data-margin="20" data-item-slide="5" data-autoplay="false" data-nav="true" data-dots="true" data-playtimeout="5000" data-speed="250"  class="owl-carousel owl-theme brands-slide">														<div class="brand_item  " data-wow-delay="100ms" data-wow-duration="0.5s">
<a href="" title="">
<img src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/07/logo-about.png" height="48" width="103" alt="brand image" />
</a>
</div>
<div class="brand_item  " data-wow-delay="200ms" data-wow-duration="0.5s">
<a href="" title="">
<img src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/07/logo-about3.png" height="48" width="103" alt="brand image"  />
</a>
</div>
<div class="brand_item  " data-wow-delay="300ms" data-wow-duration="0.5s">
<a href="" title="">
<img src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/07/logo-about4.png" height="48" width="103" alt="brand image"  />
</a>
</div>
<div class="brand_item  " data-wow-delay="400ms" data-wow-duration="0.5s">
<a href="" title="">
<img src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/07/logo-about5.png" height="48" width="103" alt="brand image"  />
</a>
</div>
<div class="brand_item  " data-wow-delay="500ms" data-wow-duration="0.5s">
<a href="" title="">
<img src="https://demo.lion-themes.net/agota/wp-content/uploads/2020/07/logo-about2-1.png" height="48" width="103" alt="brand image" />
</a>
</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
if (typeof initOwl !== "undefined") initOwl($('.brand_widget [data-owl="slide"]'));
});
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-7349e1a elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7349e1a" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e699a47" data-id="e699a47" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-e9b4f6f elementor-widget elementor-widget-shortcode" data-id="e9b4f6f" data-element_type="widget" data-widget_type="shortcode.default">
<div class="elementor-widget-container">
<div class="elementor-shortcode">
<div id="sb_instagram" class="sbi sbi_col_6  sbi_width_resp" style="width: 100%;" data-feedid="sbi_17841439767250203#6" data-res="auto" data-cols="6" data-num="6" data-shortcode-atts="{&quot;cols&quot;:&quot;6&quot;,&quot;num&quot;:&quot;6&quot;}" >
<div id="sbi_images" >
<div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_17858956478030898" data-date="1595235742">
<div class="sbi_photo_wrap">
<a class="sbi_photo" href="https://www.instagram.com/p/CC2684MDwX2/" target="_blank" rel="noopener nofollow" data-full-res="https://scontent.cdninstagram.com/v/t51.29350-15/110830401_2194650860679102_3642885314485216718_n.jpg?_nc_cat=105&#038;ccb=1-3&#038;_nc_sid=8ae9d6&#038;_nc_ohc=vBasCjIztlYAX_-CNOF&#038;_nc_ht=scontent.cdninstagram.com&#038;oh=e9f3b849cebf2c56bbe1caf9d6d91db3&#038;oe=606AFE29" data-img-src-set="{&quot;d&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110830401_2194650860679102_3642885314485216718_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=vBasCjIztlYAX_-CNOF&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=e9f3b849cebf2c56bbe1caf9d6d91db3&amp;oe=606AFE29&quot;,&quot;150&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110830401_2194650860679102_3642885314485216718_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=vBasCjIztlYAX_-CNOF&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=e9f3b849cebf2c56bbe1caf9d6d91db3&amp;oe=606AFE29&quot;,&quot;320&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110830401_2194650860679102_3642885314485216718_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=vBasCjIztlYAX_-CNOF&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=e9f3b849cebf2c56bbe1caf9d6d91db3&amp;oe=606AFE29&quot;,&quot;640&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110830401_2194650860679102_3642885314485216718_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=vBasCjIztlYAX_-CNOF&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=e9f3b849cebf2c56bbe1caf9d6d91db3&amp;oe=606AFE29&quot;}">
<span class="sbi-screenreader">Instagram post 17858956478030898</span>
<img src="https://demo.lion-themes.net/agota/wp-content/plugins/instagram-feed/img/placeholder.png" width="1000" height="560" alt="Instagram post 17858956478030898">
</a>
</div>
</div><div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_17870743927852843" data-date="1595235732">
<div class="sbi_photo_wrap">
<a class="sbi_photo" href="https://www.instagram.com/p/CC267lND-L6/" target="_blank" rel="noopener nofollow" data-full-res="https://scontent.cdninstagram.com/v/t51.29350-15/115352249_3339049732844134_445162109960195729_n.jpg?_nc_cat=104&#038;ccb=1-3&#038;_nc_sid=8ae9d6&#038;_nc_ohc=3lrEDAe2PUYAX9ZMQnY&#038;_nc_ht=scontent.cdninstagram.com&#038;oh=5b42120cee956cb0cfb5e2f4c8a3f9c7&#038;oe=606EAE3E" data-img-src-set="{&quot;d&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/115352249_3339049732844134_445162109960195729_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=3lrEDAe2PUYAX9ZMQnY&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=5b42120cee956cb0cfb5e2f4c8a3f9c7&amp;oe=606EAE3E&quot;,&quot;150&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/115352249_3339049732844134_445162109960195729_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=3lrEDAe2PUYAX9ZMQnY&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=5b42120cee956cb0cfb5e2f4c8a3f9c7&amp;oe=606EAE3E&quot;,&quot;320&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/115352249_3339049732844134_445162109960195729_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=3lrEDAe2PUYAX9ZMQnY&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=5b42120cee956cb0cfb5e2f4c8a3f9c7&amp;oe=606EAE3E&quot;,&quot;640&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/115352249_3339049732844134_445162109960195729_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=3lrEDAe2PUYAX9ZMQnY&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=5b42120cee956cb0cfb5e2f4c8a3f9c7&amp;oe=606EAE3E&quot;}">
<span class="sbi-screenreader">Instagram post 17870743927852843</span>
<img src="https://demo.lion-themes.net/agota/wp-content/plugins/instagram-feed/img/placeholder.png" width="1000" height="560" alt="Instagram post 17870743927852843">
</a>
</div>
</div><div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_18155642524040741" data-date="1595235718">
<div class="sbi_photo_wrap">
<a class="sbi_photo" href="https://www.instagram.com/p/CC2653UjKNu/" target="_blank" rel="noopener nofollow" data-full-res="https://scontent.cdninstagram.com/v/t51.29350-15/109834226_114477633677372_9146283610259366707_n.jpg?_nc_cat=104&#038;ccb=1-3&#038;_nc_sid=8ae9d6&#038;_nc_ohc=VSPCKql0LdkAX-RX1Ub&#038;_nc_ht=scontent.cdninstagram.com&#038;oh=9a9cc3e0ff935adc778a7c4264284558&#038;oe=606D7FB2" data-img-src-set="{&quot;d&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109834226_114477633677372_9146283610259366707_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=VSPCKql0LdkAX-RX1Ub&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=9a9cc3e0ff935adc778a7c4264284558&amp;oe=606D7FB2&quot;,&quot;150&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109834226_114477633677372_9146283610259366707_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=VSPCKql0LdkAX-RX1Ub&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=9a9cc3e0ff935adc778a7c4264284558&amp;oe=606D7FB2&quot;,&quot;320&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109834226_114477633677372_9146283610259366707_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=VSPCKql0LdkAX-RX1Ub&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=9a9cc3e0ff935adc778a7c4264284558&amp;oe=606D7FB2&quot;,&quot;640&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109834226_114477633677372_9146283610259366707_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=VSPCKql0LdkAX-RX1Ub&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=9a9cc3e0ff935adc778a7c4264284558&amp;oe=606D7FB2&quot;}">
<span class="sbi-screenreader">Instagram post 18155642524040741</span>
<img src="https://demo.lion-themes.net/agota/wp-content/plugins/instagram-feed/img/placeholder.png" width="1000" height="560" alt="Instagram post 18155642524040741">
</a>
</div>
</div><div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_18003222928293930" data-date="1595235706">
<div class="sbi_photo_wrap">
<a class="sbi_photo" href="https://www.instagram.com/p/CC264cnj7fa/" target="_blank" rel="noopener nofollow" data-full-res="https://scontent.cdninstagram.com/v/t51.29350-15/110436042_581821456037925_4455251342909312327_n.jpg?_nc_cat=104&#038;ccb=1-3&#038;_nc_sid=8ae9d6&#038;_nc_ohc=7yR774AOIpMAX9LXEyv&#038;_nc_ht=scontent.cdninstagram.com&#038;oh=8a5b6a910d02762aafec7ba9befabdf5&#038;oe=606C8935" data-img-src-set="{&quot;d&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110436042_581821456037925_4455251342909312327_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=7yR774AOIpMAX9LXEyv&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=8a5b6a910d02762aafec7ba9befabdf5&amp;oe=606C8935&quot;,&quot;150&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110436042_581821456037925_4455251342909312327_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=7yR774AOIpMAX9LXEyv&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=8a5b6a910d02762aafec7ba9befabdf5&amp;oe=606C8935&quot;,&quot;320&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110436042_581821456037925_4455251342909312327_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=7yR774AOIpMAX9LXEyv&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=8a5b6a910d02762aafec7ba9befabdf5&amp;oe=606C8935&quot;,&quot;640&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110436042_581821456037925_4455251342909312327_n.jpg?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=7yR774AOIpMAX9LXEyv&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=8a5b6a910d02762aafec7ba9befabdf5&amp;oe=606C8935&quot;}">
<span class="sbi-screenreader">Instagram post 18003222928293930</span>
<img src="https://demo.lion-themes.net/agota/wp-content/plugins/instagram-feed/img/placeholder.png" width="1000" height="560" alt="Instagram post 18003222928293930">
</a>
</div>
</div><div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_17944680850368925" data-date="1595235690">
<div class="sbi_photo_wrap">
<a class="sbi_photo" href="https://www.instagram.com/p/CC262eij_kJ/" target="_blank" rel="noopener nofollow" data-full-res="https://scontent.cdninstagram.com/v/t51.29350-15/109210404_149676350071887_1200669150548748628_n.jpg?_nc_cat=101&#038;ccb=1-3&#038;_nc_sid=8ae9d6&#038;_nc_ohc=hxKy7za3Bh0AX_p7I9V&#038;_nc_ht=scontent.cdninstagram.com&#038;oh=d4aee878a9a1f6b5a43bc703735eff23&#038;oe=606B7832" data-img-src-set="{&quot;d&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109210404_149676350071887_1200669150548748628_n.jpg?_nc_cat=101&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=hxKy7za3Bh0AX_p7I9V&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=d4aee878a9a1f6b5a43bc703735eff23&amp;oe=606B7832&quot;,&quot;150&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109210404_149676350071887_1200669150548748628_n.jpg?_nc_cat=101&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=hxKy7za3Bh0AX_p7I9V&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=d4aee878a9a1f6b5a43bc703735eff23&amp;oe=606B7832&quot;,&quot;320&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109210404_149676350071887_1200669150548748628_n.jpg?_nc_cat=101&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=hxKy7za3Bh0AX_p7I9V&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=d4aee878a9a1f6b5a43bc703735eff23&amp;oe=606B7832&quot;,&quot;640&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/109210404_149676350071887_1200669150548748628_n.jpg?_nc_cat=101&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=hxKy7za3Bh0AX_p7I9V&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=d4aee878a9a1f6b5a43bc703735eff23&amp;oe=606B7832&quot;}">
<span class="sbi-screenreader">Instagram post 17944680850368925</span>
<img src="https://demo.lion-themes.net/agota/wp-content/plugins/instagram-feed/img/placeholder.png" width="1000" height="560" alt="Instagram post 17944680850368925">
</a>
</div>
</div><div class="sbi_item sbi_type_image sbi_new sbi_transition" id="sbi_17874773161751492" data-date="1595235677">
<div class="sbi_photo_wrap">
<a class="sbi_photo" href="https://www.instagram.com/p/CC26047jlat/" target="_blank" rel="noopener nofollow" data-full-res="https://scontent.cdninstagram.com/v/t51.29350-15/110046863_114117943547428_8538575569122608200_n.jpg?_nc_cat=105&#038;ccb=1-3&#038;_nc_sid=8ae9d6&#038;_nc_ohc=YOy5tq4vpJkAX8gZ6ZJ&#038;_nc_ht=scontent.cdninstagram.com&#038;oh=51389766e3941fe8f70bfc3394b4adc6&#038;oe=606E7D8D" data-img-src-set="{&quot;d&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110046863_114117943547428_8538575569122608200_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=YOy5tq4vpJkAX8gZ6ZJ&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=51389766e3941fe8f70bfc3394b4adc6&amp;oe=606E7D8D&quot;,&quot;150&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110046863_114117943547428_8538575569122608200_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=YOy5tq4vpJkAX8gZ6ZJ&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=51389766e3941fe8f70bfc3394b4adc6&amp;oe=606E7D8D&quot;,&quot;320&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110046863_114117943547428_8538575569122608200_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=YOy5tq4vpJkAX8gZ6ZJ&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=51389766e3941fe8f70bfc3394b4adc6&amp;oe=606E7D8D&quot;,&quot;640&quot;:&quot;https:\/\/scontent.cdninstagram.com\/v\/t51.29350-15\/110046863_114117943547428_8538575569122608200_n.jpg?_nc_cat=105&amp;ccb=1-3&amp;_nc_sid=8ae9d6&amp;_nc_ohc=YOy5tq4vpJkAX8gZ6ZJ&amp;_nc_ht=scontent.cdninstagram.com&amp;oh=51389766e3941fe8f70bfc3394b4adc6&amp;oe=606E7D8D&quot;}">
<span class="sbi-screenreader">Instagram post 17874773161751492</span>
<img src="https://demo.lion-themes.net/agota/wp-content/plugins/instagram-feed/img/placeholder.png" width="1000" height="560" alt="Instagram post 17874773161751492">
</a>
</div>
</div>    </div>
<div id="sbi_load">
</div>
<span class="sbi_resized_image_data" data-feed-id="sbi_17841439767250203#6" data-resized="{&quot;17858956478030898&quot;:{&quot;id&quot;:&quot;110830401_2194650860679102_3642885314485216718_n&quot;,&quot;ratio&quot;:&quot;1.00&quot;,&quot;sizes&quot;:{&quot;full&quot;:640,&quot;low&quot;:320}},&quot;17870743927852843&quot;:{&quot;id&quot;:&quot;115352249_3339049732844134_445162109960195729_n&quot;,&quot;ratio&quot;:&quot;1.00&quot;,&quot;sizes&quot;:{&quot;full&quot;:640,&quot;low&quot;:320}},&quot;18155642524040741&quot;:{&quot;id&quot;:&quot;109834226_114477633677372_9146283610259366707_n&quot;,&quot;ratio&quot;:&quot;1.00&quot;,&quot;sizes&quot;:{&quot;full&quot;:640,&quot;low&quot;:320}},&quot;18003222928293930&quot;:{&quot;id&quot;:&quot;110436042_581821456037925_4455251342909312327_n&quot;,&quot;ratio&quot;:&quot;1.00&quot;,&quot;sizes&quot;:{&quot;full&quot;:640,&quot;low&quot;:320}},&quot;17944680850368925&quot;:{&quot;id&quot;:&quot;109210404_149676350071887_1200669150548748628_n&quot;,&quot;ratio&quot;:&quot;1.00&quot;,&quot;sizes&quot;:{&quot;full&quot;:640,&quot;low&quot;:320}},&quot;17874773161751492&quot;:{&quot;id&quot;:&quot;110046863_114117943547428_8538575569122608200_n&quot;,&quot;ratio&quot;:&quot;1.00&quot;,&quot;sizes&quot;:{&quot;full&quot;:640,&quot;low&quot;:320}}}">
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
	</div> <!-- close tag for id="content" class="site-content" -->
  @stop

  @push('scripts')
  <script src="/assets/js/addtohome.js"></script>
    
  @endpush