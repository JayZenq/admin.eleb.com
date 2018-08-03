<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class NavsController extends Controller
{
    //
    public function index()
    {
       $navs =  Nav::paginate(10);
       return view('nav/index',compact('navs'));
    }

    public function create()
    {
        $permissions =   Permission::all();
        $navs = Nav::all();
        return view('nav/create',compact('permissions','navs'));
    }

    public function store(Request $request)
    {
        $url = $request->url??'';
        $this->validate($request,[
            'name'=>'required|unique:navs',
            'permission_id'=>'required',
            'pid'=>'required',
        ],[
            'name.required'=>'名称不能为空',
            'pid.required'=>'请选择上级菜单',
            'name.unique'=>'该名称已存在',
        ]);
        Nav::create([
            'name'=>$request->name,
            'url'=>$url,
            'permission_id'=>$request->permission_id,
            'pid'=>$request->pid,
        ]);
        session()->flash('success','添加成功');
        return redirect('nav');
    }

    public function edit(Nav $nav)
    {
       $permissions =   Permission::all();
       $navs = Nav::all();
        return view('nav/edit',compact('nav','permissions','navs'));
    }

    public function update(Request $request,Nav $nav)
    {
        $url = $request->url??'';
        $this->validate($request,[
            'name'=>['required',Rule::unique('navs')->ignore($nav->id)],
            'permission_id'=>'required',
            'pid'=>['required'],
        ],[
            'name.required'=>'名称不能为空',
            'pid.required'=>'请选择上级菜单',
            'name.unique'=>'该名称已存在',
        ]);
        $nav->update([
            'name'=>$request->name,
            'url'=>$url,
            'permission_id'=>$request->permission_id,
            'pid'=>$request->pid,
        ]);
        session()->flash('success','修改成功');
        return redirect('nav');
    }

    public function destroy(Nav $nav)
    {
        $nav->delete();
        session()->flash('success','删除成功');
        return redirect('nav');
    }
}
