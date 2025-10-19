@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-levels',$course,$row) }}

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


        <form class="card"  action="{{ route($route.'.update',[$course->id,$row]) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="card-body">
            <div class="row ">
              <div class="mb-3">
                <label class="form-label" for="name"> {{ __('admin.levels.name') }} <span>*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $row->name }}" required>

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
                    <option value="{{ $track->id }}" @if($row->track_id == $track->id) selected @endif> {{ $track->name }}</option>

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
                    <option value="1" @if($row->period_type ==1 ) selected @endif> {{ __('admin.levels.day') }}</option>
                    <option value="2" @if($row->period_type ==2 ) selected @endif> {{ __('admin.levels.hour') }}</option>
                  </select>

                  @error('period_type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="period"> {{ __('admin.levels.period') }} <span>*</span></label>
                  <input type="number" class="form-control" name="period" id="period" value="{{ $row->period }}" required>

                  @error('period')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>





                <input type="hidden" value="{{$row->id}}" name="id">

              </div>
              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="instructor_id">{{ __('admin.courses.instructor') }} <span>*</span></label>
                  <select class="select2 form-control" name="instructor_id" id="instructor_id">
                    <option value="">{{ __('select') }}</option>
                    @foreach($course->instructors as $instructor)
                    <option value="{{ $instructor->id }}" @if($row->instructor_id == $instructor->id) selected @endif> {{ $instructor->name }}</option>

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
                  <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $row->start_date }}">

                  @error('start_date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label" for="end_date">{{ __('admin.levels.end_date') }} <span>*</span></label>
                  <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $row->end_date }}">

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
          <div class="card-footer">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
          </div>
        </form>
      </div>
    </div>
    <!-- [ Card ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->


@endsection