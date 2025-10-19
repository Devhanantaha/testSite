@extends('auth.layouts.master')
@section('title', __('admin.auth_login'))
@section('content')

<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4"></div>
        <!-- Start Content -->
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-4">
                    <i class="feather icon-unlock auth-icon"></i>
                </div>
                @if(isset($setting))
                <img src="{{ asset($setting->logoFullPath) }}" style="width:120px;height:90px;" alt="{{ $setting->title }}" class="navbar-brand-image">
                @endif
                <h3>{{ $setting->title }}</h3>
                <h3 class="mb-4">{{ __('admin.auth_login') }}</h3>

                <!-- Form Start -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3 col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="إسم المستخدم" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-4 password-container">
                        <input id="password" type="password" class="form-control password-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="كلمة المرور">
                        
                        <!-- Eye icon to toggle password visibility -->
                        <div class="input-group-text password-toggle">
                            <span  onclick="togglePassword('password', this)">
                                <i class="fa fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                    
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <input type="submit" class="btn btn-primary shadow-2 mb-4" name="submit" value="{{ __('admin.login') }}">
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- End Content -->
    </div>
</div>

@endsection

