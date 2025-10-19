@extends('admin.layouts.master')
@section('title', $title)
@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('tracks') }}

      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
        @canany(['tracks-create'])
          <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            {{__('admin.btn_add_new')}} </a>
            @endcanany
            @canany(['tracks-export'])
            
          <a href="{{ route('admin.bulk.export',['tracks']) }}" class="btn btn-primary d-none d-sm-inline-block">
          <i class="fas fa-file-excel"></i>
            {{__('admin.export_all')}} </a>
            @endcanany
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
            <table class="table card-table table-vcenter text-nowrap" id="tracks" style="padding:15px 5px 5px 5px;">
              <thead>
                <tr>
                  <!-- <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th> -->
                  <th class="w-1">#. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 15l6 -6l6 6"></path>
                    </svg>
                  </th>
                  <th> {{__('admin.tracks.name')}}</th>
                  <th> {{__('admin.tracks.courses_number')}}</th>
                  <th> {{__('admin.tracks.parent_track')}}</th>
                  @canany(['tracks-status'])
                  <th> {{__('admin.tracks.status')}}</th>
                  @endcanany
                  @canany(['tracks-footer'])
                  <th> {{__('admin.tracks.in_footer')}}</th>
                  @endcanany
                  <th>{{ __('admin.tracks.field_photo') }}</th>
                  @canany(['tracks-edit','tracks-delete'])
                  <th>{{ __('admin.tracks.actions') }}</th>
                  @endcanany
                </tr>
              </thead>
              <tbody>
                @foreach($rows as $row)

                <tr>
                  <!-- <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td> -->
                  <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                  <td>{{$row->name}}</td>
                  <td>{{ $row->courses()->count() }}</td>
                  <td>

                  @if($row->parent_id == null )
                  {{  __('admin.tracks.yes') }}
                  @else
                  {{  __('admin.tracks.no') }}
                  @endif
                  </td>



                  @canany(['tracks-status'])

                  <td>


                    <div class="form-check form-switch md-3">

                      <input data-id="{{$row->id}}" data-type='App\Models\Track' class="form-check-input form-control toggole-class" type="checkbox" role="switch" id="flexSwitchCheckDefault" @if($row->active==1) checked="checked" @endif name="active">
                    </div>
                  </td>
                  @endcanany
                  @canany(['tracks-footer'])
                  <td>


                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input data-id="{{$row->id}}" data-type='App\Models\Track' class="form-check-input form-control toggole-trackfooter" type="checkbox" role="switch" id="flexSwitchCheckDefault" @if($row->in_footer==1) checked="checked" @endif name="in_footer">
                    </div>
                  </td>
                  @endcanany

                  <td>
                    @if($row->image)
                    <a href="{{asset($row->imageFullPath)}}" style="width:40px" target="_blank">
                      <img src="{{$row->imageFullPath}}" style="width:40px"></a>
                    @else
                    {{__('admin.no_image')}}
                    @endif


                  </td>

                  @canany(['tracks-edit','tracks-delete'])

                  <td style="width: 270px;">

                    @canany(['tracks-edit'])

                    <a href="{{ route($route.'.edit',$row->id) }}" title="{{__('admin.edit')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-primary btn-sm" data-title="{{__('admin.edit')}}">
                      <span class="far fa-edit "></span>
                    </a>
                    @endcanany
                    @canany(['tracks-delete'])
                    <button type="button" title="{{__('admin.delete')}}" data-bs-placement="bottom" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id }}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <!-- Include Delete modal -->
                    @include('admin.layouts.inc.delete')
                    @endcanany
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
  </div>
</div>

<?php
if (app()->getLocale() == 'ar') {
  $locale = 'Arabic';
  $dir = 'right to left';
} else {
  $locale = 'English';
  $dir = 'left to right';
}

?>
@endsection

@push('scripts')
<script>
  let locale = '<?= $locale ?>'; // assuming this is set by your PHP code
  let url = `https://cdn.datatables.net/plug-ins/1.10.24/i18n/${locale}.json`;
  let dir = '<?= $dir ?>';
  console.log(url);

  new DataTable('#tracks', {
    "createdRow": function(row, data, dataIndex) {
      $('#tracks').removeClass('dataTable');
      $('#tracks').removeClass('datatable');

    },
    language: {

      url: url
    },
    'direction': dir,
    columnDefs: [{
      className: 'dt-center',
      targets: '_all',

    }],
    layout: {
      topStart: {
        buttons: [{
            extend: 'colvis',
            text: '<i class="fa fa-eye-slash text-primary" aria-hidden="true" style="font-size:large;"></i>',
            title: '',
            columns: ":not(':first')"
          },

          {
            extend: 'copyHtml5',
            text: '<i class="fas fa-copy text-primary" style="font-size:large;"></i>',
            title: '',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel text-primary" style="font-size:large;"></i>',
            title: '',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdfHtml5',
            text: '<i class="far fa-file-pdf fa-lg text-primary"></i>',
            title: '',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csvHtml5',
            title: 'CSV',
            text: '<i class="fas fa-file text-primary" style="font-size:large;"></i>',
            title: '',
            exportOptions: {
              columns: ':not(:last-child)',
              columns: ':visible'

            }
          },

        ]
      }
    }
  });
</script>
@endpush