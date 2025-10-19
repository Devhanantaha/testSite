<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Http\Resources\CourseResource;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CourseExport;


class CourseController extends Controller
{
    use ApiResponse;
    use  FileUploader;


    public function list(Request $request)
    {
        $login_id = auth()->guard('students')->user()->id;
        $courses = Course::active()->where(function ($q) use ($request) {
            if ($request->name)
                $q->Where('name', 'like', '%' . $request->name  . '%');
            if ($request->instructor_id)
                $q->where('instructor_id', $request->instructor_id);
            if ($request->track_id)
                $q->where('track_id', $request->track_id);
                if ($request->course_type)
                $q->where('course_type_id', $request->course_type);
        })->where('instructor_id',$login_id)->get();
        return $this->okApiResponse(CourseResource::collection($courses), __('courses loaded'));
    }

  


    public function show($id){
        $course = Course::find($id);
        if($course)
        return $this->okApiResponse(new CourseResource($course), __('course loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

 

    public function ExportToExcel(Request $request){

        return Excel::download(new CourseExport, 'courses.xlsx');

    }
}
