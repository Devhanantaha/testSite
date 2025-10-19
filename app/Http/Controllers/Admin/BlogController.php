<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Traits\FileUploader;
use App\Models\Blog;
use Illuminate\Http\Request;
use Toastr;


class BlogController extends Controller
{
    use ApiResponse, FileUploader;


    
    public function __construct()
    {
        $this->title = trans('admin.blogs.list');
        $this->route = 'admin.blogs';
        $this->view = 'admin.blogs';
        $this->path = 'blogs';
        $this->access = 'blogs';
        $this->middleware('permission:blogs-create', ['only' => ['create','store']]);
        $this->middleware('permission:blogs-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:blogs-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:blogs-delete',   ['only' => ['delete']]);
    }
    public function index(Request $request,)
    {
        $data['route'] = $this->route;
        $data['title'] = $this->title;
        $data['rows'] = Blog::where(function($q)use($request){
            if ($request->title)
            $q->Where('title', 'like', '%' . $request->name  . '%');
        })->paginate(10);
        return view($this->view.'.index', $data);
    }

    public function create(Blog $blog)
    {
        $data['title'] = trans('admin.blogs.add');
        $data['route'] = $this->route;
        return view($this->view .'.create',$data);
    }
    public function store(Request $request)
    {
        $blog = Blog::create($request->except('image'));
        if ($request->hasFile('main_image')) {
            $thumbnail = $request->main_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/blogs/main/'),$filename);
            $blog->main_image ='uploads/blogs/main/'.$filename;
            $blog->save();
        }
        Toastr::success(__('admin.msg_created_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.blogs.index');
    }


    public function show($id){
        $blog = Blog::find($id);
        if($blog)
        return $this->okApiResponse(new BlogResource($blog), __('Blog loades successfully'));
        else
        return $this->notFoundApiResponse([],__('Data Not Found'));

    }

    public function edit($id)
    {   
        $data['row'] = Blog::find($id);
        $data['route'] = $this->route;
        $data['title'] = trans('admin.blogs.edit');
        return view($this->view.'.edit',$data);
    }

    public function update(Request $request,Blog $blog)
    {
        $blog->update($request->except('image'));
       
        if ($request->hasFile('main_image')) {
            $thumbnail = $request->main_image;
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('/uploads/blogs/main/'),$filename);
            $blog->main_image ='uploads/blogs/main/'.$filename;
            $blog->save();
        }
        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));
        return redirect()->route('admin.blogs.index');    }

    public function destroy (Request $request)
    {
        $blog = Blog::find($request->id);
        if ($blog)
            $blog->delete();

            Toastr::success(__('admin.msg_deleted_successfully'), __('admin.msg_success'));
            return redirect()->route($this->route.'.index');
    }
}
