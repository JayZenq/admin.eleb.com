<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopsController extends Controller
{
    //商户信息列表
    public function index()
    {
       $shops= Shop::all();
        return view('shop/index',compact('shops'));
    }

    public function create()
    {

        $categories = Shop_categories::all();
        return view('shop/create',compact('categories'));
    }

    public function store(Request $request)
    {
        //数据验证
        $this->validate($request,[
            'shop_category_id'=>'required',
            'shop_name'=>'required',
            'shop_img'=>'required|image',
            'start_send'=>'required|numeric',
            'send_cost'=>'required|numeric',
            'discount'=>'required|max:100',
            'notice'=>'required|max:100',
            'brand'=>'required',
            'on_time'=>'required',
            'fengniao'=>'required',
            'bao'=>'required',
            'piao'=>'required',
            'zhun'=>'required',
        ],[
            'shop_category_id.required'=>'请选择一个店铺分类',
            'shop_name.required'=>'店铺名不能为空',
            'shop_img.required'=>'请上传店铺图片',
            'shop_img.image'=>'店铺图片格式不正确',
            'start_send.required'=>'请填写起送金额',
            'start_send.numeric'=>'请填写正确起送金额',
            'send_cost.numeric'=>'请填写正确配送金额',
            'send_cost.required'=>'请填写配送金额',
            'discount.required'=>'请填写优惠信息',
            'discount.max'=>'优惠信息不得超过100个字',
            'notice.max'=>'店铺公告不得超过100个字',
            'notice.required'=>'请填写店铺公告',
            'brand.required'=>'请选择是否是品牌',
            'on_time.required'=>'请选择是否准时送达',
            'fengniao.required'=>'请选择是否蜂鸟配送',
            'bao.required'=>'请选择是否有保标记',
            'piao.required'=>'请选择是否有票标记',
            'zhun.required'=>'请选择是否有准标记',
        ]);
//        $file = $request->shop_img;
//        $fileName = $file->store('public/logo');
       $shop= Shop::create([
            'shop_category_id'=>$request->shop_category_id,
            'shop_name'=>$request->shop_name,
            'shop_img'=>$request->logo,
            'shop_rating'=>4,
            'brand'=>$request->brand,
            'on_time'=>$request->on_time,
            'fengniao'=>$request->fengniao,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'zhun'=>$request->zhun,
            'start_send'=>$request->start_send,
            'send_cost'=>$request->send_cost,
            'notice'=>$request->notice,
            'discount'=>$request->discount,
            'status'=>1,
        ]);
//        $id = new Shop();
//        var_dump($shop->id);

        session()->flash('success','添加成功');
        return redirect('shops');

    }

    public function edit(Shop $shop)
    {
        $categories = Shop_categories::all();
        return view('shop/edit',compact('shop','categories'));
    }

    //保存修改后的数据
    public function update(Request $request,Shop $shop)
    {
        //数据验证
        $this->validate($request,[
            'shop_category_id'=>'required',
            'shop_name'=>'required',
            'logo'=>'required',
            'start_send'=>'required|numeric',
            'send_cost'=>'required|numeric',
            'discount'=>'required|max:100',
            'notice'=>'required|max:100',
            'brand'=>'required',
            'on_time'=>'required',
            'fengniao'=>'required',
            'bao'=>'required',
            'piao'=>'required',
            'zhun'=>'required',
        ],[
            'shop_category_id.required'=>'请选择一个店铺分类',
            'shop_name.required'=>'店铺名不能为空',
            'shop_img.required'=>'请上传店铺图片',
            'shop_img.image'=>'店铺图片格式不正确',
            'start_send.required'=>'请填写起送金额',
            'start_send.numeric'=>'请填写正确起送金额',
            'send_cost.numeric'=>'请填写正确配送金额',
            'send_cost.required'=>'请填写配送金额',
            'discount.required'=>'请填写优惠信息',
            'discount.max'=>'优惠信息不得超过100个字',
            'notice.max'=>'店铺公告不得超过100个字',
            'notice.required'=>'请填写店铺公告',
            'brand.required'=>'请选择是否是品牌',
            'on_time.required'=>'请选择是否准时送达',
            'fengniao.required'=>'请选择是否蜂鸟配送',
            'bao.required'=>'请选择是否有保标记',
            'piao.required'=>'请选择是否有票标记',
            'zhun.required'=>'请选择是否有准标记',
        ]);
        //判断是否上传新图片
        if ($request->logo){
            $fileName = $request->logo;
        }else{
            $fileName=$shop->shop_img;
        }
        $shop->update([
            'shop_category_id'=>$request->shop_category_id,
            'shop_name'=>$request->shop_name,
            'shop_img'=>$fileName,
            'shop_rating'=>4,
            'brand'=>$request->brand,
            'on_time'=>$request->on_time,
            'fengniao'=>$request->fengniao,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'zhun'=>$request->zhun,
            'start_send'=>$request->start_send,
            'send_cost'=>$request->send_cost,
            'notice'=>$request->notice,
            'discount'=>$request->discount,
            'status'=>1,
        ]);

        session()->flash('success','修改成功');
        return redirect('shops');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        session()->flash('success','删除成功');
        return redirect('shops');
    }

    public function show(Shop $shop)
    {
        return view('shop/show',compact('shop'));
    }

    public function status(Shop $shop,Request $request)
    {
            $shop->update([
                'status'=>$request->input('status')
            ]);


        return redirect('shops');
    }
}
