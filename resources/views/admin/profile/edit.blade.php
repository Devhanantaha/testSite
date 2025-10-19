<!-- [ Main Content ] start -->
<div class="card">
    <div class="card-body">
        <form class="needs-validation"  action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Form Start -->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name"> {{ __('field_name') }}<span>*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $row->name }}" required>

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="email">{{ __('field_email') }}</label>
                    <input type="text" class="form-control" name="email" id="photo" value="{{ $row->email }}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="photo">{{ __('field_photo') }}</label>
                    <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}">
                    @if(is_file('uploads/'.$path.'/'.$row->photo))
                    <img src="{{ asset('uploads/'.$path.'/'.$row->photo) }}" class="card-img-top img-fluid profile-thumb" alt="{{ __('field_photo') }}" onerror="this.src='{{ asset('dashboard/images/user/avatar-1.jpg') }}';">


                    @endif
                    @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                

                <div class="card-footer text-end">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-success">{{ __('btn_update') }}</button>
                </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Form End -->
        </form>
    </div>
</div>
<!-- [ Main Content ] end -->