<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // Module Data
        $this->title     = trans('admin.roles.title');
        $this->route     = 'admin.roles';
        $this->view      = 'admin.roles';
        $this->path      = 'role';
        $this->access    = 'role';

        $this->middleware('permission:roles-create', ['only' => ['create','store']]);
        $this->middleware('permission:roles-view',   ['only' => ['show', 'index']]);
        $this->middleware('permission:roles-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:roles-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['path']      = $this->path;
        $data['access']    = $this->access;

        $data['roles'] = Role::orderBy('id', 'asc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['path']      = $this->path;

        $data['permission'] = Permission::orderBy('order')->orderBy('group')->get();

        return view($this->view.'.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
       

        // Insert Data
         DB::beginTransaction();
        $role = Role::create(['name' => $request->input('name'), 'slug' => Str::slug($request->input('name'), '-')]);

        $intArray = array_map('intval', $request->input('permission'));
        $role->syncPermissions($intArray);
         DB::commit();

        
        Toastr::success(__('msg_created_successfully'), __('admin.msg_success'));

        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['path']      = $this->path;

        $data['role'] = Role::find($id);

        $data['rolePermissions'] = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view($this->view.'.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['path']      = $this->path;

        $data['role'] = Role::find($id);
        $data['permission'] = Permission::orderBy('order')->orderBy('group')->get();

        $data['rolePermissions'] = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       

        // Update Data
        $request->validate([
            'name'=>'required|unique:roles,name,'.$id,
            'permission' => 'required'
        ]);
        DB::beginTransaction();
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $intArray = array_map('intval', $request->input('permission'));
        $role->syncPermissions($intArray);
        DB::commit();


        Toastr::success(__('admin.msg_updated_successfully'), __('admin.msg_success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Role::where('id',$id)->delete();

        Toastr::success(__('msg_deleted_successfully'), __('msg_success'));

        return redirect()->back();
    }
}