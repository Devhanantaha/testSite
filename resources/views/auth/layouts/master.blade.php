<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
         @include('admin.layouts.common.header_script')
         

    </head>
    <body>

        <div class="auth-wrapper">
            <div class="auth-content">
                <div class="auth-bg">
                    <span class="r"></span>
                    <span class="r s"></span>
                    <span class="r s"></span>
                    <span class="r"></span>
                </div>

                <!-- Start Content-->
                @yield('content')
                <!-- End Content-->
                
            </div>
        </div>

        @include('admin.layouts.common.footer_script')
        <script>
            $(document).ready(function() {
                function togglePasswordVisibility() {
                    var passwordField = $('#password');
                    var eyeIcon = $('#eyeIcon');
                    
                    if (passwordField.attr('type') === 'password') {
                        passwordField.attr('type', 'text');
                        eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        passwordField.attr('type', 'password');
                        eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                }
        
                // Attach the event listener to the eye icon
                $('.eye-icon').on('click', function(event) {
                    event.preventDefault();  
                    togglePasswordVisibility();  
                });
            });
        </script>
    </body>
    
</html>