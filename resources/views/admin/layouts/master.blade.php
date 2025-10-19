<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">




<head>
  @include('admin.layouts.common.header_script')

</head>

<body>
  <script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>


  <div class="page">

    @include('admin.layouts.inc.navbar')


    <div class="page-wrapper">
      @yield('content')


      @include('admin.layouts.inc.footer')
    </div>
  </div>



  @include('admin.layouts.common.footer_script')
  @stack('scripts')

  <style>
    .dt-scroll-head {
      display: none !important;
    }

    .dt-scroll-headInner {
      display: none !important;
    }
  </style>
  <style>
    .dataTables_wrapper {
      overflow-x: auto;
      /* For horizontal scrolling */
    }

    .dataTables_scroll {
      overflow: hidden;
      /* To avoid double scrollbars */
    }
  </style>

  <style>
    .dt-scroll-body {
      overflow-y: hidden !important;
    }
  </style>

  <style>
    /* Apply background color and text color to TinyMCE toolbar */
    .tox-toolbar {
      background-color: inherit;
      color: inherit;
    }

    .tox-toolbar__primary {
      background-color: inherit;
      color: inherit;
    }

    /* Apply background color and text color to TinyMCE footer */
    .tox-statusbar {
      background-color: inherit;
      color: inherit;
    }

    .tox-toolbar__group {
      background-color: inherit;
      color: inherit;
    }

    .tox-toolbar__group {
      background-color: inherit;
      color: inherit;
    }

    .button.tox-tbtn {
      background-color: inherit;
      color: inherit;
    }

    /* Apply background color and text color to the entire editor container */
    .tox {
      background-color: inherit;
      color: inherit;
    }

    .tox .tox-tbtn--disabled,
    .tox .tox-tbtn--disabled:hover,
    .tox .tox-tbtn:disabled,
    .tox .tox-tbtn:disabled:hover {
      background-color: inherit;
      color: inherit;
    }

    /* Optional: Style the iframe and editor body specifically */
    .tox-edit-area__iframe {
      background-color: inherit;
      color: inherit;
    }
  </style>



</body>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

<script>
  function togglePassword() {
    let password_field_type = $('#password').attr('type');
    if (password_field_type == 'password') {
      showPAssword();
    } else {
      DisablePassword();
    }
  }

  function showPAssword() {
    $('#password').attr('type', 'text');
    $('.glyphicon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }

  function DisablePassword() {
    $('#password').attr('type', 'password');
    $('.glyphicon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }

  function toggleConfirmPassword() {
    let password_field_type = $('#password-confirm').attr('type');
    if (password_field_type == 'password') {
      showConfirmPassword();
    } else {
      DisableConfirmPassword();
    }
  }


  function showConfirmPassword() {
    $('#password-confirm').attr('type', 'text');
    $('.glyphicon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }

  function DisableConfirmPassword() {
    $('#password-confirm').attr('type', 'password');
    $('.glyphicon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
</script>
<script>
  
    
  

</script>
<script>
  // Handle delete action
  $('body').on('click', '.btn-delete', function() {
    var yearId = $(this).data('id'); // Get the year ID
    var url = '/admin/years/' + yearId; // URL to delete the year

    // Confirm the deletion
    if (confirm('Are you sure you want to delete this year?')) {
      $.ajax({
        url: url,
        method: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}' // Add CSRF token for security
        },
        success: function(response) {
          alert('Year deleted successfully!');
          location.reload(); // Reload the page to remove the year from the table
        },
        error: function(xhr) {
          alert('Something went wrong!');
        }
      });
    }
  });
</script>

</html>