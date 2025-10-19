<!-- [ Main Content ] start -->
<div class="card">
        
        <div class="card-body">
          <!-- Form Start -->
          <form class="needs-validation" autocomplete="off" novalidate action="{{ route($route.'.changepass') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="password" class="form-label required">كلمة السر القديمة </label>

                <div class="col-md-12">
                    <input id="old_password" type="text" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old_password" value="{{auth()->user()->plain_password}}">

                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="form-label required"> كلمة السر الجديدة </label>

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                   
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="form-label required">تأكيد كلمة السر الجديدة </label>

                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="card-footer text-end">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-success">{{ __('btn_update') }}</button>
                </div>
                </div>

          </form>
          <!-- Form End -->
        </div>
</div>
<!-- [ Main Content ] end -->