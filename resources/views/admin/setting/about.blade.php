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

        <form autocomplete="off" class="card"  action="{{ route('admin.setting.saveAboutSetting') }}" method="post" enctype="multipart/form-data">
          @csrf


          <div class="card-body">
            <div class="row ">
              
              <div class="col-12">
                <div class="row row-cards row-deck">
                  <div class="col">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title"> {{ __('admin.aboutus.section1')}} </h3>
                      </div>
                      <div class="card-body row">

                        <div class="col-md-6">

                          <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                          <div class="form-group col-md-12">
                            <label class="form-label" for="title">{{ __('admin.aboutus.title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ isset($row->title)?$row->title:'' }}">

                            @error('title')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="mb-3 ">



                            <label for="logo form-label">{{ __('admin.aboutus.background_image') }}</label>
                            <input type="file" class="form-control" name="background_image" id="logo">
                            @if(isset($row->background_image))
                            <img src="{{ asset($row->backgroundImageFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                            @error('background_image')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>




                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">{{ __('admin.aboutus.descriptions') }} <span class="form-label-description"></span></label>
                            <textarea class="form-control" name="description" rows="6" placeholder="Content.."> {{ $row->description }}</textarea>
                          </div>



                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
              <div class="col-12">
                <div class="row row-cards row-deck">
                  <div class="col">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title"> {{ __('admin.aboutus.section2')}} </h3>
                      </div>
                      <div class="card-body row">

                        <div class="col-md-6">

                          <div class="form-group col-md-12">
                            <label class="form-label" for="course_number">{{ __('admin.aboutus.course_number') }} <span>*</span></label>
                            <input type="number" class="form-control" name="course_number" id="course_number" value="{{ isset($row->course_number)?$row->course_number: $courses->count() }}">

                            @error('course_number')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group col-md-12">
                            <label class="form-label" for="lecture_number">{{ __('admin.aboutus.lecture_number') }} <span>*</span></label>
                            <input type="number" class="form-control" name="lecture_number" id="lecture_number" value="{{ isset($row->lecture_number)?$row->lecture_number:$lectures->count() }}">

                            @error('lecture_number')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>




                        </div>
                        <div class="col-md-6">

                          <div class="form-group col-md-12">
                            <label class="form-label" for="instructor_number">{{ __('admin.aboutus.instructor_number') }} <span>*</span></label>
                            <input type="number" class="form-control" name="instructor_number" id="instructor_number" value="{{ isset($row->instructor_number)?$row->instructor_number:'' }}">

                            @error('instructor_number')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group col-md-12">
                            <label class="form-label" for="student_number">{{ __('admin.aboutus.student_number') }} <span>*</span></label>
                            <input type="number" class="form-control" name="student_number" id="student_number" value="{{ isset($row->student_number)?$row->student_number:'' }}">

                            @error('student_number')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>




                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
              <div class="col-12">
                <div class="row row-cards row-deck">
                  <div class="col">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title"> {{ __('admin.aboutus.section3')}} </h3>
                      </div>
                      <div class="card-body row">

                        <div class="col-md-6">
                          <div class="form-group col-md-12">
                            <label class="form-label" for="mission_title">{{ __('admin.aboutus.mission_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="mission_title" id="mission_title" value="{{ isset($row->mission_title)?$row->mission_title:'' }}">

                            @error('mission_title')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="mb-3 ">



                            <label for="logo form-label">{{ __('admin.aboutus.mission_image') }}</label>
                            <input type="file" class="form-control" name="mission_image" id="logo">
                            @if(isset($row->mission_image))
                            <img src="{{ asset($row->missionimageFullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            
                            @endif
                            @error('mission_image')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>




                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">{{ __('admin.aboutus.mission_descriptions') }} <span class="form-label-description"></span></label>
                            <textarea class="form-control" name="mission_description" rows="6" placeholder="Content.."> {{ $row->mission_description }}</textarea>
                          </div>



                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
              <div class="col-12">
                <div class="row row-cards row-deck">
                  <div class="col">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title"> {{ __('admin.aboutus.section4')}} </h3>
                      </div>
                      <div class="card-body row">
                        <div class="col-md-6">

                          <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">

                          <div class="form-group col-md-12">
                            <label class="form-label" for="msg_title1">{{ __('admin.aboutus.msg_title1') }} <span>*</span></label>
                            <input type="text" class="form-control" name="msg_title1" id="msg_title1" value="{{ isset($row->msg_title1)?$row->msg_title1:'' }}">

                            @error('msg_title1')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label">{{ __('admin.aboutus.msg_desc1') }} <span class="form-label-msg_desc1"></span></label>
                            <textarea class="form-control" name="msg_desc1" rows="6" placeholder="Content.."> {{ $row->msg_desc1 }}</textarea>
                          </div>
                          <div class="mb-3 ">



                            <label for="logo form-label">{{ __('admin.aboutus.msg_image1') }}</label>
                            <input type="file" class="form-control" name="msg_image1" id="logo">
                            @if(isset($row->msg_image1))
                            <img src="{{ asset($row->msgImage1FullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                            @error('msg_image1')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <hr>
                          <div class="form-group col-md-32">
                            <label class="form-label" for="msg_title3">{{ __('admin.aboutus.msg_title3') }} <span>*</span></label>
                            <input type="text" class="form-control" name="msg_title3" id="msg_title3" value="{{ isset($row->msg_title3)?$row->msg_title3:'' }}">

                            @error('msg_title3')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label">{{ __('admin.aboutus.msg_desc3') }} <span class="form-label-msg_desc3"></span></label>
                            <textarea class="form-control" name="msg_desc3" rows="6" placeholder="Content.."> {{ $row->msg_desc3 }}</textarea>
                          </div>
                          <div class="mb-3 ">



                            <label for="logo form-label">{{ __('admin.aboutus.msg_image3') }}</label>
                            <input type="file" class="form-control" name="msg_image3" id="logo">
                            @if(isset($row->msg_image3))
                            <img src="{{ asset($row->msgImage3FullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                            @error('msg_image3')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>




                        </div>
                        <div class="col-md-6">

                        <div class="form-group col-md-22">
                            <label class="form-label" for="msg_title2">{{ __('admin.aboutus.msg_title2') }} <span>*</span></label>
                            <input type="text" class="form-control" name="msg_title2" id="msg_title2" value="{{ isset($row->msg_title2)?$row->msg_title2:'' }}">

                            @error('msg_title2')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label">{{ __('admin.aboutus.msg_desc2') }} <span class="form-label-msg_desc2"></span></label>
                            <textarea class="form-control" name="msg_desc2" rows="6" placeholder="Content.."> {{ $row->msg_desc2 }}</textarea>
                          </div>
                          <div class="mb-3 ">



                            <label for="logo form-label">{{ __('admin.aboutus.msg_image2') }}</label>
                            <input type="file" class="form-control" name="msg_image2" id="logo">
                            @if(isset($row->msg_image2))
                            <img src="{{ asset($row->msgImage2FullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                            @error('msg_image2')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <hr>
                          <div class="form-group ">
                            <label class="form-label" for="msg_title4">{{ __('admin.aboutus.msg_title4') }} <span>*</span></label>
                            <input type="text" class="form-control" name="msg_title4" id="msg_title4" value="{{ isset($row->msg_title4)?$row->msg_title4:'' }}">

                            @error('msg_title4')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label">{{ __('admin.aboutus.msg_desc4') }} <span class="form-label-msg_desc4"></span></label>
                            <textarea class="form-control" name="msg_desc4" rows="6" placeholder="Content.."> {{ $row->msg_desc4 }}</textarea>
                          </div>
                          <div class="mb-3 ">



                            <label for="logo form-label">{{ __('admin.aboutus.msg_image4') }}</label>
                            <input type="file" class="form-control" name="msg_image4" id="logo">
                            @if(isset($row->msg_image4))
                            <img src="{{ asset($row->msgImage4FullPath) }}" class="img-fluid setting-image" alt="{{ __('field_site_logo') }}">
                            <div class="clearfix"></div>
                            @endif
                            @error('msg_image4')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>




                        </div>


                      </div>

                    </div>
                  </div>

                </div>
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