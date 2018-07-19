<?php

namespace App\Http\Controllers;

use App\Models\Shop_categories;
use Illuminate\Http\Request;

class Shop_categoriesController extends Controller
{
    //商家分类列表
    public function index()
    {
        $shop_categories= Shop_categories::all();
        return view('shop_categories/index',compact('shop_categories'));
    }
    
    //添加分类
    public function create()
    {
        return view('shop_categories/create');
    }

    //保存分类
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|max:30',
            'logo'=>'required',
            'status'=>'required'
        ],[
            'name.required'=>'分类名不能为空',
            'name.max'=>'分类名不能超过30个字',
            'logo.required'=>'分类图片不能为空',
            'status.required'=>'请选择是否显示',
        ]);

        $file = $request->logo;
        $fileName=$file->store('public/logo');

        Shop_categories::create([
            'name'=>$request->name,
            'img'=>$fileName,
            'status'=>$request->status,
        ]);

        session()->flash('success','添加成功');
        return redirect('shop_categories');
    }
    //修改页面
    public function edit(Shop_categories $shop_category)
    {
        return view('shop_categories.edit',compact('shop_category'));
    }

    //修改保存
    public function update(Request $request,Shop_categories $shop_category)
    {
//        var_dump($shop_category->img);
//        var_dump($request->status);
//        die();
        $this->validate($request,[
            'name'=>'required|max:30',
//            'logo'=>'required',
            'status'=>'required'
        ],[
            'name.required'=>'分类名不能为空',
            'name.max'=>'分类名不能超过30个字',
            'status.required'=>'请选择是否显示',
        ]);

        //判断是否修改了分类图片
        if ($request->logo){//上传图片,
            $file=$request->logo;
            $fileName = $file->store('public/logo');
        }else{//没上传将原地址再保存一次
           $fileName=$shop_category->img;
        }
        //修改数据库的数据
        $shop_category->update([
            'name'=>$request->name,
            'img'=>$fileName,
            'status'=>$request->status,
        ]);

        //显示提示信息
        session()->flash('success','修改成功');
        //跳转回列表页
        return redirect('shop_categories');
    }

    //删除
    public function destroy(Shop_categories $shop_category)
    {
        $shop_category->delete();
        return redirect('shop_categories');
    }
}
