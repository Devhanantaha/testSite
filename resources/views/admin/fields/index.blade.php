@extends('admin.layouts.master')
@section('title', '')
@section('content')
<style>
  .list-unstyled {
    list-style: none;
    margin-left: 0;
    padding-left: 0;
  }
  i.fa.fa-star {
    color: blue;
  }
  .thumbnail-img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 5px;
  }
</style>

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">

      <div class="col">
        @include('admin.layouts.inc.breadcrumb')
      </div>

      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          @canany(['fields-create'])
          <a href="{{ route('admin.fields.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <i class="fas fa-plus"></i> {{ __('admin.btn_add_new') }}
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
            <h3 class="card-title">{{ __('admin.fields.list') }}</h3>
          </div>

          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap cell-border" id="fields">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ __('admin.fields.title_en') }}</th>
                  <th>{{ __('admin.fields.title_ar') }}</th>
                  <th>{{ __('admin.fields.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rows as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $row->title_en }}</td>
                  <td>{{ $row->title_ar }}</td>
                 
                 
                 
                 
                 
                 
                 
                 
                 
              
                  <td>
                    @canany(['fields-view'])
                    <a href="{{ route('admin.fields.show', $row->id) }}" class="btn btn-icon btn-primary btn-sm" title="{{__('admin.show')}}">
                      <i class="far fa-eye"></i>
                    </a>
                    @endcan

                    @canany(['fields-edit'])
                    <a href="{{ route('admin.fields.edit', $row->id) }}" class="btn btn-icon btn-primary btn-sm" title="{{__('admin.edit')}}">
                      <i class="far fa-edit"></i>
                    </a>
                    @endcan

                    <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id}}" title="{{__('admin.delete')}}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    @include('admin.layouts.inc.delete')
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="card-footer d-flex align-items-center">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('#fields').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "columnDefs": [
        { className: "dt-center", targets: "_all" }
      ],
      "language": {
        url: `https://cdn.datatables.net/plug-ins/1.10.24/i18n/{{ app()->getLocale() == 'ar' ? 'Arabic' : 'English' }}.json`
      }
    });
  });
</script>
@endpush
