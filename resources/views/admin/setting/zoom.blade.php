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

        <form class="needs-validation" class="card"  action="{{ route('admin.setting.SaveZoom') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card">


            <div class="card-body">
              <div class="row">
                <!-- Form Start -->
                <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

        

                <div class="form-group col-md-6">
                  <label for="client_id" class="form-label">{{ __('admin.field_client_id') }} <span>*</span></label>
                  <input type="text" class="form-control" name="client_id" id="client_id" value="{{ $row->client_id }}" required>
                  @error('client_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="client_secret" class="form-label">{{ __('admin.field_client_secret') }} <span>*</span></label>
                  <input type="text" class="form-control" name="client_secret" id="client_secret" value="{{ isset($row->client_secret)?$row->client_secret:'' }}" required>

                  @error('client_secret')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="account_id" class="form-label">{{ __('admin.field_account_id') }} <span>*</span></label>
                  <input type="text" class="form-control" name="account_id" id="account_id" value="{{ isset($row->account_id)?$row->account_id:'' }}" required>

                  @error('account_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="base_url" class="form-label">{{ __('admin.field_base_url') }} <span>*</span></label>
                  <input type="text" class="form-control" name="base_url" id="base_url" value="{{ isset($row->base_url)?$row->base_url:'' }}" required>

                  @error('base_url')
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