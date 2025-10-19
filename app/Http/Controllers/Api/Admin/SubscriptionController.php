<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $subscriptions = Subscription::where(function($q)use($request){
            if ($request->student_id)
            $q->Where('student_id',  $request->student_id );
            if ($request->course_id)
            $q->Where('course_id',  $request->course_id );
            if ($request->track_id)
            $q->Where('track_id',  $request->track_id );
        })->get();
        return $this->okApiResponse(SubscriptionResource::collection($subscriptions), __('Subscriptions loaded'));
    }

    public function store(SubscriptionRequest $request)
    {
        $subscription= Subscription::create($request->except('payment_attachment'));
        if ($request->hasFile('payment_attachment')) {
            $directory = 'subscriptions';
            $attach = 'payment_attachment';
            $subscription->payment_attachment = 'uploads/' .$directory .'/'.$this->uploadMedia($request,$attach, $directory);
            $subscription->save();
        }
     
        return $this->okApiResponse(new SubscriptionResource($subscription), __('Subscription add successfully'));
    }

    public function show($id){
        $subscription= Subscription::find($id);
        if($subscription)
        return $this->okApiResponse(new SubscriptionResource($subscription), __('Subscription loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(SubscriptionRequest $request)
    {
        $subscription= Subscription::find($request->id);
        $subscription->update($request->except('payment_attachment'));
        if ($request->hasFile('payment_attachment')) {
            $directory = 'subscriptions';
            $attach = 'payment_attachment';
            $subscription->payment_attachment = 'uploads/' .$directory .'/'.$this->uploadMedia($request,$attach, $directory);
            $subscription->save();
        }
        return $this->okApiResponse(new SubscriptionResource($subscription), __('Subscription updated successfully'));
    }

    public function delete(Request $request)
    {
       $subscription=  Subscription::find($request->id);
       if($subscription)
       $subscription->delete();
        return $this->okApiResponse('', __('Subscription deleted successfully'));
    }
}
