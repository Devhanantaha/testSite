<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseTypeController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\PaymentTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\PartenerController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\CvController;
use App\Http\Controllers\Admin\QuestionBankGroupsController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\ProfitController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuizSectionController;
use App\Http\Controllers\Admin\QuizQuestionContr;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\TranslateController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\BulkImportExportController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CertificateAbbreviationController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactMessageController;

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


            Route::resource('banners', BannerController::class);

            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
            Route::resource('courses', CourseController::class);
            Route::resource('courses', CourseController::class);


            Route::resource('comments', CommentController::class);

            Route::get('start-soon-courses', [CourseController::class, 'startSoonCourses'])->name('startsoonCourses');
            Route::get('recommend-courses', [CourseController::class, 'recommendCourses'])->name('recommendCourses');

            Route::resource('tracks', TrackController::class);
            Route::resource('certificates', CertificateController::class);
            Route::resource('certificatesabbreviations', CertificateAbbreviationController::class);

            Route::resource('videos', VideoController::class);

            Route::resource('course-sections', SectionController::class)
                ->names([
                    'index' => 'coursesections.index',
                    'create' => 'coursesections.create',
                    'store' => 'coursesections.store',
                    'show' => 'coursesections.show',
                    'edit' => 'coursesections.edit',
                    'update' => 'coursesections.update',
                    'destroy' => 'coursesections.destroy',
                ]);

            Route::post('changetrackfooter', [TrackController::class, 'changeTrackFooter']);

            Route::resource('blogs', BlogController::class);
            Route::resource('course-types', CourseTypeController::class);
            Route::resource('courses', CourseController::class);

            Route::resource('courses.levels', LevelController::class);
            Route::resource('levels.lectures', LectureController::class);

            Route::resource('certifications', CertificationController::class);
            Route::post('certification/changestatus', [CertificationController::class, 'changeStatus'])->name('certificationchangeStatus');
            Route::get('students-certifications', [CertificationController::class, 'studentCertificate'])->name('studentscertifications');
            Route::get('externel-students-certifications', [CertificationController::class, 'externelstudentCertificate'])->name('externelstudentscertifications');
            Route::get('grantingcertificate', [CertificationController::class, 'grantingcertificate'])->name('grantingcertificate');
            Route::post('postgrantingcertificate', [CertificationController::class, 'postgrantingcertificate'])->name('postgrantingcertificate');
            Route::get('getCertifications', [CertificationController::class, 'getCertifications'])->name('getCertifications');

            Route::get('instructors-tickets', [TicketController::class, 'listInstructorMsg'])->name('instructorstickets');
            Route::get('students-tickets', [TicketController::class, 'listStudentMsg'])->name('studentstickets');
            Route::get('visitors-tickets', [TicketController::class, 'listVisitorMsg'])->name('visitorstickets');
            Route::resource('tickets', TicketController::class);
            Route::post('change-ticket-status', [TicketController::class, 'changeStatus'])->name('tickets.changeStatus');

            Route::resource('listemails', MailController::class);
            Route::get('get-send-mails', [MailController::class, 'sendMails'])->name('sendmails');
            Route::post('send-mails', [MailController::class, 'store'])->name('saveMail');
            Route::get('/export/{model}', [BulkImportExportController::class, 'exportAll'])->name('export.all');

            Route::resource('notifications', NotificationController::class);

            Route::resource('coupons', CouponController::class);
            Route::resource('questions', QuestionController::class);

            Route::resource('students', StudentController::class);
            Route::get('student-status/{id}', [StudentController::class, 'status'])->name('users.status');
            Route::resource('subscriptions', SubscriptionController::class);
            Route::get('subscription-status/{id}', [SubscriptionController::class, 'changeStatus']);
            Route::post('changerecommened', [SubscriptionController::class, 'changerecommened']);
            Route::post('changestatus', [DashboardController::class, 'changestatus']);


            Route::resource('downloads', DownloadController::class);

            Route::resource('instructors', InstructorController::class);
            Route::get('instructors-status/{id}', [InstructorController::class, 'status'])->name('users.status');
            Route::get('/instructor/balance/{id}', [InstructorController::class, 'getBalance']);

            Route::resource('countries', CountryController::class);
            Route::resource('payment-types', PaymentTypeController::class);
            Route::resource('policies', PolicyController::class);

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
            Route::resource('teams', TeamController::class);
            Route::resource('parteners', PartenerController::class);
            Route::resource('cvs', CvController::class);
            Route::resource('reviews', ReviewController::class);
            Route::resource('languages', LanguageController::class);

            /** finical  */
            Route::get('course/profit', [ProfitController::class, 'courseProfit'])->name('courseprofits');
            Route::get('student-payments', [ProfitController::class, 'studentPayment'])->name('studentspayment');
            Route::get('instructor-profits', [ProfitController::class, 'instructorProfits'])->name('instructorProfits');
            Route::get('list-payment-requests', [ProfitController::class, 'listRequest'])->name('listRequest');
            Route::get('list-paid-payment-requests', [ProfitController::class, 'listPaidRequest'])->name('listPaidRequest');
            Route::get('instructors-profits-details/{id}', [ProfitController::class, 'instructorProfitdetails'])->name('instructorProfitdetails');
            Route::post('profitrequest/changestatus', [ProfitController::class, 'changeStatus'])->name('profitrequestchangeStatus');
            Route::post('delete-payment-requests', [ProfitController::class, 'deleteRequest'])->name('destoryrequestprofit');
            Route::post('add-paid-payment-requests', [ProfitController::class, 'addPaidRequest'])->name('addPaidRequest');

            //Questions Bank Groups
            Route::resource('bank-groups', QuestionBankGroupsController::class);
            Route::resource('bank-groups.bank-questions', QuestionsController::class);
            Route::resource('quizzes', QuizController::class);
            Route::resource('quizzes.sections', QuizSectionController::class);
            Route::resource('quizzes.questions', QuizQuestionController::class);
            Route::get('studentsexamresults', [ExamController::class, 'listresult'])->name('studentsexamresults');
            Route::get('student-exam/{id}', [ExamController::class, 'studentexam'])->name('studentexam');

            Route::resource('faculities', FacultyController::class);
            Route::resource('subjects', SubjectController::class);
            Route::get('subjects/create/{classroom?}', [SubjectController::class, 'create'])->name('subjects.create');
            Route::get('subjects?classroom=1', [SubjectController::class, 'index'])->name('subjects.firstsubjects');
            Route::get('subjects?classroom=2', [SubjectController::class, 'index'])->name('subjects.secondsubjects');
            Route::get('subjects?classroom=3', [SubjectController::class, 'index'])->name('subjects.thirdsubjects');

            Route::get('setting/bulk-import-export', [BulkImportExportController::class, 'importExportView'])->name('bulk.import-export');
            Route::post('setting/bulk-import/{table}', [BulkImportExportController::class, 'import'])->name('bulk.import');
            Route::get('/export-questions/{bank_id}', [BulkImportExportController::class, 'exportQuestions'])->name('export.questions');
            Route::get('/export-table/{table}', [BulkImportExportController::class, 'export'])->name('bulk.export');

            // Translations Routes
            Route::get('translations', [TranslateController::class, 'index'])->name('translations.index');
            Route::post('translations/create', 'TranslateController@store')->name('translations.create');
            Route::post('translations/update', 'TranslateController@transUpdate')->name('translation.update.json');
            Route::post('translations/updateKey', 'TranslateController@transUpdateKey')->name('translation.update.json.key');
            Route::delete('translations/destroy/{key}', 'TranslateController@destroy')->name('translations.destroy');
        });
    }
);
