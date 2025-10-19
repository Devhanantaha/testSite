<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Http\Resources\TrackResource;
use App\Http\Requests\TrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Models\Track;
use Illuminate\Http\Request;


class TrackController extends Controller
{
    use ApiResponse, FileUploader;


    public function list(Request $request)
    {
        $tracks = Track::active()->where(function($q)use($request){
            if ($request->name)
            $q->Where('name', 'like', '%' . $request->name  . '%');
        })->get();
        return $this->okApiResponse(TrackResource::collection($tracks), __('Tracks loaded'));
    }

    public function store(TrackRequest $request)
    {
        $track = Track::create($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'tracks';
            $attach = 'image';
            $track->image = $this->uploadMedia($request, $attach, $directory);
            $track->save();
        }
        return $this->okApiResponse(new TrackResource($track), __('Track add successfully'));
    }


    public function show($id){
        $track = Track::find($id);
        if($track)
        return $this->okApiResponse(new TrackResource($track), __('Track loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function update(UpdateTrackRequest $request)
    {
        $track = Track::find($request->id);
        $track->update($request->except('image'));
        if ($request->hasFile('image')) {
            $directory = 'tracks';
            $attach = 'image';
            $track->image = $this->uploadMedia($request, $attach, $directory);
            $track->save();
        }
        return $this->okApiResponse(new TrackResource($track), __('Track updated successfully'));
    }

    public function delete(Request $request)
    {
        $track = Track::find($request->id);
        if ($track)
            $track->delete();

        return $this->okApiResponse('', __('Track deleted successfully'));
    }
}
