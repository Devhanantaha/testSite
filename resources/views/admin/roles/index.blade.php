@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{ Breadcrumbs::render('roles') }}

            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                    <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
            <h3 class="card-title">{{ $title }}</h3>
          </div>
         
            <!-- [ Data table ] start -->
            <div class="table-responsive">
            <table  id="roleTable" class="table card-table table-vcenter text-nowrap ">
  
                <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('admin.roles.field_title') }}</th>
                            <th>{{ __('admin.roles.field_action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $roles as $key => $row )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <a href="{{ route($route.'.edit', $row->id) }}" title="{{__('admin.edit')}}" class="btn btn-icon btn-primary btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>
                                @if($row->type != 1)
                                <button type="button" class="btn btn-icon btn-danger btn-sm"  title="{{__('admin.delete')}}" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <!-- Include Delete modal -->

                                @include('admin.layouts.inc.delete')
                                @endif

                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
          
            </div>
            </div>
            <!-- [ Data table ] end -->
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

    new DataTable('#roleTable', {
        "initComplete": function(settings, json) {
            // Remove the dataTable class from the table
            $('#roleTable').removeClass('dataTable');
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

    $(document).ready(function() {
        // Handle form submission
        $("form[id^='changePasswordForm-']").submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = $(this);
            var formData = form.serialize(); // Serialize the form data
            var formId = form.attr('id');
            var staffId = form.find('input[name="staff_id"]').val(); // Get the staff ID
            var passwordErrorDiv = $('#password-error-' + staffId);
            var passwordConfirmErrorDiv = $('#password-confirm-error-' + staffId);
            var successMessageDiv = $('#success-message-' + staffId);


            $.ajax({
                url: form.attr('action'), // URL from the form's action attribute
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                    successMessageDiv.html('تم تغير كلمة السر').removeClass('d-none');
                    // Optionally, hide the modal after a delay
                    setTimeout(function() {
                        $('#changePasswordModal-' + staffId).modal('hide');
                    }, 2000); // Adjust delay as needed
                },
                error: function(xhr) {
                    // Handle error response
                    var errors = xhr.responseJSON.errors || {};

                    // Clear previous error messages
                    passwordErrorDiv.html('');
                    passwordConfirmErrorDiv.html('');

                    // Display new error messages
                    if (errors.password) {
                        passwordErrorDiv.html(errors.password[0]);
                    }
                    if (errors.password_confirmation) {
                        passwordConfirmErrorDiv.html(errors.password_confirmation[0]);
                    }
                }
            });
        });
    });
</script>
@endpush