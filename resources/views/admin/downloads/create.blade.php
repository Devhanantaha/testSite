@extends('admin.layouts.master')

@section('title', $title)

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('add-downloads') }}
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
                <form class="card" action="{{ route($route.'.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <!-- Title (English) -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('admin.downloads.name_en') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror" 
                                       name="title_en" value="{{ old('title_en') }}" required>
                                @error('title_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Title (Arabic) -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('admin.downloads.name_ar') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title_ar') is-invalid @enderror" 
                                       name="title_ar" dir="rtl" value="{{ old('title_ar') }}" required>
                                @error('title_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- URL -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('admin.downloads.url') }}</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" 
                                       name="url" placeholder="https://example.com" value="{{ old('url') }}">
                                @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Attachment -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('admin.downloads.field_attachment') }}</label>
                                <input type="file" class="form-control @error('attachment') is-invalid @enderror" 
                                       name="attachment">
                                @error('attachment')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Active Switch -->
                            <div class="col-md-6 mb-3">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="active" value="1" {{ old('active', 1) ? 'checked' : '' }}>
                                    <span class="form-check-label">{{ __('admin.downloads.active') }}</span>
                                </label>
                            </div>
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
