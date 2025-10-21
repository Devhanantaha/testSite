@extends('admin.layouts.master')
@section('title', $title)

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-news', $row) }}
      </div>

      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <div class="card-header">
            <div class="card-block">
              <a href="{{ route($route.'.index') }}" class="btn btn-rounded btn-primary">
                {{ __('admin.btn_back') }}
              </a>
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

        <form class="card" action="{{ route($route.'.update', $row->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="card-body">

            <!-- ======= Title Fields ======= -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="title_ar">
                  {{ __('admin.news.title_ar') }} <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="title_ar" id="title_ar"
                  value="{{ old('title_ar', $row->title_ar) }}" required>
                @error('title_ar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label" for="title_en">
                  {{ __('admin.news.title_en') }} <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="title_en" id="title_en"
                  value="{{ old('title_en', $row->title_en) }}" required>
                @error('title_en')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- ======= Description Fields ======= -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="description_ar">{{ __('admin.news.description_ar') }}</label>
                <textarea dir="rtl" class="form-control richtext" name="description_ar" id="description_ar" rows="5"
                  placeholder="...">{{ old('description_ar', $row->description_ar) }}</textarea>
                @error('description_ar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label" for="description_en">{{ __('admin.news.description_en') }}</label>
                <textarea dir="ltr" class="form-control richtext" name="description_en" id="description_en" rows="5"
                  placeholder="...">{{ old('description_en', $row->description_en) }}</textarea>
                @error('description_en')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <hr />

            <!-- ======= Image Upload ======= -->
            <div class="mb-3">
              <label class="form-label" for="main_image">{{ __('admin.news.field_photo') }}</label>
              <input type="file" class="form-control" name="main_image" id="main_image" accept="image/*">
              @if($row->main_image)
              <div class="mt-2">
                <img src="{{ $row->imageFullPath }}" class="img-fluid rounded shadow-sm" style="max-height: 200px;" alt="Blog Image">
              </div>
              @endif
              @error('main_image')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- ======= Active Status ======= -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.news.active_status') }}</label>
              <div>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="active" value="1"
                    {{ old('active', $row->active) == 1 ? 'checked' : '' }}>
                  <span class="form-check-label">{{ __('admin.active') }}</span>
                </label>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="active" value="0"
                    {{ old('active', $row->active) == 0 ? 'checked' : '' }}>
                  <span class="form-check-label">{{ __('admin.inactive') }}</span>
                </label>
              </div>
            </div>

          </div>

          <!-- ======= Footer ======= -->
          <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
@endsection
