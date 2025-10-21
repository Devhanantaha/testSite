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

    <form autocomplete="off" class="card" action="{{ route('admin.setting.saveAboutSetting') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">

        @php
          $sections = [
              'about' => __('admin.aboutus.section1'),
              'mission' => __('admin.aboutus.section2'),
              'goals' => __('admin.aboutus.section3'),
              'history' => __('admin.aboutus.section4'),
          ];
        @endphp

        @foreach($sections as $sectionKey => $sectionTitle)
        <div class="row row-cards row-deck mb-4">
          <div class="col">
            <div class="card">
              <!-- Header: clickable to toggle -->
              <div class="card-header bg-light" style="cursor:pointer;" onclick="document.getElementById('collapse-{{ $sectionKey }}').classList.toggle('show')">
                <h3 class="card-title mb-0">{{ $sectionTitle }}</h3>
              </div>

              <!-- Collapsible body -->
              <div class="collapse" id="collapse-{{ $sectionKey }}">
                <div class="card-body">

                  <input type="hidden" name="{{ $sectionKey }}_id" value="{{ isset($row->{$sectionKey.'_id'}) ? $row->{$sectionKey.'_id'} : -1 }}">

                  {{-- Title Arabic --}}
                  <div class="form-group mb-3">
                    <label class="form-label" for="{{ $sectionKey }}_title_ar">{{ __('admin.aboutus.title_ar') }} <span>*</span></label>
                    <input type="text" class="form-control" name="{{ $sectionKey }}_title_ar" id="{{ $sectionKey }}_title_ar" 
                           value="{{ old($sectionKey.'_title_ar', isset($row->{$sectionKey.'_title_ar'}) ? $row->{$sectionKey.'_title_ar'} : '') }}">
                    @error("{$sectionKey}_title_ar")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Title English --}}
                  <div class="form-group mb-3">
                    <label class="form-label" for="{{ $sectionKey }}_title_en">{{ __('admin.aboutus.title_en') }} <span>*</span></label>
                    <input type="text" class="form-control" name="{{ $sectionKey }}_title_en" id="{{ $sectionKey }}_title_en" 
                           value="{{ old($sectionKey.'_title_en', isset($row->{$sectionKey.'_title_en'}) ? $row->{$sectionKey.'_title_en'} : '') }}">
                    @error("{$sectionKey}_title_en")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Description Arabic --}}
                  <div class="form-group mb-3">
                    <label class="form-label" for="{{ $sectionKey }}_description_ar">{{ __('admin.aboutus.description_ar') }}</label>
                    <textarea class="form-control" name="{{ $sectionKey }}_description_ar" id="{{ $sectionKey }}_description_ar" rows="6">{{ old($sectionKey.'_description_ar', isset($row->{$sectionKey.'_description_ar'}) ? $row->{$sectionKey.'_description_ar'} : '') }}</textarea>
                  </div>

                  {{-- Description English --}}
                  <div class="form-group mb-3">
                    <label class="form-label" for="{{ $sectionKey }}_description_en">{{ __('admin.aboutus.description_en') }}</label>
                    <textarea class="form-control" name="{{ $sectionKey }}_description_en" id="{{ $sectionKey }}_description_en" rows="6">{{ old($sectionKey.'_description_en', isset($row->{$sectionKey.'_description_en'}) ? $row->{$sectionKey.'_description_en'} : '') }}</textarea>
                  </div>

                  {{-- Image --}}
                  <div class="form-group mb-3">
                    <label class="form-label" for="{{ $sectionKey }}_image">{{ __('admin.aboutus.image') }}</label>
                    <input type="file" class="form-control" name="{{ $sectionKey }}_image" id="{{ $sectionKey }}_image">
                    @if(isset($row->{$sectionKey.'_image'}))
                    <img src="{{ asset($row->{$sectionKey.'ImageFullPath'}) }}" class="img-fluid setting-image mt-2" alt="{{ $sectionTitle }}">
                    @endif
                    @error("{$sectionKey}_image")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="card-footer text-end">
        <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
      </div>

    </form>

  </div>
</div>
@endsection
