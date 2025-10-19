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
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>

                    <div class="page-body">
                        <div class="container-xl">
                            <div class="row row-cards">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.setting.siteinfo') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-12">
                                            <div class="row row-cards row-deck">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title"> {{ __('admin.landing.header_settings')}} </h3>
                                                        </div>
                                                        <div class="card-body row">

                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="form-label" for="header_title">{{ __('admin.landing.header_title') }} <span>*</span></label>
                                                                    <input type="text" class="form-control" name="contact_header_title" id="title" value="{{ isset($row->contact_header_title)?$row->contact_header_title:'' }}">

                                                                    @error('header_title')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">{{ __('admin.landing.header_descriptions') }} <span class="form-label-header_description"></span></label>
                                                                    <textarea class="form-control" name="contact_header_description" rows="6" placeholder="Content.."> {{ $row->contact_header_description }}</textarea>
                                                                </div>



                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">



                                                    <div class="mb-3">
                                                        <label class="form-label" for="phone">{{ __('admin.settings.field_phone') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ isset($row->phone)?$row->phone:'' }}">

                                                        @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3">
                                                        <label class="form-label" for="address">{{ __('admin.settings.field_address') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="address" id="currency" value="{{ isset($row->address)?$row->address:'' }}">

                                                        @error('address')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="telegram_number">{{ __('admin.settings.telegram_number') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="telegram_number" id="telegram_number" value="{{ isset($row->telegram_number)?$row->telegram_number:'' }}">

                                                        @error('telegram_number')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="youtube_url">{{ __('admin.settings.field_youtube_url') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="youtube_url" id="youtube_url" value="{{ isset($row->youtube_url)?$row->youtube_url:'' }}">

                                                        @error('youtube_url')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-3">
                                                        <label class="form-label" for="linkedin_url">{{ __('admin.settings.linkedin_url') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="linkedin_url" id="linkedin_url" value="{{ isset($row->linkedin_url)?$row->linkedin_url:'' }}">

                                                        @error('linkedin_url')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="instgram_url">{{ __('admin.settings.field_instgram_url') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="instgram_url" id="instgram_url" value="{{ isset($row->instgram_url)?$row->instgram_url:'' }}">

                                                        @error('instgram_url')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <!-- <div class="mb-3">
                                                        <label class="form-label" for="address_on_map">{{ __('admin.settings.address_on_map') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="address_on_map" id="address_on_map" value="{{ isset($row->address_on_map)?$row->address_on_map:'' }}">

                                                        @error('address_on_map')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div> -->

                                                    <div class="mb-3">
                                                        <label class="form-label" for="map_link">{{ __('admin.settings.map_link') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="map_link" id="map_link" value="{{ isset($row->map_link)?$row->map_link:'' }}">

                                                        @error('map_link')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="lat">{{ __('admin.settings.lat_value') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="lat" id="lat" value="{{ isset($row->lat)?$row->lat:'' }}">

                                                        @error('lat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="telephone ">{{ __('admin.settings.telephone') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="telephone" id="telephone " value="{{ isset($row->telephone )?$row->telephone :'' }}">

                                                        @error('telephone ')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">{{ __('admin.settings.field_email') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="email" id="currency" value="{{ isset($row->email)?$row->email:'' }}">

                                                        @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="whatsapp">{{ __('admin.settings.field_whatsapp') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ isset($row->whatsapp)?$row->whatsapp:'' }}">

                                                        @error('whatsapp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-3">
                                                        <label class="form-label" for="facebook_url">{{ __('admin.settings.field_facebook_url') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="facebook_url" id="currency" value="{{ isset($row->facebook_url)?$row->facebook_url:'' }}">

                                                        @error('facebook_url')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="twitter_url">{{ __('admin.settings.field_twitter_url') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="twitter_url" id="currency" value="{{ isset($row->twitter_url)?$row->twitter_url:'' }}">

                                                        @error('twitter_url')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="tiktok_url">{{ __('admin.settings.tiktok_url') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="tiktok_url" id="tiktok_url" value="{{ isset($row->tiktok_url)?$row->tiktok_url:'' }}">

                                                        @error('tiktok_url')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="snapchat_url">{{ __('admin.settings.snapchat_url') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="snapchat_url" id="snapchat_url" value="{{ isset($row->snapchat_url)?$row->snapchat_url:'' }}">

                                                        @error('snapchat_url')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>






                                                    <div class="mb-3">
                                                        <label class="form-label" for="lng">{{ __('admin.settings.lng_value') }} <span>*</span></label>
                                                        <input type="text" class="form-control" name="lng" id="lng" value="{{ isset($row->lng)?$row->lng:'' }}">

                                                        @error('lng')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>





                                                </div>

                                            </div>

                                            <!-- Form Start -->
                                            <input name="id" type="hidden" value="{{ (isset($row->id))?$row->id:-1 }}">



















                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">{{ __('admin.btn_update') }}</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection