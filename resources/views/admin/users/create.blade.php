@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('add-users') }}

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

                <form id="" class="card" action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">

                                <div class="mb-3">
                                    <label class="form-label" for="name"> {{ __('admin.users.field_name') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="role">{{ __('admin.users.role') }} <span>*</span></label>
                                    <select class="form-control select2" name="roles[]" id="role" required>
                                        <option value="">{{ __('select') }}</option>
                                        @foreach( $roles as $role )
                                        <option value="{{ $role->id }}" @if(old('roles')==$role->id) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('roles')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-container mb-3">
                                    <label class="form-label" for="password">{{ __('admin.users.field_password') }} <span>*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" required>
                                    <span class="fa password-toggle-icon" onclick="togglePassword('password', this)">
                                        <i class="fas fa-eye" aria-hidden="true"></i> <!-- Default icon -->
                                    </span>
                                   
                                </div>

                                @error('password')
                                    <div class="invalid-feedback" style="padding-top:0px">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                <div class="input-container mb-3">
                                    <label class="form-label" for="password_confirmation">{{ __('admin.users.field_password_confirmation') }} <span>*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value="{{ old('password_confirmation') }}" required>
                                    <span class="fa password-toggle-icon" onclick="toggleConfirmPassword('password-confirm', this)">
                                        <i class="fas fa-eye" aria-hidden="true"></i> <!-- Default icon -->
                                    </span>
                                   
                                </div>

                                @error('password_confirmation')
                                    <div class="invalid-feedback" style="padding-top:0px">
                                        {{ $message }}
                                    </div>
                                    @enderror


                             

                                <div class="mb-3">
                                    <label class="form-label" for="email">{{ __('admin.users.field_email') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" required>

                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="phone">{{ __('admin.users.phone_number') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">

                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
                        </div>
                    </div>

                    <!-- Form End -->


                </form>
            </div>
        </div>
    </div>
</div>







@endsection
