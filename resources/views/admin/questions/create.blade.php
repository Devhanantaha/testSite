@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('add-faq-questions') }}
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <div class="card-header">
                        <div class="card-block">
                            <a href="{{ route($route.'.index') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>
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
                <form autocomplete="off" class="card" action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <div class="row">
                            <!-- Arabic Question -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="question_ar">{{ __('admin.questions.question_ar') }} <span>*</span></label>
                                <input type="text" class="form-control @error('question_ar') is-invalid @enderror" name="question_ar" id="question_ar" value="{{ old('question_ar') }}" required>
                                @error('question_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- English Question -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="question_en">{{ __('admin.questions.question_en') }} <span>*</span></label>
                                <input type="text" class="form-control @error('question_en') is-invalid @enderror" name="question_en" id="question_en" value="{{ old('question_en') }}" required>
                                @error('question_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Arabic Answer -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="answer_ar">{{ __('admin.questions.answer_ar') }} <span>*</span></label>
                                <textarea class="form-control @error('answer_ar') is-invalid @enderror" name="answer_ar" id="answer_ar" rows="6" required>{{ old('answer_ar') }}</textarea>
                                @error('answer_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- English Answer -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="answer_en">{{ __('admin.questions.answer_en') }} <span>*</span></label>
                                <textarea class="form-control @error('answer_en') is-invalid @enderror" name="answer_en" id="answer_en" rows="6" required>{{ old('answer_en') }}</textarea>
                                @error('answer_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin.select_status') }}</label>
                            <div>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" value="1" type="radio" name="active" checked>
                                    <span class="form-check-label">{{ __('admin.active') }}</span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" value="0" type="radio" name="active">
                                    <span class="form-check-label">{{ __('admin.inactive') }}</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
