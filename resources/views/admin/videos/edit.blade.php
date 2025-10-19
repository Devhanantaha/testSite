@extends('admin.layouts.master')
@section('title', $title)

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-videos', $row) }}
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

        <form class="card" action="{{ route($route.'.update', $row->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")

          <div class="card-body">
            <fieldset class="row scheduler-border">

              {{-- ✅ English Name --}}
              <div class="mb-3 col-md-6">
                <label class="form-label">{{ __('admin.videos.name_en') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" 
                       name="name_en" value="{{ old('name_en', $row->name_en) }}" required>
                @error('name_en')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ Arabic Name --}}
              <div class="mb-3 col-md-6">
                <label class="form-label">{{ __('admin.videos.name_ar') }} <span class="text-danger">*</span></label>
                <input type="text" dir="rtl" class="form-control @error('name_ar') is-invalid @enderror" 
                       name="name_ar" value="{{ old('name_ar', $row->name_ar) }}" required>
                @error('name_ar')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ Type --}}
              <div class="mb-3 col-md-6">
                <label class="form-label">{{ __('admin.videos.type') }} <span class="text-danger">*</span></label>
                <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                  <option value="" disabled>{{ __('select') }}</option>
                  <option value="skills"          @selected($row->type == 'skills')>Skills Video</option>
                  <option value="coaching"        @selected($row->type == 'coaching')>Coaching Video</option>
                  <option value="planning"        @selected($row->type == 'planning')>Planning Video</option>
                  <option value="staff_training"  @selected($row->type == 'staff_training')>Staff Training Video</option>
                  <option value="training_needs"  @selected($row->type == 'training_needs')>Training Needs Video</option>
                  <option value="private_training"@selected($row->type == 'private_training')>Private Training Video</option>
                </select>
                @error('type')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ Video URL --}}
              <div class="mb-3 col-md-6">
                <label class="form-label">{{ __('admin.videos.video_url') }}</label>
                <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                       name="video_url" value="{{ old('video_url', $row->video_url) }}" 
                       placeholder="https://www.youtube.com/watch?v=...">
                @error('video_url')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ English Description --}}
              <div class="mb-3 col-md-6">
                <label class="form-label">{{ __('admin.videos.description_en') }}</label>
                <textarea class="form-control richtext @error('description_en') is-invalid @enderror" 
                          name="description_en" rows="4">{{ old('description_en', $row->description_en) }}</textarea>
                @error('description_en')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ Arabic Description --}}
              <div class="mb-3 col-md-6">
                <label class="form-label">{{ __('admin.videos.description_ar') }}</label>
                <textarea dir="rtl" class="form-control richtext @error('description_ar') is-invalid @enderror" 
                          name="description_ar" rows="4">{{ old('description_ar', $row->description_ar) }}</textarea>
                @error('description_ar')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ Image Upload --}}
              <div class="mb-3 col-md-6">
                <label class="form-label">{{ __('admin.videos.field_photo') }}</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @if($row->image)
                  <div class="mt-2">
                    <img src="{{ $row->imageFullPath }}" alt="Video Image" class="img-fluid rounded shadow-sm" style="max-width: 180px;">
                  </div>
                @endif
                @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ Status --}}
              <div class="form-group col-md-6">
                <label class="form-label d-block">{{ __('admin.videos.status') }}</label>
                <div>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" value="1" @checked($row->active == 1)>
                    <span class="form-check-label">{{ __('admin.active') }}</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" value="0" @checked($row->active == 0)>
                    <span class="form-check-label">{{ __('admin.inactive') }}</span>
                  </label>
                </div>
              </div>

            </fieldset>
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
