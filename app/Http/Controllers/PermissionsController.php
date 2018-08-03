<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    //
    public function index()
    {
         $permissions =  Permission::paginate(10);
        return view('permission/index',compact('permissions'));
    }

    public function create()
    {
        return view('permission/create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:permissions'
        ],[
            'name.required'=>'权限名不能为空',
            'name.unique'=>'权限名已存在',
        ]);
        Permission::create([
            'name'=>$request->name,
        ]);

        session()->flash('success','添加成功');
        return redirect('permission');
    }

    public function edit(Request $request,Permission $permission)
    {
        return view('permission/edit',compact('permission'));
    }

    public function update(Request $request,Permission $permission)
    {
        $this->validate($request,[
            'name'=>['required',Rule::unique('permissions')->ignore($permission->id)]
        ],[
            'name.required'=>'权限名不能为空',
            'name.unique'=>'权限名已存在',
        ]);
        $permission->update([
            'name'=>$request->name,
        ]);

        session()->flash('success','修改成功');
        return redirect('permission');
    }

    public function destroy(Permission $permission)
    {
//        var_dump($permission);
//        die();
        $permission->delete();
        session()->flash('success','删除成功');
        return redirect('permission');
    }
}
