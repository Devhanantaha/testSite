<?php

namespace App\Http\Controllers\Api\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\Withdrawal;
use Carbon\Carbon;

class WithdrawalController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $login_id = auth()->guard('instructors')->user()->id;
        $data = Withdrawal::where('instructor_id',$login_id)->get();
        return $this->okApiResponse($data, __('data loaded'));
    }


    public function store(Request $request)
    {
        $request->merge(['instructor_id'=> auth()->guard('instructors')->user()->id ,'date'=> Carbon::today(),'status'=>'1']) ;
        $data = Withdrawal::create($request->all());
        return $this->okApiResponse($data, __('data loaded'));
    }

}
