<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\Roles\StoreRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('Admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controllers_permissions=Permission::all()->groupBy('controller');
        // dd($controllers_permissions);
        return view(('Admin.roles.create'),compact('controllers_permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        DB::beginTransaction();
        try{
            $role=Role::create(['name'=>"$request->name",'guard_name'=>"admin"]);
            $role->syncPermissions($request->permission_id);
            DB::commit();
            return $this->RedirectAccordingToRequest($request,'success');
        }catch(\Exception $e){
            DB::rollBack();
            return $this->RedirectAccordingToRequest($request,'error');
        }
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role_permission_ids=$role->getAllPermissions()->pluck('id')->toArray();
        $controllers_permissions=Permission::all()->groupBy('controller');
        return view('Admin.roles.edit',compact('role','role_permission_ids','controllers_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request,Role $role)
    {
        DB::beginTransaction();
        try{
            $role->update(['name'=>$request->name]);
            $role->syncPermissions($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index')->with('success','تمت العملية بنجاح');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('roles.index')->with('error','فشلت العملية ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success','تمت العملية بنجاح');
    }
}
