@extends('admin.layouts.master')
@section('title', trans('module_staff'))

@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('add-levels',$course) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
            <a href="{{ url('admin/courses/'.$course->id.'/levels') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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

        <form autocomplete="off" class="card"  action="{{ url('admin/courses/$course_id/levels' ) }}" method="post" enctype="multipart/form-data">
          @csrf


          <div class="card-body">
            <div class="row ">
            <div class="mb-3">
                  <label class="form-label" for="name"> {{ __('admin.levels.name') }} <span>*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              <div class="col-md-6">
              <div class="mb-3">
                  <label class="form-label" for="track_id">{{ __('admin.courses.track') }} <span>*</span></label>
                  <select class="select2 form-control" name="track_id" id="track_id" required>
                    <option value="">{{ __('select') }}</option>
                    @foreach($course->tracks as $track)
                    <option value="{{ $track->id }}"> {{ $track->name }}</option>

                    @endforeach
                  </select>

                  @error('track_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="period_type">{{ __('admin.levels.period_type') }} <span>*</span></label>
                  <select class="form-control" name="period_type" id="period_type" required>
                    <option value="">{{ __('select') }}</option>
                    <option value="1"> {{ __('admin.levels.day') }}</option>
                    <option value="2"> {{ __('admin.levels.hour') }}</option>
                  </select>

                  @error('period_type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="period"> {{ __('admin.levels.period') }} <span>*</span></label>
                  <input type="number" class="form-control" name="period" id="period" value="{{ old('name') }}" required>

                  @error('period')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>



                



              </div>
              <div class="col-md-6">

              <div class="mb-3">
                  <label class="form-label" for="instructor_id">{{ __('admin.courses.instructor') }} <span>*</span></label>
                  <select class="select2 form-control" name="instructor_id" id="instructor_id">
                    <option value="">{{ __('select') }}</option>
                    @foreach($course->instructors as $instructor)
                    <option value="{{ $instructor->id }}"> {{ $instructor->name }}</option>

                    @endforeach
                  </select>

                  @error('instructor_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

             

                <div class="mb-3">
                  <label class="form-label" for="start_date">{{ __('admin.levels.start_date') }} <span>*</span></label>
                  <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}">

                  @error('start_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="end_date">{{ __('admin.levels.end_date') }} <span>*</span></label>
                  <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}">

                  @error('end_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <input type="hidden" name="course_id" value="{{$course->id}}">






              </div>




            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
            </div>
          </div>

          <!-- Form End -->


        </form>
      </div>
    </div>
  </div>
</div>





@endsection