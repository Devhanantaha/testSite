@extends('admin.layouts.master')
@section('title', $title)
@section('content')

@php
    $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    $align = $dir === 'rtl' ? 'text-end' : 'text-start';
@endphp

<div class="page-content" dir="{{ $dir }}">

    <!-- Page Header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    {{ Breadcrumbs::render('faq-questions') }}
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 5l0 14"/>
                                <path d="M5 12l14 0"/>
                            </svg>
                            {{ __('admin.btn_add_new') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>

                        <!-- FAQ Table -->
                        <div class="table-responsive">
                            <table id="questionsTable" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('admin.questions.question') }}</th>
                                        <th>{{ __('admin.questions.answer') }}</th>
                                        <th>{{ __('admin.questions.status') }}</th>
                                        <th>{{ __('admin.questions.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->question }}</td>
                                        <td>{!! $row->answer !!}</td>
                                        <td>
                                            <div class="form-check form-switch md-3">
                                                <input data-id="{{$row->id}}" data-type="App\Models\Faq" class="form-check-input toggole-class" type="checkbox" role="switch" @if($row->active) checked @endif>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route($route.'.edit', $row->id) }}" title="{{__('admin.edit')}}" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" title="{{__('admin.delete')}}" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            @include('admin.layouts.inc.delete')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Direction */
    [dir="rtl"] { direction: rtl; }
    [dir="ltr"] { direction: ltr; }

    /* Table Styling */
    #questionsTable {
        background-color: #f9fbfd;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
    }

    #questionsTable thead {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: #fff;
    }

    #questionsTable th, #questionsTable td {
        vertical-align: middle;
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    /* Hover animation for rows */
    #questionsTable tbody tr {
        background-color: #ffffff;
        transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.3s ease;
    }

    #questionsTable tbody tr:hover {
        background-color: #eaf3ff;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
    }

    /* RTL/LTR text alignment */
    [dir="rtl"] #questionsTable th,
    [dir="rtl"] #questionsTable td { text-align: right; }

    [dir="ltr"] #questionsTable th,
    [dir="ltr"] #questionsTable td { text-align: left; }

    /* Card styling */
    .card {
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border-radius: 12px;
    }
</style>
@endpush

@push('scripts')
<script>
    // DataTables localization based on locale
    let locale = "{{ app()->getLocale() }}";
    let url = locale === 'ar'
        ? "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json"
        : "https://cdn.datatables.net/plug-ins/1.10.24/i18n/English.json";

    new DataTable('#questionsTable', {
        language: { url: url },
        scrollY: '400px',
        scrollCollapse: true,
        paging: true,
        fixedFooter: true,
        columnDefs: [{
            className: 'dt-center',
            targets: '_all'
        }]
    });
</script>
@endpush
