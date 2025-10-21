<?php

namespace App\Providers;

use App\Models\AboutSetting;
use App\Models\Setting;
use App\Models\Course;
use App\Models\Country;
use App\Models\CourseType;
use App\Models\Student;
use App\Models\Track;
use App\Models\PaymentType;
use App\Models\Level;
use App\Models\Instructor;
use App\Models\LandingSetting;
use App\Models\Lecture;
use App\Models\Subscription;
use App\Models\Ticket;
use App\Models\Policy;
use App\Models\Download;
use App\Models\Team;
use App\Models\BankGroup;
use App\Models\Banner;
use App\Models\Faculty;
use App\Models\Review;
use App\Models\Blog;
use App\Models\CertificationAbbreviation;
use App\Models\Field;
use App\Models\News;
use App\Models\Section;
use App\Models\Video;
use App\Models\Year;


use View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use PHPUnit\Framework\Constraint\Count;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::where('status', '1')->first();
        $banners  = Banner::active()->latest()->get();
        $countries = Country::active()->get();
        $about = AboutSetting::first();
        $landingSetting = LandingSetting::first();
        $blogs = Blog::active()->latest()->get();
        $sections = Section::active()->latest()->get();
        $downloads = Download::active()->latest()->get();
        $videos = Video::active()->latest()->get();
        $news = News::latest()->get();
        $fields = Field::latest()->get();
        $levels = Level::latest()->get();




        View::share([
            'setting' => $setting,
            'levels' => $levels,
            'fields' => $fields,
            'news' => $news,
            'countries' => $countries,
            'about' => $about,
            'landing_setting' => $landingSetting,
            'banners' => $banners,
            'blogs' => $blogs,
            'sections' => $sections,
            'downloads' => $downloads,
            'videos' => $videos

        ]);
    }
}
