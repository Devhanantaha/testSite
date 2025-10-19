@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        {{ Breadcrumbs::render('update-countries',$row) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ route($route.'.index') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-md-12">


        <form class="card"  action="{{ route($route.'.update',$row) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="card-body">
            <!-- Form Start -->
            <fieldset class="row scheduler-border">
              <input type="hidden" name="id" value="{{$row->id}}">

              <div class="form-group col-md-12">
                <label class="form-label" for="name"> {{__('admin.countries.name')}} <span>*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$row) }}" required>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>


              <div class="form-group col-md-12">
                <label class="form-label" for="name"> {{__('admin.countries.code')}} <span>*</span></label>
                <input type="text" class="form-control" name="code" id="code" value="{{ old('code',$row) }}" required>

                @error('code')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>




              <div class="form-group col-md-12">
                <label class="form-label" for="active" class="form-label">{{ __('admin.select_status') }}</label>
                <div>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" value="1" @if($row->active ==1) checked="checked" @endif type="radio" name="active" >
                    <span class="form-check-label"> {{ __('admin.active')}}</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" value="0" @if($row->active == 0) checked="checked" @endif type="radio" name="active" >
                    <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                  </label>

                </div>
              </div>

              <div class="form-group col-md-6">

                @if(isset($row->image))
                @if(is_file($row->image))
                <img src="{{ asset($row->image) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                <div class="clearfix"></div>
                @endif
                @endif

                <label for="logo">{{ __('admin.countries.field_photo') }}</label>
                <input type="file" class="form-control" name="image" id="logo">

                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>


            </fieldset>


            <!-- Form End -->
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
          </div>
        </form>
      </div>
    </div>
    <!-- [ Card ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->


@endsection