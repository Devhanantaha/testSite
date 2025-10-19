@if(app()->getLocale() == 'en')
<style>
    .password-toggle-icon {
        top:55% !important;
    }
</style>
@else
<style>
      .password-toggle-icon {
        top:45% !important;
    }
</style>
@endif
<!-- Edit modal content -->
<div id="changePasswordModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="changePasswordForm-{{ $row->id }}" class="needs-validation" action="{{ route($route.'-password-change') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">{{ __('admin.edit_password')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="success-message-{{ $row->id }}" class="text-danger mt-2"></div>
                    <!-- Form Start -->
                    <input type="hidden" name="staff_id" value="{{ $row->id }}">

                    <div class="form-group input-container">
                        <label for="password" class="form-label">{{ __('admin.users.field_password') }} <span>*</span></label>
                        <input type="password" class="form-control" name="password" id="password" required autocomplete="new-password">
                        <div class="invalid-feedback" id="password-error-{{ $row->id }}"></div>
                        <span class="fa password-toggle-icon" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye" aria-hidden="true"></i> <!-- Default icon -->
                        </span>
                    </div>
                    
                    <div class="form-group input-container">
                        <label for="password-confirm" class="form-label">{{ __('admin.users.field_password_confirmation') }} <span>*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
                        <div class="invalid-feedback" id="password-confirm-error-{{ $row->id }}"></div>
                        <span class="fa password-toggle-icon" onclick="toggleConfirmPassword('password-confirm', this)">
                            <i class="fas fa-eye" aria-hidden="true"></i> <!-- Default icon -->
                        </span>
                    </div>


                    <!-- Form End -->
                    <div class="alert alert-success d-none" id="success-message-{{ $row->id }}"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.btn_close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('admin.save_changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
