@extends('admin.layouts.master')
@section('title', $row->title_en ?? $row->title_ar)

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('show-fields',$row) }}
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.fields.index') }}" class="btn btn-primary">{{ __('admin.btn_back') }}
                </a>
                    </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <!-- Titles -->
                                    <tr>
                                        <th>{{ __('admin.fields.title_ar') }}</th>
                                        <td>{{ $row->title_ar }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.fields.title_en') }}</th>
                                        <td>{{ $row->title_en }}</td>
                                    </tr>

                                    <!-- Descriptions -->
                                    <tr>
                                        <th>{{ __('admin.fields.description_ar') }}</th>
                                        <td>{!! $row->description_ar !!}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.fields.description_en') }}</th>
                                        <td>{!! $row->description_en !!}</td>
                                    </tr>

                                    <!-- Images -->
                                    <tr>
                                        <th>{{ __('admin.fields.images') }}</th>
                                        <td>
                                            @if($row->images && $row->images->count())
                                            @foreach($row->images as $img)
                                            <a href="{{ asset($img->path) }}" target="_blank">
                                                <img src="{{ asset($img->path) }}" style="max-height:50px;" class="me-2 mb-2">
                                            </a>
                                            @endforeach
                                            @else
                                            {{ __('admin.no_file') }}
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Videos -->
                                    <tr>
                                        <th>{{ __('admin.fields.videos') }}</th>
                                        <td>
                                            @if($row->videos && $row->videos->count())
                                            @foreach($row->videos as $video)
                                            <video src="{{ asset($video->path) }}" controls style="max-height:50px;" class="me-2 mb-2"></video>
                                            @endforeach
                                            @else
                                            {{ __('admin.no_file') }}
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection