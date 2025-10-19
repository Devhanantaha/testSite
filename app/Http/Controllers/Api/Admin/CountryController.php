<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\CountryResource;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $countries = Country::active()->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->get();
        return $this->okApiResponse(CountryResource::collection($countries), __('countries loaded'));
    }

    public function store(CountryRequest $request)
    {
        $country = Country::create($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'Countrys';
            $attach = 'image';
            $country->image = $this->uploadMedia($request,$attach, $directory);
            $country->save();
        }
        return $this->okApiResponse(new CountryResource($country), __('Country add successfully'));
    }

    public function show($id){
        $country = Country::find($id);
        if($country)
        return $this->okApiResponse(new CountryResource($country), __('Country loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(UpdateCountryRequest $request)
    {
        $country = Country::find($request->id);
        $country->update($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'countries';
            $attach = 'image';
            $country->image = $this->uploadMedia($request,$attach, $directory);
            $country->save();
        }
        return $this->okApiResponse(new CountryResource($country), __('Country updated successfully'));
    }

    public function delete(Request $request)
    {
       $country =  Country::find($request->id);
       if($country)
       $country->delete();
        return $this->okApiResponse('', __('Country deleted successfully'));
    }
}
