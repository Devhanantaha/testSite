@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<style>
    .checkbox label {
        cursor: pointer;
        /* Makes it clear that the label is clickable */
    }

    .d-flex {
        display: flex;
        align-items: center;
    }

    .me-2 {
        margin-right: 0.5rem;
        /* Adjust margin as needed */
    }

    .mb-3,
    .mb-4 {
        margin-bottom: 1rem;
        /* Adjust margin as needed */
    }

    .col-md-8 {
        margin-bottom: 1rem;
        /* Adjust margin as needed */
    }
</style>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('add-roles') }}
            </div>
            <!-- Page title actions -->
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
                <form class="card" action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Form Start -->
                        <div class="mb-3">
                            <label for="name">{{ __('admin.roles.field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Select All and Inverse Selection Checkboxes -->
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <h4>{{ __('admin.roles.select_roles') }}</h4>

                            </div>
                            <div class="mb-4 d-flex align-items-center">
                                <input type="checkbox" id="select-all" class="form-check-input me-2" checked>
                                <label for="select-all" class="form-check-label" style="padding:5px;">{{ __('admin.select_all') }}</label>
                            </div>
                        </div>




                        @php
                        $separation = '0';
                        @endphp

                        @foreach($permission as $value)
                        @if($separation != $value->group)
                        <hr />
                        @if(app()->getLocale() == 'en')
                        <h6 class="mt-4 text-primary">{{ $value->group_en }}</h6>
                        @else
                        <h6 class="mt-4 text-primary">{{ $value->group }}</h6>
                        @endif
                        @endif

                        <div class="mb-3 d-inline" style="margin-right: 40px;">
                            <div class="checkbox d-inline m-r-10">
                                <input type="checkbox" id="checkbox-{{ $value->id }}" name="permission[]" value="{{ $value->id }}" checked>
                                @if(app()->getLocale() == 'en')
                                <label for="checkbox-{{ $value->id }}" class="cr">{{ $value->title_en }}</label>
                                @else
                                <label for="checkbox-{{ $value->id }}" class="cr">{{ $value->title }}</label>
                                @endif
                            </div>
                        </div>

                        @php
                        $separation = $value->group;
                        @endphp

                        @endforeach
                        <!-- Form End -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Select All and Inverse Selection -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('select-all');
        const inverseSelectionCheckbox = document.getElementById('inverse-selection');
        const permissionCheckboxes = document.querySelectorAll('input[name="permission[]"]');

        // Select All Functionality
        selectAllCheckbox.addEventListener('change', function() {
            permissionCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        // Inverse Selection Functionality
        inverseSelectionCheckbox.addEventListener('change', function() {
            permissionCheckboxes.forEach(checkbox => {
                checkbox.checked = !checkbox.checked;
            });
        });
    });
</script>

@endsection