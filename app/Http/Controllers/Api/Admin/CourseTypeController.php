<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\CourseTypeResource;
use App\Http\Requests\CourseTypeRequest;
use App\Http\Requests\UpdateCourseTypeRequest;
use App\Models\CourseType;


class CourseTypeController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $countrys = CourseType::active()->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->get();
        return $this->okApiResponse(CourseTypeResource::collection($countrys), __('Types loaded'));
    }

    public function store(CourseTypeRequest $request)
    {
        $country = CourseType::create($request->all());
        return $this->okApiResponse(new CourseTypeResource($country), __('Course Type add successfully'));
    }


    public function show($id){
        $type = CourseType::find($id);
        if($type)
        return $this->okApiResponse(new CourseTypeResource($type), __('Course Type loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(UpdateCourseTypeRequest $request)
    {
        $type = CourseType::find($request->id);
        $type->update($request->all());
        return $this->okApiResponse(new CourseTypeResource($type), __('Type updated successfully'));
    }

    public function delete(Request $request)
    {
        $type = CourseType::find($request->id);
        if($type)
        $type->delete();
        return $this->okApiResponse('', __('Type deleted successfully'));
    }
}
