<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $students = Student::active()->where(function($q)use($request){
            if ($request->name)
            $q->Where('first_name', 'like', '%' . $request->name  . '%')
           ->orWhere('last_name', 'like', '%' . $request->name  . '%');
           if ($request->phone)
           $q->Where('phone', $request->phone);
           if ($request->email)
           $q->Where('email', $request->email);
        })->get();
        return $this->okApiResponse(StudentResource::collection($students), __('students loaded'));
    }

    public function store(StudentRequest $request)
    {
        $student = Student::create($request->except(['image','password']));
        if ($request->hasFile('image')) {
            $directory = 'students';
            $attach = 'image';
            $student->image = $this->uploadMedia($request,$attach, $directory);
            $student->save();
        }

        $student->password = Bcrypt($request->password);
        $student->save();

        return $this->okApiResponse(new StudentResource($student->load(['track','country'])), __('Student add successfully'));
    }

    public function show($id){
        $student = Student::find($id);
        if($student)
        return $this->okApiResponse(new StudentResource($student), __('Student loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(UpdateStudentRequest $request)
    {
        $student = Student::find($request->id);
        $student->update($request->except(['image','password']));
        if ($request->hasFile('image')) {
            $directory = 'students';
            $attach = 'image';
            $student->image = $this->uploadMedia($request,$attach, $directory);
            $student->save();
        }
        if($request->password){
            $student->password = Bcrypt($request->password);
            $student->save();
        }
        return $this->okApiResponse(new StudentResource($student), __('Student updated successfully'));
    }

    public function delete(Request $request)
    {

        $student = Student::find($request->id);
        if($student)
        $student->delete();
        return $this->okApiResponse('', __('Student deleted successfully'));
    }

    public function ExportToExcel(){
        return "success";
     
        // return Excel::download(new StudentsExport, 'students.xlsx');

    }
}
