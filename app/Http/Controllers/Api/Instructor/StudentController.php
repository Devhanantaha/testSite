<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\StudentResource;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\Student;
use App\Models\Subscription;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $login_id = auth()->guard('instructors')->user()->id;
        $courses = Course::where('instructor_id',$login_id)->pluck('id')->ToArray();
        $subscriptions = Subscription::with(['student','course'])->whereIn('course_id',$courses)->get();
        return $this->okApiResponse($subscriptions, __('data loaded'));
    }

}