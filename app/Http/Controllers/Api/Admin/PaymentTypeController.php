<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\PaymentType;


class PaymentTypeController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $payments = PaymentType::active()->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->get();
        return $this->okApiResponse($payments, __('Types loaded'));
    }

    public function store(Request $request)
    {
        $country = PaymentType::create($request->all());
        return $this->okApiResponse($country, __('Payment Type add successfully'));
    }


    public function show($id){
        $type = PaymentType::find($id);
        if($type)
        return $this->okApiResponse($type, __(' Type loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(Request $request)
    {
        $type = PaymentType::find($request->id);
        $type->update($request->all());
        return $this->okApiResponse($type, __('Type updated successfully'));
    }

    public function delete(Request $request)
    {
        $type = PaymentType::find($request->id);
        if($type)
        $type->delete();
        return $this->okApiResponse('', __('Type deleted successfully'));
    }
}
