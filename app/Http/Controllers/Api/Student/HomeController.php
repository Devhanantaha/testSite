<?php

namespace App\Http\Controllers\Api\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\PaymentType;
use App\Models\Subscription;

class HomeController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $login_id = auth()->guard('students')->user()->id;
        $courses = Course::where('instructor_id',$login_id)->get();
        $data['courseCount'] = $courses->count();
        $data['studentsCount'] = Subscription::where('course_id',$courses->pluck('id')->ToArray())->count();
        return $this->okApiResponse($data, __('data loaded'));
    }

}
