@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('contacts') }}
      </div>

      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          @can('contacts-export')
          <a href="{{ route('admin.bulk.export', ['contacts']) }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> {{ __('admin.export_all') }}
          </a>
          @endcan
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
      </div>

      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap" id="contactsTable">
          <thead>
            <tr>
              <th>#</th>
              <th>{{ __('admin.contacts.name') }}</th>
              <th>{{ __('admin.contacts.email') }}</th>
              <th>{{ __('admin.contacts.phone') }}</th>
              <th>{{ __('admin.contacts.message') }}</th>
              @can('contacts-status')
              <th>{{ __('admin.contacts.status') }}</th>
              @endcan
              @can('contacts-delete')
              <th>{{ __('admin.contacts.actions') }}</th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach($rows as $row)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $row->first_name }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ $row->phone }}</td>
              <td>{{ Str::limit($row->message, 50) }}</td>

              @can('contacts-status')
              <td>
                <div class="form-check form-switch">
                  <input data-id="{{ $row->id }}" data-type="App\\Models\\Contact"
                         class="form-check-input toggole-class"
                         type="checkbox" role="switch"
                         @if($row->active) checked @endif name="active">
                </div>
              </td>
              @endcan

              @can('contacts-delete')
              <td>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $row->id }}">
                  <i class="fas fa-trash-alt"></i>
                </button>
                @include('admin.layouts.inc.delete')
              </td>
              @endcan
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  let locale = '{{ app()->getLocale() == "ar" ? "Arabic" : "English" }}';
  let url = `https://cdn.datatables.net/plug-ins/1.10.24/i18n/${locale}.json`;
  let dir = '{{ app()->getLocale() == "ar" ? "rtl" : "ltr" }}';

  new DataTable('#contactsTable', {
    language: { url: url },
    direction: dir,
    columnDefs: [{ className: 'dt-center', targets: '_all' }],
    layout: {
      topStart: {
        buttons: [
          { extend: 'colvis', text: '<i class="fa fa-eye-slash text-primary"></i>', columns: ":not(':first')" },
          { extend: 'copyHtml5', text: '<i class="fas fa-copy text-primary"></i>', exportOptions: { columns: ':visible' } },
          { extend: 'excelHtml5', text: '<i class="fas fa-file-excel text-primary"></i>', exportOptions: { columns: ':visible' } },
          { extend: 'pdfHtml5', text: '<i class="far fa-file-pdf text-primary"></i>', exportOptions: { columns: ':visible' } },
          { extend: 'csvHtml5', text: '<i class="fas fa-file text-primary"></i>', exportOptions: { columns: ':visible' } },
        ]
      }
    }
  });
</script>
@endpush
