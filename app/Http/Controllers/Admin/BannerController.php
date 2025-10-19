<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Toastr;

class BannerController extends Controller
{
    protected $title = 'Banners';
    protected $route = 'admin.banners';
    protected $view  = 'admin.banners';

    public function index()
    {
        $rows = Banner::latest()->paginate(10);
        return view("{$this->view}.index", [
            'rows' => $rows,
            'title' => __('admin.banners.title'),
            'route' => $this->route,
        ]);
    }

    public function create()
    {
        return view("{$this->view}.create", [
            'title' => __('admin.banners.add'),
            'route' => $this->route,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'url' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/banners/files/'), $fileName);
            $data['image'] = 'uploads/banners/files/' . $fileName;
        }

        Banner::create($data);
        Toastr::success(__('admin.msg_added_successfully'));
        return redirect()->route("{$this->route}.index");
    }

    public function edit(Banner $banner)
    {
        return view("{$this->view}.edit", [
            'row' => $banner,
            'title' => __('admin.banners.edit'),
            'route' => $this->route,
        ]);
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'url' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'active' => 'required|boolean',
        ]);


        if ($request->hasFile('image')) {
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/banners/files/'), $fileName);
            $data['image'] = 'uploads/banners/files/' . $fileName;
        }

        $banner->update($data);
        Toastr::success(__('admin.msg_updated_successfully'));
        return redirect()->route("{$this->route}.index");
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        Toastr::success(__('admin.msg_deleted_successfully'));
        return back();
    }
}
