<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles =  Role::all();
        return view('role/index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('role/create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles'
        ],[
            'name.required'=>'角色名不能为空',
            'name.unique'=>'角色已存在',
        ]);
        $permissions = $request->permission;

        $role= Role::create([
            'name'=>$request->name,
        ])->syncPermissions($permissions);


        session()->flash('success','添加成功');
        return redirect('role');
    }

    public function edit(Request $request,Role $role)
    {
        $permissions = Permission::all();
        return view('role/edit',compact('role','permissions'));
    }

    public function update(Request $request,Role $role)
    {
        $this->validate($request,[
            'name'=>['required',Rule::unique('roles')->ignore($role->id)]
        ],[
            'name.required'=>'角色名不能为空',
            'name.unique'=>'角色名已存在',
        ]);
        $permissions = $request->permission;
        $role->syncPermissions($permissions)->update([
            'name'=>$request->name,
        ]);


        session()->flash('success','修改成功');
        return redirect('role');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success','删除成功');
        return redirect('role');
    }
}
