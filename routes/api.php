<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\Api\Admin\TrackController;
use App\Http\Controllers\Api\Admin\CountryController;
use App\Http\Controllers\Api\Admin\CourseTypeController;
use App\Http\Controllers\Api\Admin\CourseController;
use App\Http\Controllers\Api\Admin\StudentController;
use App\Http\Controllers\Api\Admin\InstructorController;
use App\Http\Controllers\Api\Admin\CouponController;
use App\Http\Controllers\Api\Admin\PaymentTypeController;
use App\Http\Controllers\Api\Admin\SubscriptionController;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Instructor\HomeController;
use App\Http\Controllers\Api\Instructor\WithdrawalController;
use App\Http\Controllers\Api\Instructor\ProfitController;
use App\Http\Controllers\Api\Instructor\CourseController as InstructorCourseController;
use App\Http\Controllers\Api\Instructor\AuthController as InstructorAuthController;
use App\Http\Controllers\Api\Student\HomeController as StudentHomeController;
use App\Http\Controllers\Api\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Api\Student\AuthController as StudentAuthController;
use App\Http\Controllers\Api\FrontEnd\CourseController as FrontCourseController;

Route::post('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/student/login', [StudentAuthController::class, 'login']);
Route::post('/student/register', [StudentAuthController::class, 'register']);
Route::post('/instructor/login', [InstructorAuthController::class, 'login']);
Route::post('/instructor/register', [InstructorAuthController::class, 'register']);

Route::group(['prefix' => 'admin'], function () {

    Route::middleware(['auth:api'])->group(function () {

        Route::group(['prefix' => 'students'], function () {

            Route::get('/', [StudentController::class, 'list']);
            Route::get('/export-to-excel', [StudentController::class, 'ExportToExcel']);
            Route::post('/store', [StudentController::class, 'store']);
            Route::post('/update', [StudentController::class, 'update']);
            Route::get('/{id}', [StudentController::class, 'show']);
            Route::post('/delete', [StudentController::class, 'delete']);
        });

        Route::group(['prefix' => 'instructors'], function () {
            Route::get('/', [InstructorController::class, 'list']);
            Route::get('/export-to-excel', [InstructorController::class, 'ExportToExcel']);
            Route::post('/store', [InstructorController::class, 'store']);
            Route::post('/update', [InstructorController::class, 'update']);
            Route::get('/{id}', [InstructorController::class, 'show']);
            Route::post('/delete', [InstructorController::class, 'delete']);
        });

        Route::group(['prefix' => 'courses'], function () {

            Route::get('/', [CourseController::class, 'list']);
            Route::get('/export-to-excel', [CourseController::class, 'ExportToExcel']);
            Route::post('/store', [CourseController::class, 'store']);
            Route::post('/update', [CourseController::class, 'update']);
            Route::get('/{id}', [CourseController::class, 'show']);
            Route::post('/delete', [CourseController::class, 'delete']);
        });


        Route::group(['prefix' => 'tracks'], function () {
            Route::get('/', [TrackController::class, 'list']);
            Route::post('/store', [TrackController::class, 'store']);
            Route::post('/update', [TrackController::class, 'update']);
            Route::get('/{id}', [TrackController::class, 'show']);
            Route::post('/delete', [TrackController::class, 'delete']);
            Route::post('/change-status', [TrackController::class, 'toggoleStatus']);
        });


        Route::group(['prefix' => 'countries'], function () {
            Route::get('/', [CountryController::class, 'list']);
            Route::post('/store', [CountryController::class, 'store']);
            Route::post('/update', [CountryController::class, 'update']);
            Route::get('/{id}', [CountryController::class, 'show']);
            Route::post('/delete', [CountryController::class, 'delete']);
            Route::post('/change-status', [CountryController::class, 'toggoleStatus']);
        });


        Route::group(['prefix' => 'courseTypes'], function () {

            Route::get('/', [CourseTypeController::class, 'list']);
            Route::post('/store', [CourseTypeController::class, 'store']);
            Route::post('/update', [CourseTypeController::class, 'update']);
            Route::get('/{id}', [CourseTypeController::class, 'show']);
            Route::post('/delete', [CourseTypeController::class, 'delete']);
            Route::post('/change-status', [CourseTypeController::class, 'toggoleStatus']);
        });


        Route::group(['prefix' => 'paymentTypes'], function () {

            Route::get('/', [PaymentTypeController::class, 'list']);
            Route::post('/store', [PaymentTypeController::class, 'store']);
            Route::post('/update', [PaymentTypeController::class, 'update']);
            Route::get('/{id}', [PaymentTypeController::class, 'show']);
            Route::post('/delete', [PaymentTypeController::class, 'delete']);
        });


        Route::group(['prefix' => 'coupons'], function () {

            Route::get('/', [CouponController::class, 'list']);
            Route::post('/store', [CouponController::class, 'store']);
            Route::post('/update', [CouponController::class, 'update']);
            Route::get('/{id}', [CouponController::class, 'show']);
            Route::post('/delete', [CouponController::class, 'delete']);
        });


        Route::group(['prefix' => 'subscriptions'], function () {

            Route::get('/', [SubscriptionController::class, 'list']);
            Route::post('/store', [SubscriptionController::class, 'store']);
            Route::post('/update', [SubscriptionController::class, 'update']);
            Route::get('/{id}', [SubscriptionController::class, 'show']);
            Route::post('/delete', [SubscriptionController::class, 'delete']);
        });
    });
});

Route::group(['middleware' => ['auth:instructors'], 'prefix' => 'instructor'], function () {

    Route::get('/home', [HomeController::class, 'list']);
    Route::get('withdrawal', [WithdrawalController::class, 'list']);
    Route::post('/add-withdrawal', [WithdrawalController::class, 'store']);

    Route::get('list-courses', [InstructorCourseController::class, 'list']);
    Route::get('course/{id}', [InstructorCourseController::class, 'show']);


    Route::get('list-students', [StudentController::class, 'list']);

    Route::get('profits', [ProfitController::class, 'list']);
});


Route::group(['middleware' => ['auth:students'], 'prefix' => 'student'], function () {

    Route::get('/home', [StudentHomeController::class, 'list']);
    Route::get('list-courses', [StudentCourseController::class, 'list']);
    Route::get('course/{id}', [StudentCourseController::class, 'show']);
});


/** Front End  */
Route::get('/courses', [FrontCourseController::class, 'list']);
Route::get('/course/{id}', [FrontCourseController::class, 'show']);


