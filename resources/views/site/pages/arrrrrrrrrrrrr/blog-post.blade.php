@extends('site.appar')
@section('title', $post->name2)
@section('content')
<div id="content" class="site-content">
            <div class="page-banner has-banner" style="min-height: 500px;">
               <div class="page-banner-content">
                  <h1 class="entry-title">{{$post->name2}}</h1>
                  <div class="breadcrumbs circle-style" itemprop="breadcrumb"><a href="/ar">الرئيسية</a><span> {{$post->name2}}</span></div>
               </div>
            </div>
            <div id="main-content" class="main-container">
               <div class="container">
                  <div class="content-area" id="main-column">
                     <main id="main" class="site-main">
                        <article id="post-1760" class="post-1760 page type-page status-publish hentry">
                           <div class="entry-content">
                              <div data-elementor-type="wp-page" data-elementor-id="1760" class="elementor elementor-1760" data-elementor-settings="[]">
                                 <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                       <section class="elementor-section elementor-top-section elementor-element elementor-element-d33f9bf elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="d33f9bf" data-element_type="section">
                                          <div class="elementor-container elementor-column-gap-no">
                                             <div class="elementor-row">
                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-447d32d" data-id="447d32d" data-element_type="column">
                                                   <div class="elementor-column-wrap elementor-element-populated" style="
                                                   direction: rtl;
                                                   text-align: right;
                                               ">
                                                      <div class="elementor-widget-wrap">
                                                        
                                                         <div class="elementor-element elementor-element-ed4e3cf title-before elementor-widget elementor-widget-text-editor" data-id="ed4e3cf" data-element_type="widget" data-widget_type="text-editor.default">
                                                            <div class="elementor-widget-container">
                                                               <div class="elementor-text-editor elementor-clearfix">
                                                                        {!! $post->content2 !!}
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
                              <div class="clearfix"></div>
                           </div>
                           <footer class="entry-meta">
                              <a class="post-edit-link btn btn-default btn-xs" href="" title="Edit"><i class="edit-post-icon glyphicon glyphicon-pencil" title="Edit"></i></a> 
                           </footer>
                        </article>
                     </main>
                  </div>
               </div>
            </div>
         </div>
@stop
	@push('scripts')
	 <script type="text/javascript">(function () {
         var c = document.body.className;
         t = c.replace(/woocommerce/, 'post-template-default  ');
         document.body.className = c;
         document.body.className = t;
         })()
      </script> 
	
	@endpush