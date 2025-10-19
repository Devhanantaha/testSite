@extends('admin.layouts.master')
@section('title', $title)

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-banners', $row) }}
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
                  {{ __('admin.banners.title_ar') }} <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="title_ar" id="title_ar"
                  value="{{ old('title_ar', $row->title_ar) }}" required>
                @error('title_ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label" for="title_en">
                  {{ __('admin.banners.title_en') }} <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="title_en" id="title_en"
                  value="{{ old('title_en', $row->title_en) }}" required>
                @error('title_en') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
            </div>

            <!-- ======= URL Field ======= -->
            <div class="mb-3">
              <label class="form-label" for="url">{{ __('admin.banners.url') }}</label>
              <input type="text" class="form-control" name="url" id="url"
                     value="{{ old('url', $row->url) }}" placeholder="https://example.com">
              @error('url') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <hr />

            <!-- ======= Image Upload ======= -->
            <div class="mb-3">
              <label class="form-label" for="image">{{ __('admin.banners.field_photo') }}</label>
              <input type="file" class="form-control" name="image" id="image" accept="image/*">
              @if($row->image)
              <div class="mt-2">
                <img src="{{ $row->imageFullPath }}" class="img-fluid rounded shadow-sm" style="max-height: 200px;" alt="Banner Image">
              </div>
              @endif
              @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- ======= Active Status ======= -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.banners.active_status') }}</label>
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
