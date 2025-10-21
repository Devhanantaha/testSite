<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseTypeController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TranslateController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\NewsController;




// Set Lang Version
Route::get('locale/language/{locale}', function ($locale) {

    \Session::put('locale', $locale);

    \App::setLocale($locale);

    return redirect()->back();
})->name('version');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin',

        'middleware' => ['localeSessionRedirect', 'localize', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Auth::routes([
            'login'    => true,
            'logout'   => true,
            'register' => false,
            'reset'    => false,   // for resetting passwords
            'confirm'  => false,  // for additional password confirmations
            'verify'   => false,  // for email verification
        ]);




        //, 'prevent-inactive-user'
        Route::name('admin.')->middleware(['auth:web'])->group(function () {
            Route::resource('fields', FieldController::class);
            Route::resource('news', NewsController::class);

            Route::resource('projects', ProjectController::class);

            Route::resource('banners', BannerController::class);

            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
            Route::resource('courses', CourseController::class);
            Route::resource('levels', controller: LevelController::class);

            Route::resource('courses', CourseController::class);

            Route::get('start-soon-courses', [CourseController::class, 'startSoonCourses'])->name('startsoonCourses');
            Route::get('recommend-courses', [CourseController::class, 'recommendCourses'])->name('recommendCourses');

            Route::resource('tracks', TrackController::class);

            Route::resource('videos', VideoController::class);

            Route::post('changetrackfooter', [TrackController::class, 'changeTrackFooter']);

            Route::resource('blogs', BlogController::class);
            Route::resource('course-types', CourseTypeController::class);
            Route::resource('courses', CourseController::class);

            Route::resource('questions', QuestionController::class);

            Route::post('changestatus', [DashboardController::class, 'changestatus']);


            Route::resource('downloads', DownloadController::class);


            Route::resource('countries', CountryController::class);

            Route::resource('users', UserController::class);
            Route::resource('roles', RoleController::class);
            Route::get('user-status/{id}', [UserController::class, 'status'])->name('users.status');
            Route::post('user-send-password/{id}', [UserController::class, 'sendPassword'])->name('users.send-password');
            Route::post('user-password-change', [UserController::class, 'passwordChange'])->name('users-password-change');
            /** Setting Route  */
            Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
            Route::post('siteinfo', [SettingController::class, 'siteinfo'])->name('setting.siteinfo');

            Route::get('contact-us-settings', [SettingController::class, 'contactUs'])->name('settings.contactUs');
            Route::post('contact-us-settings', [SettingController::class, 'SaveContactUs'])->name('setting.SaveContactUs');
            Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contacts.index');
            Route::get('contact-messages/{message}', [ContactMessageController::class, 'show'])->name('contacts.show');

            Route::get('mail-settings', [SettingController::class, 'mailSettings'])->name('settings.mail');
            Route::post('mail-settings', [SettingController::class, 'SaveMailSetting'])->name('setting.SaveMail');

            Route::get('zoom-settings', [SettingController::class, 'zoomSettings'])->name('settings.zoom');
            Route::post('zoom-settings', [SettingController::class, 'SaveZoomSetting'])->name('setting.SaveZoom');

            Route::get('landing-page-settings', [SettingController::class, 'landingSetting'])->name('setting.landingSetting');
            Route::post('landing-settings', [SettingController::class, 'SaveLandingSetting'])->name('setting.SaveContactUs');

            Route::get('about-us-settings', [SettingController::class, 'aboutUSSetting'])->name('settings.aboutUSSetting');
            Route::post('about-us-settings', [SettingController::class, 'saveAboutSetting'])->name('setting.saveAboutSetting');


            // Translations Routes
            Route::get('translations', [TranslateController::class, 'index'])->name('translations.index');
            Route::post('translations/create', 'TranslateController@store')->name('translations.create');
            Route::post('translations/update', 'TranslateController@transUpdate')->name('translation.update.json');
            Route::post('translations/updateKey', 'TranslateController@transUpdateKey')->name('translation.update.json.key');
            Route::delete('translations/destroy/{key}', 'TranslateController@destroy')->name('translations.destroy');
        });
    }
);
