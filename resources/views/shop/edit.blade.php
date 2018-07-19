@extends('default')

@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('shops.update',[$shop])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="店铺名称" name="shop_name" value="{{$shop->shop_name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺分类</label>
            <div class="col-sm-10">
                <select class="form-control" name="shop_category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($shop->shop_category_id==$category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputEmail3" placeholder="" name="shop_img">
                <img src="{{\Illuminate\Support\Facades\Storage::url($shop->shop_img)}}" alt="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否是品牌</label>
            <div class="col-sm-5">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="brand" value="1" @if($shop->brand) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="brand"  value="0" @if(!$shop->brand) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否准时送达</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="on_time" value="1" @if($shop->on_time) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="on_time"  value="0" @if(!$shop->on_time) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否蜂鸟配送</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="fengniao" value="1" @if($shop->fengniao) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="fengniao"  value="0" @if(!$shop->fengniao) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否保标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="bao" value="1" @if($shop->bao) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="bao"  value="0" @if(!$shop->bao) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否票标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="piao" value="1" @if($shop->piao) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="piao"  value="0" @if(!$shop->piao) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否准标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="zhun" value="1" @if($shop->zhun) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="zhun"  value="0" @if(!$shop->zhun) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">起送金额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="" name="start_send" value="{{$shop->start_send}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">配送费</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="配送费" name="send_cost" value="{{$shop->send_cost}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店公告</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="店公告" name="notice" value="{{$shop->notice}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="优惠信息" name="discount" value="{{$shop->discount}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>
@endsection
