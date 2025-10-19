@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-downloads', $row) }}
      </div>

      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="{{ route($route.'.index') }}" class="btn btn-primary btn-rounded">
            {{ __('admin.btn_back') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-md-12">
        <form class="card" action="{{ route($route.'.update', $row->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="card-body">
            <div class="row">

              <!-- English Title -->
              <div class="col-md-6 mb-3">
                <label class="form-label">{{ __('admin.downloads.name_en') }} <span class="text-danger">*</span></label>
                <input type="text" 
                       class="form-control @error('title_en') is-invalid @enderror" 
                       name="title_en" 
                       value="{{ old('title_en', $row->title_en) }}" 
                       required>
                @error('title_en')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Arabic Title -->
              <div class="col-md-6 mb-3">
                <label class="form-label">{{ __('admin.downloads.name_ar') }} <span class="text-danger">*</span></label>
                <input type="text" 
                       dir="rtl"
                       class="form-control @error('title_ar') is-invalid @enderror" 
                       name="title_ar" 
                       value="{{ old('title_ar', $row->title_ar) }}" 
                       required>
                @error('title_ar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- URL -->
              <div class="col-md-12 mb-3">
                <label class="form-label">{{ __('admin.downloads.url') }}</label>
                <input type="url" 
                       class="form-control @error('url') is-invalid @enderror" 
                       name="url" 
                       value="{{ old('url', $row->url) }}" 
                       placeholder="https://example.com">
                @error('url')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Attachment -->
              <div class="col-md-6 mb-3">
                <label class="form-label">{{ __('admin.downloads.field_attachment') }}</label>
                <input type="file" class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                @if($row->attachment)
                  <div class="mt-2">
                    <a href="{{ $row->attachment_url }}" target="_blank" class="btn btn-outline-info btn-sm">
                      {{ __('admin.downloads.download_file') }}
                    </a>
                  </div>
                @endif
                @error('attachment')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Active Status -->
              <div class="col-md-6 mb-3">
                <label class="form-label d-block">{{ __('admin.downloads.status') }}</label>
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

          <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">
              {{ __('admin.btn_save') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
