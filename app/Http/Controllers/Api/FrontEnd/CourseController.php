<?php

namespace App\Http\Controllers\Api\FrontEnd;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use App\Models\Course;



class CourseController extends Controller
{
    use ApiResponse;


    public function list(Request $request)
    {
        $courses = Course::active()->where(function ($q) use ($request) {
            if ($request->name)
                $q->Where('name', 'like', '%' . $request->name  . '%');
            if ($request->instructor_id)
                $q->where('instructor_id', $request->instructor_id);
            if ($request->track_id)
                $q->where('track_id', $request->track_id);
                if ($request->course_type)
                $q->where('course_type_id', $request->course_type);
        })->get();
        return $this->okApiResponse(CourseResource::collection($courses), __('courses loaded'));
    }




    public function show($id){
        $course = Course::find($id);
        if($course)
        return $this->okApiResponse(new CourseResource($course), __('course loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    
}
