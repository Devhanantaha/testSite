@extends('admin.layouts.master')
@section('title', '')

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ isset($row) ? Breadcrumbs::render('update-projects',$row) : Breadcrumbs::render('add-projects') }}
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <div class="card-header">
            <div class="card-block">
              <a href="{{ route('admin.projects.index') }}" class="btn btn-rounded btn-primary">
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

        <form class="card" action="{{ route('admin.projects.update', $row->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="card-body">

            <fieldset class="row scheduler-border">
              <input type="hidden" name="id" value="{{ $row->id }}">

              <!-- Level -->
              <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="level_id">{{ __('admin.projects.level') }} <span>*</span></label>
                <select name="level_id" id="level_id" class="form-control" required>
                  <option value="">{{ __('admin.select') }}</option>
                  @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ old('level_id', $row->level_id) == $level->id ? 'selected' : '' }}>
                      {{ $level->name_en }}
                    </option>
                  @endforeach
                </select>
                @error('level_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Title Arabic -->
              <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="title_ar">{{ __('admin.projects.title_ar') }} <span>*</span></label>
                <input type="text" class="form-control" name="title_ar" id="title_ar"
                       value="{{ old('title_ar', $row->title_ar) }}" required>
                @error('title_ar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Title English -->
              <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="title_en">{{ __('admin.projects.title_en') }} <span>*</span></label>
                <input type="text" class="form-control" name="title_en" id="title_en"
                       value="{{ old('title_en', $row->title_en) }}" required>
                @error('title_en')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Description Arabic -->
              <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="description_ar">{{ __('admin.projects.description_ar') }}</label>
                <textarea name="description_ar" id="description_ar" class="form-control" rows="4">{{ old('description_ar', $row->description_ar) }}</textarea>
                @error('description_ar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Description English -->
              <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="description_en">{{ __('admin.projects.description_en') }}</label>
                <textarea name="description_en" id="description_en" class="form-control" rows="4">{{ old('description_en', $row->description_en) }}</textarea>
                @error('description_en')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Upload New Images -->
              <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="images">{{ __('admin.projects.new_images') }}</label>
                <input type="file" name="images[]" multiple class="form-control" id="images">
                @error('images')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Existing Images -->
              @if($row->images->count())
              <div class="form-group col-md-12 mb-3">
                <label class="form-label">{{ __('admin.projects.existing_images') }}</label>
                <div>
                  @foreach($row->images as $img)
                    <div style="display:inline-block; position:relative; margin:5px;">
                      <img src="{{ asset('storage/'.$img->path) }}" class="rounded border" style="height:60px; width:auto;">
                    
                    
                    
                    
                    
                    </div>
                  @endforeach
                </div>
              </div>
              @endif
            </fieldset>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
