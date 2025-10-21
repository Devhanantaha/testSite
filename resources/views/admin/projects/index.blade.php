@extends('admin.layouts.master')
@section('title', __('admin.projects.title'))

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('projects') }}
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="{{ route('admin.projects.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            {{ __('admin.btn_add_new') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <div class="row row-deck row-cards">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ __('admin.projects.list') }}</h3>
          </div>

          <div class="table-responsive">
            <table id="projectstable" class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"></th>
                  <th class="w-1">No.</th>
                  <th>{{ __('admin.projects.title') }}</th>
                  <th>{{ __('admin.projects.level') }}</th>
                  <th>{{ __('admin.projects.images') }}</th>
                  <th>{{ __('admin.projects.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($projects as $row)
                <tr>
                  <td><input class="form-check-input m-0 align-middle" type="checkbox"></td>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $row->title_ar }} / {{ $row->title_en }}</td>
                  <td>{{ $row->level->name_ar ?? '-' }}</td>
                  <td>
                    @foreach($row->images as $img)
                      <img src="{{ asset('storage/'.$img->path) }}" alt="Image" style="height:40px;" class="me-1 mb-1 rounded">
                    @endforeach
                  </td>
                  <td class="text-end">
                    <a href="{{ route('admin.projects.edit', $row->id) }}" title="{{ __('admin.edit') }}" class="btn btn-icon btn-primary btn-sm">
                      <span class="far fa-edit"></span>
                    </a>
                    <button type="button" class="btn btn-icon btn-danger btn-sm" title="{{ __('admin.delete') }}" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id}}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <a href="{{ route('admin.projects.show', $row->id) }}" title="{{ __('admin.view') }}" class="btn btn-icon btn-info btn-sm">
                      <i class="fas fa-eye"></i>
                    </a>
                    @include('admin.layouts.inc.delete')
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  let locale = '{{ app()->getLocale() == "ar" ? "Arabic" : "English" }}';
  let dir = '{{ app()->getLocale() == "ar" ? "rtl" : "ltr" }}';
  let url = `https://cdn.datatables.net/plug-ins/1.10.24/i18n/${locale}.json`;

  new DataTable('#projectstable', {
    initComplete: function(settings, json) {
      $('#projectstable').removeClass('dataTable');
    },
    language: { url: url },
    "scrollY": '400px',
    "scrollCollapse": true,
    "paging": true,
    "columnDefs": [{
      className: 'dt-center',
      targets: '_all'
    }],
    "direction": dir
  });
</script>
@endpush
