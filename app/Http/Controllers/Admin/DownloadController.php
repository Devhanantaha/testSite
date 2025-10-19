<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\Download;
use Illuminate\Http\Request;
use Toastr;

class DownloadController extends Controller
{
    use ApiResponse, FileUploader;

    public function __construct()
    {
        $this->title = trans('admin.downloads.title');
        $this->route = 'admin.downloads';
        $this->view  = 'admin.downloads';
        $this->path  = 'downloads';
        $this->access = 'downloads';

        $this->middleware('permission:downloads-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:downloads-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:downloads-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:downloads-delete', ['only' => ['destroy']]);
    }

    /**
     * Display all downloads.
     */
    public function index(Request $request)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;

        $data['rows'] = Download::where(function ($q) use ($request) {
            if ($request->title) {
                $q->where('title_en', 'like', '%' . $request->title . '%')
                    ->orWhere('title_ar', 'like', '%' . $request->title . '%');
            }
        })->orderByDesc('id')->paginate(10);

        return view($this->view . '.index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data['title'] = trans('admin.downloads.add');
        $data['route'] = $this->route;
        return view($this->view . '.create', $data);
    }





    public function store(Request $request)
    {
        $request->validate([
            'title_en'   => 'required|string|max:255',
            'title_ar'   => 'required|string|max:255',
            'url'        => 'nullable|url|max:255',
            'attachment' => 'nullable|file|max:10240', // 10 MB max
            'active'     => 'nullable|boolean',
        ]);

        $data = $request->only(['title_en', 'title_ar', 'url', 'active']);

        if ($request->hasFile('attachment')) {
            $fileName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $request->attachment->move(public_path('uploads/downloads/files/'), $fileName);
            $data['attachment'] = 'uploads/downloads/files/' . $fileName;
        }

        Download::create($data);

        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }

    public function edit($id)
    {
        $data['row'] = Download::findOrFail($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.downloads.edit');
        return view($this->view . '.edit', $data);
    }

    public function update(Request $request, Download $download)
    {
        $request->validate([
            'title_en'   => 'required|string|max:255',
            'title_ar'   => 'required|string|max:255',
            'url'        => 'nullable|url|max:255',
            'attachment' => 'nullable|file|max:10240',
            'active'     => 'nullable|boolean',
        ]);

        $data = $request->only(['title_en', 'title_ar', 'url', 'active']);

        if ($request->hasFile('attachment')) {
            if ($download->attachment && file_exists(public_path($download->attachment))) {
                unlink(public_path($download->attachment));
            }

            $fileName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $request->attachment->move(public_path('uploads/downloads/files/'), $fileName);
            $data['attachment'] = 'uploads/downloads/files/' . $fileName;
        }

        $download->update($data);

        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route($this->route . '.index');
    }




    /**
     * Delete download
     */
    public function destroy(Request $request)
    {
        $download = Download::find($request->id);
        if ($download) {
            $download->delete();
            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
        }
        return redirect()->route($this->route . '.index');
    }
}
