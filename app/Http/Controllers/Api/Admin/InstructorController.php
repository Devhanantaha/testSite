<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exports\InstructorsExport;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\InstructorResource;
use App\Http\Requests\InstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Bcrypt;
use Maatwebsite\Excel\Facades\Excel;


class InstructorController extends Controller
{
 use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $instructors = Instructor::active()->where(function($q)use($request){
            if ($request->name)
            $q->Where('first_name', 'like', '%' . $request->name  . '%')
           ->orWhere('last_name', 'like', '%' . $request->name  . '%');
           if ($request->phone)
           $q->Where('phone', $request->phone);
           if ($request->email)
           $q->Where('email', $request->email);
        })->get();
        return $this->okApiResponse(InstructorResource::collection($instructors), __('instructors loaded'));
    }

    public function store(InstructorRequest $request)
    {
        $instructor = Instructor::create($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'instructors';
            $attach = 'image';
            $instructor->image = $this->uploadMedia($request,$attach, $directory);
            $instructor->save();
        }

        if($request->password){
            $instructor->password = Bcrypt($request->password);
            $instructor->save();
        }
        return $this->okApiResponse(new InstructorResource($instructor), __('instructor add successfully'));
    }


    public function show($id){
        $instructor = Instructor::find($id);
        if($instructor)
        return $this->okApiResponse(new InstructorResource($instructor), __('instructor loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(UpdateInstructorRequest $request)
    {
        $instructor = Instructor::find($request->id);
        $instructor->update($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'instructors';
            $attach = 'image';
            $instructor->image = $this->uploadMedia($request,$attach, $directory);
            $instructor->save();
        }

        if($request->password){
            $instructor->password = Bcrypt($request->password);
            $instructor->save();
        }
        return $this->okApiResponse(new InstructorResource($instructor), __('instructor updated successfully'));
    }

    public function delete(Request $request)
    {
        $instructor = Instructor::find($request->id);
        if($instructor)
        $instructor->delete();
        return $this->okApiResponse('', __('instructor deleted successfully'));
    }


    public function ExportToExcel(Request $request){

        return Excel::download(new InstructorsExport, 'Instructors.xlsx');

    }

}
