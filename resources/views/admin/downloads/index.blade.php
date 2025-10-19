@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('downloads') }}
      </div>

      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          @can('downloads-create')
          <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <i class="fas fa-plus"></i>
            {{ __('admin.btn_add_new') }}
          </a>
          @endcan

          @can('downloads-export')
          <a href="{{ route('admin.bulk.export', ['downloads']) }}" class="btn btn-success d-none d-sm-inline-block">
            <i class="fas fa-file-excel"></i>
            {{ __('admin.export_all') }}
          </a>
          @endcan
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
            <h3 class="card-title">{{ $title }}</h3>
          </div>

          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap" id="downloads" style="padding:15px 5px 5px 5px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('admin.downloads.name_en') }}</th>
                  <th>{{ __('admin.downloads.name_ar') }}</th>
                  <th>{{ __('admin.downloads.url') }}</th>
                  <th>{{ __('admin.downloads.attachment') }}</th>
                  <th>{{ __('admin.downloads.status') }}</th>
                  @canany(['downloads-edit','downloads-delete'])
                  <th>{{ __('admin.downloads.actions') }}</th>
                  @endcanany
                </tr>
              </thead>
              <tbody>
                @forelse($rows as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>

                  <!-- English title -->
                  <td>{{ $row->title_en }}</td>

                  <!-- Arabic title -->
                  <td dir="rtl">{{ $row->title_ar }}</td>

                  <!-- URL -->
                  <td>
                    @if($row->url)
                      <a href="{{ $row->url }}" target="_blank" class="text-primary">
                        <i class="fas fa-link"></i> {{ __('admin.downloads.open_link') }}
                      </a>
                    @else
                      <span class="text-muted">{{ __('admin.not_available') }}</span>
                    @endif
                  </td>

                  <!-- Attachment -->
                  <td>
                    @if($row->attachment)
                      <a href="{{ $row->attachment_url }}" target="_blank" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-download"></i> {{ __('admin.downloads.download_file') }}
                      </a>
                    @else
                      <span class="text-muted">{{ __('admin.no_file') }}</span>
                    @endif
                  </td>

                  <!-- Status toggle -->
                  <td>
                    <div class="form-check form-switch">
                      <input data-id="{{ $row->id }}" 
                             data-type="App\Models\Download" 
                             class="form-check-input toggole-class" 
                             type="checkbox" 
                             role="switch" 
                             @checked($row->active == 1)
                             name="active">
                    </div>
                  </td>

                  <!-- Actions -->
                  @canany(['downloads-edit','downloads-delete'])
                  <td>
                    @can('downloads-edit')
                    <a href="{{ route($route.'.edit', $row->id) }}" 
                       title="{{ __('admin.edit') }}" 
                       data-bs-toggle="tooltip" 
                       class="btn btn-sm btn-primary">
                      <i class="far fa-edit"></i>
                    </a>
                    @endcan

                    @can('downloads-delete')
                    <button type="button" 
                            title="{{ __('admin.delete') }}" 
                            class="btn btn-sm btn-danger" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal-{{ $row->id }}">
                      <i class="fas fa-trash-alt"></i>
                    </button>

                    @include('admin.layouts.inc.delete')
                    @endcan
                  </td>
                  @endcanany
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center text-muted">
                    {{ __('admin.no_data') }}
                  </td>
                </tr>
                @endforelse
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

  new DataTable('#downloads', {
    language: { url: url },
    direction: dir,
    columnDefs: [{ className: 'dt-center', targets: '_all' }],
    layout: {
      topStart: {
        buttons: [
          { extend: 'colvis', text: '<i class="fa fa-eye-slash text-primary"></i>', columns: ':not(:first)' },
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
