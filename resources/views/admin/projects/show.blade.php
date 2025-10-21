@extends('admin.layouts.master')
@section('title', __('admin.project_details'))

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('show-projects', $project) }}
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                    <i class="ti ti-arrow-left"></i> {{ __('admin.btn_back') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light">
                <h3 class="card-title mb-0 text-primary fw-semibold">
                    {{ __('admin.project_details') }}
                </h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <tbody>
                            <tr>
                                <th class="w-25">{{ __('admin.projects.title_en') }}</th>
                                <td>{{ $project->title_en }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('admin.projects.title_ar') }}</th>
                                <td dir="rtl" class="text-end">{{ $project->title_ar }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('admin.projects.level') }}</th>
                                <td>{{ $project->level->name_en ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('admin.projects.description_en') }}</th>
                                <td>{!! $project->description_en ?: '<em class="text-muted">—</em>' !!}</td>
                            </tr>

                            <tr>
                                <th>{{ __('admin.projects.description_ar') }}</th>
                                <td dir="rtl" class="text-end">{!! $project->description_ar ?: '<em class="text-muted">—</em>' !!}</td>
                            </tr>

                            <tr>
                                <th>{{ __('admin.projects.images') }}</th>
                                <td>
                                    @if($project->images && $project->images->count())
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach($project->images as $img)
                                                <div class="border rounded overflow-hidden" style="width: 80px; height: 80px;">
                                                    <img src="{{ asset('storage/'.$img->path) }}" class="img-fluid h-100 w-100 object-fit-cover" alt="Project Image">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted">{{ __('admin.projects.no_images') }}</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>{{ __('admin.created_at') }}</th>
                                <td>{{ $project->created_at->format('Y-m-d H:i') }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('admin.updated_at') }}</th>
                                <td>{{ $project->updated_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
