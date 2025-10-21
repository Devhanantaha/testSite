<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSetting;
use App\Models\LandingSetting;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\MailSetting;
use App\Models\ZoomSetting;

use Toastr;
use Image;
use File;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans('admin.settings.title');
        $this->route = 'admin.setting';
        $this->view = 'admin.setting';
        $this->path = 'setting';
        $this->access = 'setting';

        // $this->middleware('permission:'.$this->access.'-view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['access'] = $this->access;

        $data['row'] = Setting::where('status', 1)->first();

        return view($this->view . '.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function siteInfo(Request $request)
    {

        $data = Setting::where('id', 1)->first();
        if (!$data)
            $data = new Setting();

        $data->update($request->except(['logo_path', 'favicon_path']));
        if ($request->hasFile('logo_path')) {

            $thumbnail = $request->logo_path;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->logo_path = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('favicon_path')) {

            $thumbnail = $request->favicon_path;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->favicon_path = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('login_image')) {

            $thumbnail = $request->login_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->login_image = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('register_image')) {

            $thumbnail = $request->register_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->register_image = 'uploads/settings/' . $filename;
            $data->save();
        }

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }

    public function landingSetting()
    {
        $data['title'] = trans('admin.settings.landing_page');
        $data['row'] = LandingSetting::where('id', '1')->first();
        return view($this->view . '.landing', $data);
    }


    public function contactUs()
    {
        $data['title'] = trans('admin.settings.contactus_page');
        $data['route'] = $this->route;
        $data['row'] = Setting::where('status', 1)->first();
        return view($this->view . '.contactus', $data);
    }



    public function SaveLandingSetting(Request $request)
    {
        $data = LandingSetting::where('id', 1)->first();
        if (!$data)
            $data = new LandingSetting();


        $data->start_soon_period = $request->start_soon_period;

        $data->header_title = $request->header_title;
        $data->header_description = $request->header_description;
        $data->footer_description = $request->footer_description;


        $data->courses_header_title = $request->courses_header_title;
        $data->courses_header_description = $request->courses_header_description;


        $data->policy_header_title = $request->policy_header_title;
        $data->policy_header_description = $request->policy_header_description;


        $data->quiz_header_title = $request->quiz_header_title;
        $data->quiz_header_description = $request->quiz_header_description;


        $data->most_required_courses = $request->most_required_courses ? 1 : 0;
        $data->recommend_courses = $request->recommend_courses ? 1 : 0;
        $data->free_courses = $request->free_courses ? 1 : 0;
        $data->top_rated_courses = $request->top_rated_courses ? 1 : 0;
        $data->star_recently_courses = $request->star_recently_courses ? 1 : 0;

        $data->tracks = $request->tracks ? 1 : 0;
        $data->instructors = $request->instructors ? 1 : 0;
        $data->workteam = $request->workteam ? 1 : 0;
        $data->parteners = $request->parteners ? 1 : 0;
        $data->student_opinion = $request->student_opinion ? 1 : 0;
        $data->map_locations = $request->map_locations ? 1 : 0;
        $data->achievements = $request->achievements ? 1 : 0;
        $data->letter_news = $request->letter_news ? 1 : 0;
        $data->book_shop_url = $request->book_shop_url;
        $data->question_list = $request->question_list ? 1 : 0;
        $data->book_store_visiable = $request->book_store_visiable ? 1 : 0;




        $data->save();


        if ($request->hasFile('header_image')) {

            $thumbnail = $request->header_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->header_image = 'uploads/settings/' . $filename;
            $data->save();
        }

        if ($request->hasFile('footer_image')) {

            $thumbnail = $request->footer_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->footer_image = 'uploads/settings/' . $filename;
            $data->save();
        }


        if ($request->hasFile('instructor_guide_file')) {

            $thumbnail = $request->instructor_guide_file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->instructor_guide_file = 'uploads/settings/' . $filename;
            $data->save();
        }


        if ($request->hasFile('student_guide_file')) {

            $thumbnail = $request->student_guide_file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->student_guide_file = 'uploads/settings/' . $filename;
            $data->save();
        }


        if ($request->hasFile('platform_guide_file')) {

            $thumbnail = $request->platform_guide_file;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->platform_guide_file = 'uploads/settings/' . $filename;
            $data->save();
        }


        if ($request->hasFile('courses_header_image')) {

            $thumbnail = $request->courses_header_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/settings/'), $filename);
            $data->courses_header_image = 'uploads/settings/' . $filename;
            $data->save();
        }
        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        return redirect()->back();
    }


    public function aboutUSSetting()
    {
        $data['title'] = trans('admin.settings.aboutus_page');
        $data['row'] = AboutSetting::first();
        return view($this->view . '.about', $data);
    }


    public function saveAboutSetting(Request $request)
    {

        $data = AboutSetting::first();
        if (!$data) {
            $data = new AboutSetting();
        }

        // List of sections
        $sections = ['about', 'mission', 'goals', 'history'];

        foreach ($sections as $section) {
            // Save text fields
            $data->{"{$section}_title_ar"} = $request->input("{$section}_title_ar");
            $data->{"{$section}_title_en"} = $request->input("{$section}_title_en");
            $data->{"{$section}_description_ar"} = $request->input("{$section}_description_ar");
            $data->{"{$section}_description_en"} = $request->input("{$section}_description_en");

            // Save image if uploaded
            if ($request->hasFile("{$section}_image")) {
                $file = $request->file("{$section}_image");
                $filename = $section . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/settings/'), $filename);
                $data->{"{$section}_image"} = 'uploads/settings/' . $filename;
            }
        }


        $data->save();

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }



    public function mailSettings()
    {
        $data['title'] = trans('admin.settings.email_page');
        $data['route'] = $this->route;
        $data['row'] = MailSetting::first();
        return view($this->view . '.mail', $data);
    }

    public function SaveMailSetting(Request $request)
    {
        $data = MailSetting::first();
        if ($data == null)
            $data = new MailSetting();
        $data->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }


    public function zoomSettings()
    {
        $data['title'] = trans('admin.settings.zoom_page');
        $data['route'] = $this->route;
        $data['row'] = ZoomSetting::first();
        return view($this->view . '.zoom', $data);
    }

    public function SaveZoomSetting(Request $request)
    {
        $data = ZoomSetting::first();
        if ($data == null)
            $data = new ZoomSetting();
        $data->update($request->all());
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->back();
    }
}
