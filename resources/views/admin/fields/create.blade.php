@extends('admin.layouts.master')
@section('title', '')

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-fields') }}
      </div>
      <div class="col-auto ms-auto d-print-none">
        <a href="{{ route('admin.fields.index') }}" class="btn btn-primary">{{ __('admin.btn_back') }}</a>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <div class="row">
      <div class="col-md-12">
        <form autocomplete="off" class="card" action="{{ route('admin.fields.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            <!-- Title Arabic -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.title_ar') }} <span>*</span></label>
              <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar') }}">
              @error('title_ar')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Title English -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.title_en') }} <span>*</span></label>
              <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
              @error('title_en')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Description Arabic -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.description_ar') }}</label>
              <textarea name="description_ar" class="form-control" rows="4">{{ old('description_ar') }}</textarea>
              @error('description_ar')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Description English -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.description_en') }}</label>
              <textarea name="description_en" class="form-control" rows="4">{{ old('description_en') }}</textarea>
              @error('description_en')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Images -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.images') }}</label>
              <input type="file" name="images[]" class="form-control" multiple>
              @error('images')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Videos -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.videos') }}</label>
              <input type="file" name="videos[]" class="form-control" multiple>
              @error('videos')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

          </div>

          <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
