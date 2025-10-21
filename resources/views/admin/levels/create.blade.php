@extends('admin.layouts.master')
@section('title', __('admin.add_level'))

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-levels') }}
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <div class="card-header">
            <div class="card-block">
              <a href="{{ route('admin.levels.index') }}" class="btn btn-rounded btn-primary">
                {{ __('admin.back') }}
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

        <form method="POST" action="{{ route('admin.levels.store') }}">
          @csrf

          <div class="card">
            <div class="card-body">

              {{-- Level Name Arabic --}}
              <div class="mb-3">
                <label class="form-label" for="name_ar">
                  {{ __('admin.name_ar') }} <span class="text-danger">*</span>
                </label>
                <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{ old('name_ar') }}" required>
                @error('name_ar')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>

              {{-- Level Name English --}}
              <div class="mb-3">
                <label class="form-label" for="name_en">
                  {{ __('admin.name_en') }} <span class="text-danger">*</span>
                </label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="{{ old('name_en') }}" required>
                @error('name_en')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>

              {{-- Country Selection --}}
              <div class="mb-3">
                <label class="form-label" for="country_id">
                  {{ __('admin.country') }} <span class="text-danger">*</span>
                </label>
                <select name="country_id" id="country_id" class="form-control" required>
                  <option value="">{{ __('select') }}</option>
                  @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                      {{ $country->name }}
                    </option>
                  @endforeach
                </select>
                @error('country_id')
                  <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
              </div>

            </div>

            <div class="card-footer text-end">
              <button type="submit" class="btn btn-success">
                <i class="ti ti-device-floppy me-1"></i> {{ __('admin.save') }}
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
