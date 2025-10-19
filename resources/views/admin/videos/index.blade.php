@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('videos') }}
      </div>

      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          @can('videos-create')
          <a href="{{ route($route.'.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            {{ __('admin.btn_add_new') }}
          </a>
          @endcan

          @can('videos-export')
          <a href="{{ route('admin.bulk.export', ['videos']) }}" class="btn btn-success">
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
        <table class="table card-table table-vcenter text-nowrap" id="videosTable">
          <thead>
            <tr>
              <th>#</th>
              <th>{{ __('admin.videos.title') }}</th>
              <th>{{ __('admin.videos.url') }}</th>
              <th>{{ __('admin.videos.attachment') }}</th>
              @can('videos-status')
              <th>{{ __('admin.videos.status') }}</th>
              @endcan
              @canany(['videos-edit','videos-delete'])
              <th>{{ __('admin.videos.actions') }}</th>
              @endcanany
            </tr>
          </thead>
          <tbody>
            @foreach($rows as $row)
            <tr>
              <td>{{ $loop->iteration }}</td>

              {{-- ✅ Multilingual title --}}
              <td>{{ app()->getLocale() == 'ar' ? $row->title_ar : $row->title_en }}</td>

              {{-- ✅ Video URL --}}
              <td>
                @if($row->url)
                  <a href="{{ $row->url }}" target="_blank" class="text-primary">
                    {{ Str::limit($row->url, 30) }}
                  </a>
                @else
                  {{ __('admin.no_url') }}
                @endif
              </td>

              {{-- ✅ Attachment preview --}}
              <td>
                @if($row->image)
                  <a href="{{ $row->imageFullPath }}" target="_blank">
                    <i class="fas fa-file-video"></i> {{ __('admin.open') }}
                  </a>
                @else
                  {{ __('admin.no_attachment') }}
                @endif
              </td>

              {{-- ✅ Active status --}}
              @can('videos-status')
              <td>
                <div class="form-check form-switch">
                  <input data-id="{{ $row->id }}" data-type="App\Models\Video"
                         class="form-check-input toggole-class"
                         type="checkbox" role="switch"
                         @if($row->active) checked @endif name="active">
                </div>
              </td>
              @endcan

              {{-- ✅ Action buttons --}}
              @canany(['videos-edit','videos-delete'])
              <td>
                @can('videos-edit')
                <a href="{{ route($route.'.edit', $row->id) }}" class="btn btn-sm btn-primary">
                  <i class="far fa-edit"></i>
                </a>
                @endcan

                @can('videos-delete')
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $row->id }}">
                  <i class="fas fa-trash-alt"></i>
                </button>
                @include('admin.layouts.inc.delete')
                @endcan
              </td>
              @endcanany
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

  new DataTable('#videosTable', {
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
