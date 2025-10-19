<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\CountryResource;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;

class CouponController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $coupons = Coupon::active()->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->get();
        return $this->okApiResponse($coupons, __('Coupones loaded'));
    }

    public function store(CouponRequest $request)
    {
        $coupon = Coupon::create($request->all());
     
        return $this->okApiResponse($coupon, __('coupon add successfully'));
    }

    public function show($id){
        $coupon = Coupon::find($id);
        if($coupon)
        return $this->okApiResponse($coupon, __('coupon loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(UpdateCouponRequest $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->update($request->all());
        return $this->okApiResponse($coupon, __('coupon updated successfully'));
    }

    public function delete(Request $request)
    {
       $coupon =  Coupon::find($request->id);
       if($coupon)
       $coupon->delete();
        return $this->okApiResponse('', __('coupon deleted successfully'));
    }
}
