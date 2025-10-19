@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
            {{ Breadcrumbs::render('show-roles',$row) }}

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
                <div class="card">


                    <div class="card-body">

                        <!-- Details View Start -->
                        <h4><mark class="text-primary">{{ __('admin.roles.field_title') }}:</mark> {{ $role->name }}</h4>
                        <hr />

                        @if(!empty($rolePermissions))
                        @php
                        $separation = '0';
                        @endphp

                        @foreach($rolePermissions as $value)

                        @if($separation != $value->group)
                        <hr />
                        <h6 class="mt-4 text-primary">{{ $value->group }}</h6>
                        @endif
                        <span class="badge badge-secondary">
                            {{ $value->title }}
                        </span>
                        @php
                        $separation = $value->group;
                        @endphp

                        @endforeach
                        @endif
                        <!-- Details View End -->

                    </div>
                </div>
                </div>
        </div>
    </div>
</div>


                @endsection