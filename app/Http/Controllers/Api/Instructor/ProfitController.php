<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Http\Resources\CourseResource;
use App\Models\Course;


class ProfitController extends Controller
{
    use ApiResponse;
    public function list(Request $request)
    {
        $login_id = auth()->guard('instructors')->user()->id;
        $courses = Course::where('instructor_id',$login_id)->get();
        return $this->okApiResponse(CourseResource::collection($courses), __('courses loaded'));
    }

  
}
