@extends('admin.layouts.master')
@section('title', $title)

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('add-videos') }}
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

                <form class="card" action="{{ route($route.'.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        {{-- ✅ English Title --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.videos.name_en') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" 
                                   name="name_en" value="{{ old('name_en') }}" required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Arabic Title --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.videos.name_ar') }} <span class="text-danger">*</span></label>
                            <input type="text" dir="rtl" class="form-control @error('name_ar') is-invalid @enderror" 
                                   name="name_ar" value="{{ old('name_ar') }}" required>
                            @error('name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Type --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.videos.type') }} <span class="text-danger">*</span></label>
                            <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                                <option value="" disabled selected>{{ __('select') }}</option>
                                <option value="skills">Skills Video</option>
                                <option value="coaching">Coaching Video</option>
                                <option value="planning">Planning Video</option>
                                <option value="staff_training">Staff Training Video</option>
                                <option value="training_needs">Training Needs Video</option>
                                <option value="private_training">Private Training Video</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ English Description --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.videos.description_en') }}</label>
                            <textarea class="form-control richtext" name="description_en" rows="4">{{ old('description_en') }}</textarea>
                            @error('description_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Arabic Description --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.videos.description_ar') }}</label>
                            <textarea dir="rtl" class="form-control richtext" name="description_ar" rows="4">{{ old('description_ar') }}</textarea>
                            @error('description_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Video URL --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.videos.video_url') }}</label>
                            <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                   name="video_url" value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=...">
                            @error('video_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Image Upload --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.videos.field_photo') }}</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Active Switch --}}
                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="active" name="active" value="1" checked>
                            <label class="form-check-label" for="active">{{ __('admin.active') }}</label>
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
