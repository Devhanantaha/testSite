@extends('admin.layouts.master')
@section('title', $title)
@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('blogs') }}

      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            {{__('admin.btn_add_new')}} </a>

        </div>
      </div>
      <!-- Page title actions -->
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
            <table id="blogTable" class="table card-table table-vcenter text-nowrap ">
              <thead>
                <tr>
                  <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                  <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 15l6 -6l6 6"></path>
                    </svg>
                  </th>
                  <th> {{__('admin.blogs.title')}}</th>
                  <th> {{__('admin.blogs.published_at')}}</th>
                  <th> {{__('admin.blogs.active_status')}}</th>
                  <th>{{ __('admin.blogs.field_photo') }}</th>

                  <th>{{ __('admin.blogs.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rows as $row)

                <tr>
                  <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                  <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                  <td>{{$row->title}}</td>
                  <td>{{ $row->published_at}}</td>



                  <td>


                    <div class="form-check form-switch md-3" 
                    >

                      <input data-id="{{$row->id}}" data-type='App\Models\Blog' class="form-check-input form-control toggole-class" type="checkbox"  role="switch" id="flexSwitchCheckDefault" @if($row->active==1) checked="checked" @endif name="active">
                    </div>
                  </td>
                  <td>
                  <a href="{{asset($row->imageFullPath)}}" style="width:40px" target="_blank">
  
                  <img  src="{{$row->imageFullPath}}" style="width:40px">
                </a>
                </td>


                  <td style="width: 270px;">



                    <a href="{{ route($route.'.edit',$row->id) }}"   title="{{__('admin.edit')}}"  data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-primary btn-sm">
                      <span class="far fa-edit "></span>
                    </a>

                    <button type="button" class="btn btn-icon btn-danger btn-sm"   title="{{__('admin.delete')}}"  data-bs-placement="bottom" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id }}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <!-- Include Delete modal -->
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

  new DataTable('#blogTable', {
    "initComplete": function(settings, json) {
      // Remove the dataTable class from the table
      $('#blogTable').removeClass('dataTable');
    },
    language: {
      url: url
    },
    'direction': dir,
    columnDefs: [{
      className: 'dt-center',
      targets: '_all',

    }],
    scrollY: '400px', // Adjust the height as needed
    scrollCollapse: true,
    paging: true,
    fixedFooter: true, // Fixed footer
   
  });
</script>
@endpush