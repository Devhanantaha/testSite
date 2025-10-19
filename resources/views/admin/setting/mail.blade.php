@extends('admin.layouts.master')
@section('title', $title)

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        @include('admin.layouts.inc.breadcrumb')

      </div>

    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-md-12" style="margin-top: 30px;">

        <form class="needs-validation" class="card"  action="{{ route('admin.setting.SaveMail') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card">


            <div class="card-body">
              <div class="row">
                <!-- Form Start -->
                <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                <div class="form-group col-md-6">
                  <label for="driver" class="form-label">{{ __('admin.field_mail_driver') }} <span>*</span></label>
                  <select class="form-control" name="driver" id="driver" required>
                    <option value="smtp" @if(isset($row->driver)) @if($row->driver == 'smtp') selected @endif @endif>{{ __('SMTP') }}</option>
                    <option value="sendmail" @if(isset($row->driver)) @if($row->driver == 'sendmail') selected @endif @endif>{{ __('SendMail') }}</option>
                  </select>
                  @error('driver')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="host" class="form-label">{{ __('admin.field_mail_host') }} <span>*</span></label>
                  <input type="text" class="form-control" name="host" id="host" value="{{ $row->host }}" required>
                  @error('hsot')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="port" class="form-label">{{ __('admin.field_mail_port') }} <span>*</span></label>
                  <input type="text" class="form-control" name="port" id="port" value="{{ isset($row->port)?$row->port:'' }}" required>

                  @error('port')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="username" class="form-label">{{ __('admin.field_mail_username') }} <span>*</span></label>
                  <input type="text" class="form-control" name="username" id="username" value="{{ isset($row->username)?$row->username:'' }}" required>

                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="password" class="form-label">{{ __('admin.field_mail_password') }} <span>*</span></label>
                  <input type="password" class="form-control" name="password" id="password" value="{{ isset($row->password)?$row->password:'' }}" required>

                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="encryption" class="form-label">{{ __('admin.field_mail_encryption') }}</label>

                  <select class="form-control" name="encryption" id="encryption">
                    <option value="">{{ __('select') }}</option>
                    <option value="ssl" @if(isset($row->encryption)) @if($row->encryption == 'ssl') selected @endif @endif>{{ __('SSL') }}</option>
                    <option value="tls" @if(isset($row->encryption)) @if($row->encryption == 'tls') selected @endif @endif>{{ __('TLS') }}</option>
                  </select>

                  @error('encryption')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="sender_email" class="form-label">{{ __('admin.field_mail_sender_email') }} <span>*</span></label>
                  <input type="email" class="form-control" name="sender_email" id="sender_email" value="{{ isset($row->sender_email)?$row->sender_email:'' }}" required>

                  @error('sender_email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="sender_name" class="form-label">{{ __('admin.field_mail_sender_name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="sender_name" id="sender_name" value="{{ isset($row->sender_name)?$row->sender_name:'' }}" required>

                  @error('sender_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

              <!-- Form End -->
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_update') }}</button>
          </div>
      </div>
      </form>
    </div>
  </div>
  <!-- [ Main Content ] end -->
</div>
</div>
@endsection