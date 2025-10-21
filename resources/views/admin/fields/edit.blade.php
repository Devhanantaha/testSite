@extends('admin.layouts.master')
@section('title', __('admin.edit_field'))

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-fields', $row) }}
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
        <form autocomplete="off" class="card" action="{{ route('admin.fields.update', $row) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">

            <!-- Title Arabic -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.title_ar') }} <span>*</span></label>
              <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $row->title_ar) }}">
              @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Title English -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.title_en') }} <span>*</span></label>
              <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $row->title_en) }}">
              @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Description Arabic -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.description_ar') }}</label>
              <textarea name="description_ar" class="form-control" rows="4">{{ old('description_ar', $row->description_ar) }}</textarea>
              @error('description_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Description English -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.description_en') }}</label>
              <textarea name="description_en" class="form-control" rows="4">{{ old('description_en', $row->description_en) }}</textarea>
              @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Images -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.images') }}</label>
              <input type="file" name="images[]" class="form-control" multiple>
              @if($row->images)
                <div class="mt-2">
                  @foreach($row->images as $img)
                    <img src="{{ asset($img->image_path) }}" style="max-height:100px;" class="img-fluid me-2 mb-2">
                  @endforeach
                </div>
              @endif
              @error('images')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Videos -->
            <div class="mb-3">
              <label class="form-label">{{ __('admin.fields.videos') }}</label>
              <input type="file" name="videos[]" class="form-control" multiple>
              @if($row->videos)
                <div class="mt-2">
                  @foreach($row->videos as $video)
                    <video src="{{ asset($video->path) }}" controls style="max-height:100px;" class="me-2 mb-2"></video>
                  @endforeach
                </div>
              @endif
              @error('videos')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

          </div>

          <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_update') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
