@extends('admin.layouts.master')
@section('title', $title)
@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        @include('admin.layouts.inc.breadcrumb')

      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-deck row-cards">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
          </div>

          <div class="page-body">
            <div class="container-xl">
              <div class="row row-cards">
                <div class="col-md-12">
                  <form action="{{ route($route.'.siteinfo') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">

                          <div class="mb-3">
                            <label class="form-label" for="title">{{ __('admin.settings.field_site_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ isset($row->title)?$row->title:'' }}">

                            @error('title')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>







                          <div class="mb-3">



                            <label class="form-label" for="logo">{{ __('admin.settings.field_site_logo') }}</span></label>
                            <input type="file" class="form-control" name="logo_path" id="logo">


                            @if(isset($row->logo_path))
                            <img style="height:200px" src="{{ asset($row->logoFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                          </div>

                          



                          
                          
                          

                          
                          
                          
                          
                          
                          
                          


                        </div>
                        <div class="col-md-6">




                        
                        
                        
                        
                        

                        
                        
                        
                        
                        
                        





                          <div class="mb-3">



                            <label class="form-label" for="favicon">{{ __('admin.settings.field_site_favicon') }}</label>
                            <input type="file" class="form-control" name="favicon_path" id="favicon">

                            @if(isset($row->favicon_path))
                            <img style="height:200px" src="{{ asset($row->iconFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_favicon') }}">
                            <div class="clearfix"></div>
                            @endif
                          </div>

                         



                         
                         
                         

                         
                         
                         
                         
                         
                         
                         


                        </div>
                      </div>

                      <!-- Form Start -->
                      <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">



















                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success">{{ __('admin.btn_update') }}</button>
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

@endsection