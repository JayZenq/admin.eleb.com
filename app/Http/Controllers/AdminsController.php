<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminsController extends Controller
{
    //平台管理员表
    public function index()
    {
        $admins= Admins::all();
        return view('admins/index',compact('admins'));
    }
    //添加管理员
    public function create()
    {
        $roles =  Role::all();
        return view('admins/create',compact('roles'));
    }
    
    //保存管理员
    public function store(Request $request)
    {
        //验证规则
        $this->validate($request,[
            'name'=>'required|max:20|min:6|unique:admins',
            'email'=>'required|email|unique:admins',
            'password'=>'required|confirmed'
        ],[
            'name.required'=>'用户名不能为空',
            'name.unique'=>'用户名已存在',
            'name.max'=>'用户名不能超过20个字符',
            'name.min'=>'用户名不能小于6个字符',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
            'email.unique'=>'邮箱已被注册',
            'password.required'=>'密码不能为空',
            'password.confirmed'=>'两次输入的密码不一致',
        ]);
        
        Admins::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ])->assignRole($request->role);
        
        session()->flash('success','添加成功');
        return redirect('admins');
    }

    public function edit(Admins $admin)
    {
        $roles = Role::all();
        return view('admins/edit',compact('admin','roles'));
    }

    public function update(Admins $admin,Request $request)
    {//修改用户名和密码
        $this->validate($request,[
            'name'=>[
                'required','max:20','min:6',
                Rule::unique('admins')->ignore($admin->id)
            ],
            'email'=>[
                'required','email',
                Rule::unique('admins')->ignore($admin->id),
            ]
        ],[
            'name.required'=>'用户名不能为空',
            'name.unique'=>'用户名已存在',
            'name.max'=>'用户名不能超过20个字符',
            'name.min'=>'用户名不能小于6个字符',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
            'email.unique'=>'邮箱已被注册',
        ]);

        $admin->syncRoles($request->role)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        session()->flash('success','修改成功');
        return redirect('admins');
    }

    public function destroy(Admins $admin)
    {//删除
        $admin->delete();
        session()->flash('success','删除成功');
        return redirect('admins');
    }
}
