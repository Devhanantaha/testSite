<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>
  @if(isset($title))
  {{ $title }} -
  @endif
  {{ $setting->title }}
</title>
<link rel="shortcut icon" href="{{ asset($setting->iconFullPath) }}">

<link href="{{asset('public/dist/css/tabler.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('public/dist/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('public/dist/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('public/dist/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet" />
<link href="{{asset('public/dist/css/demo.min.css?1692870487')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!-- fontawesome icon -->

<link rel="stylesheet" href="{{ asset('dashboard/fonts/fontawesome/css/fontawesome-all.min.css') }}">
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('dashboard/plugins/data-tables/css/datatables.min.css') }}">
<!-- select2 css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.0/css/fixedHeader.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colvis/1.1.2/css/dataTables.colVis.min.css
">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/colvis/1.1.2/css/dataTables.colvis.jqueryui.css
">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
  @import url('https://rsms.me/inter/inter.css');

  :root {
    --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
  }

  body {
    font-feature-settings: "cv03", "cv04", "cv11";
  }

  .invalid-feedback {
    display: block;
    padding: 10px;
  }
</style>
@if(App::getLocale() == 'ar')
<style>
  .page {
    direction: rtl !important;
  }

  .navbar-vertical.navbar-expand-lg .navbar-collapse .dropdown-menu .dropdown-item {
    min-width: 0;
    display: flex;
    width: auto;
    padding-right: calc(calc(calc(var(--tblr-page-padding) * 2)/ 2) + 1.75rem);
    color: inherit;
  }
</style>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  div#DataTables_Table_0_filter {
    margin: 25px;
  }

  .table-responsive {
    padding: 15px 5px 5px 5px;
  }
</style>


<!--  ToolTip custom style  -->
<!-- <style>
 a[data-title] {
  position: relative;
}

a[data-title]:hover::after {
  content: attr(data-title);
  font-size: 14px;
  color: white;
  background-color: black;
  padding: 5px;
  border-radius: 5px;
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translateX(-50%);
  white-space: nowrap;
}

button.btn.btn-icon.btn-danger.btn-sm[data-title] {
  position: relative;
}

button.btn.btn-icon.btn-danger.btn-sm[data-title]:hover::after {
  content: attr(data-title);
  font-size: 14px;
  color: white;
  background-color: black;
  padding: 5px;
  border-radius: 5px;
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translateX(-50%);
  white-space: nowrap;
}
</style> -->

<!-- -->
@if(app()->getLocale() == 'ar')
<style>
  .dropdown-menu-end[data-bs-popper] {
    left: 0;
    right: auto;
  }
</style>

@endif


<style>
  .form-control.is-invalid {
    border-color: #dc3545;
    /* Red color */
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    /* Red shadow */
  }

  .invalid-feedback {
    color: #dc3545;
    /* Red color */
  }
</style>

<style>
  .iti.iti--allow-dropdown {
    width: 100% !important;
  }
</style>



<style>
  /* pagination custom script */
  .dt-layout-cell.dt-end {
    float: inline-end;
    margin-top: -25px;
  }

  .dt-layout-row {
    /* display: flex; */
    justify-content: space-between;
    /* Space between items */
    align-items: center;
    /* Center items vertically */
    padding: 10px;
    /* Optional padding */
    width: 100%;
    /* Ensure the flex container is full-width */
    box-sizing: border-box;
    /* Include padding in width calculation */
  }

  /* Flex item for dropdown */
  .dt-layout-cell.dt-start {
    flex: 1;
    display: flex;
    align-items: center;
  }

  /* Flex item for search input */
  .dt-layout-cell.dt-end {
    display: flex;
    align-items: center;
  }

  /* Style the dropdown */
  .dt-length select {
    margin-right: 5px;
    /* Space between select and label */
  }

  /* Style the search input */
  .dt-search input[type="search"] {
    margin-left: 5px;
    /* Space between search label and input */
    padding: 5px;
    /* Padding inside the search input */
  }

  /* Optional: Add styling for labels */
  .dt-length label,
  .dt-search label {
    margin-right: 5px;
    /* Space between label and input */
  }
</style>



@if(app()->getlocale() == 'en')
<style>
  .input-container {
    position: relative;
  }



  .password-toggle-icon {
    position: absolute;
    top: 75%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    /* Adjust as needed */
    color: #666;
    /* Adjust as needed */
    z-index: 10;
    /* Ensure it’s on top of other elements */
  }
</style>
@else
<style>


label.form-check.form-check-single.form-switch {
    margin-top: -20px;
}
  .input-container {
    position: relative;
  }



  .password-toggle-icon {
    position: absolute;
    top: 60%;
    left: 10px;
    transform: translateX(-20%);
    cursor: pointer;
    font-size: 18px;
    /* Adjust as needed */
    color: #666;
    /* Adjust as needed */
    z-index: 10;
    /* Ensure it’s on top of other elements */
  }

  label.form-label {
    padding: 8px;
  }

  /* td.dt-type-numeric.dt-center {
    text-align: center !important;
} */

.form-check.form-switch.md-3 {
    display: flex;
    justify-content: flex-start;
}
li {
    padding: 3px;
}
</style>
@endif
@if(app()->getLocale() == 'en')
<style>
  label.form-check.form-check-single.form-switch{
    float: right !important;
  }
</style>


@endif

<style>
    table {
            border-collapse: separate;
        }
</style>