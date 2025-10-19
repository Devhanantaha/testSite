@extends('admin.layouts.master')
@section('title', trans('edit_staff') )

@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
      {{ Breadcrumbs::render('update-users',$row) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ route($route.'.index') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-md-12">


        <form class="card" action="{{ route($route.'.update', [$row->id]) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <h3 style="display:none;">{{ __('tab_profile_info') }}</h3>
          <content class="form-step">
            <!-- Form Start -->
            <div class="card-body">
              <fieldset class="row scheduler-border">


                <div class="form-group col-md-6">
                  <label class="form-label" for="name"> {{ __('admin.users.field_name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $row->name }}" required>

                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                @if($row->type == 0)
                <div class="form-group col-md-6">
                  <label class="form-label" for="role">{{ __('admin.users.role') }} <span>*</span></label>
                  <select class="form-control select2" name="roles[]" id="role" required>
                    <option value="">{{ __('select') }}</option>
                    @foreach( $roles as $role )
                    <option value="{{ $role->id }}" @foreach($userRoles as $userRole) @if($userRole->id == $role->id) selected @endif
                      @endforeach
                      >{{ $role->name }}</option>
                    @endforeach
                  </select>

                  @error('roles')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                @else
                <input type="hidden" value="4" name="roles[]">

                @endif
                <div class="form-group col-md-6">
                  <label class="form-label" for="email">{{ __('admin.users.field_email') }} <span>*</span></label>
                  <input type="text" class="form-control" name="email" id="email" value="{{ $row->email }}" required>

                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>



                <div class="form-group col-md-6">
                  <label class="form-label" for="phone">{{ __('admin.users.phone_number') }} <span>*</span></label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{ $row->phone }}">

                  @error('phone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


              </fieldset>
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary"> حفظ</button>

              </div>

            </div>
            <!-- Form End -->
          </content>

        </form>
      </div>

    </div>
  </div>
</div>


@endsection