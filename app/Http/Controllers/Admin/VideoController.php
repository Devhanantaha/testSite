<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\Video;
use Illuminate\Http\Request;
use Toastr;

class VideoController extends Controller
{
    use ApiResponse, FileUploader;

    public function __construct()
    {
        $this->title  = trans('admin.videos.title');
        $this->route  = 'admin.videos';
        $this->view   = 'admin.videos';
        $this->path   = 'videos';
        $this->access = 'videos';

        $this->middleware('permission:videos-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:videos-view', ['only' => ['show', 'index']]);
        $this->middleware('permission:videos-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:videos-delete', ['only' => ['destroy']]);
    }

    /**
     * Display all videos.
     */
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;

        $data['rows'] = Video::when($request->name, function ($q) use ($request) {
            $q->where('name_en', 'like', '%' . $request->name . '%')
                ->orWhere('name_ar', 'like', '%' . $request->name . '%');
        })
            ->orderByDesc('id')
            ->paginate(10);

        return view($this->view . '.index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data['title'] = trans('admin.videos.add');
        $data['route'] = $this->route;
        return view($this->view . '.create', $data);
    }

    /**
     * Store new video
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en'         => 'required|string|max:255',
            'name_ar'         => 'required|string|max:255',
            'description_en'  => 'nullable|string',
            'description_ar'  => 'nullable|string',
            'url'             => 'nullable|url|max:255',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'active'          => 'nullable|boolean',
        ]);

        $data = $request->only(['name_en', 'name_ar', 'description_en', 'description_ar', 'url', 'active']);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/videos/files/'), $fileName);
            $data['image'] = 'uploads/videos/files/' . $fileName;
        }

        Video::create($data);

        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }

    /**
     * Edit video
     */
    public function edit($id)
    {
        $data['row'] = Video::findOrFail($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.videos.edit');
        return view($this->view . '.edit', $data);
    }

    /**
     * Update video
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'name_en'         => 'required|string|max:255',
            'name_ar'         => 'required|string|max:255',
            'description_en'  => 'nullable|string',
            'description_ar'  => 'nullable|string',
            'url'             => 'nullable|url|max:255',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'active'          => 'nullable|boolean',
        ]);

        $data = $request->only(['name_en', 'name_ar', 'description_en', 'description_ar', 'url', 'active']);

        if ($request->hasFile('image')) {
            if ($video->image && file_exists(public_path($video->image))) {
                unlink(public_path($video->image));
            }
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/videos/files/'), $fileName);
            $data['image'] = 'uploads/videos/files/' . $fileName;
        }

        $video->update($data);

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }

    /**
     * Delete video
     */
    public function destroy(Request $request)
    {
        $video = Video::find($request->id);
        if ($video) {
            if ($video->image && file_exists(storage_path('app/public/' . $video->image))) {
                unlink(storage_path('app/public/' . $video->image));
            }
            $video->delete();
            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
        }
        return redirect()->route($this->route . '.index');
    }
}
