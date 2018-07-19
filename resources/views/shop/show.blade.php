@extends('default')

@section('contents')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">ID: {{$shop->id}}</li>
            <li class="list-group-item">店铺分类: {{$shop->shop_categories->name}}</li>
            <li class="list-group-item">名称: {{$shop->shop_name}}</li>
            <li class="list-group-item">店铺图片: <img src="{{\Illuminate\Support\Facades\Storage::url($shop->shop_img)}}" alt="" width="55px"></li>
            <li class="list-group-item">评分: {{$shop->shop_rating}}</li>
            <li class="list-group-item">是否是品牌: @if($shop->brand)是@else 不是@endif</li>
            <li class="list-group-item">是否准时送达: @if($shop->on_time)是@else 不是@endif</li>
            <li class="list-group-item">是否蜂鸟配送: @if($shop->fengniao)是@else 不是@endif</li>
            <li class="list-group-item">是否保标记: @if($shop->bao)是@else 不是@endif</li>
            <li class="list-group-item">是否票标记: @if($shop->piao)是@else 不是@endif</li>
            <li class="list-group-item">是否准标记: @if($shop->zhun)是@else 不是@endif</li>
            <li class="list-group-item">起送金额: {{$shop->start_send}}</li>
            <li class="list-group-item">配送费: {{$shop->send_cost}}</li>
            <li class="list-group-item">店公告: {{$shop->notice}}</li>
            <li class="list-group-item">优惠信息: {{$shop->discount}}</li>
            <li class="list-group-item">状态: @if($shop->status==1)正常@elseif(!$shop->status)待审核@else禁用@endif</li>
            <li class="list-group-item">
                @if($shop->status==0)
                    <a href="{{route('shops.status',[$shop])}}" class="btn btn-success">启用</a>
                @else
                    <a href="{{route('shops.status',[$shop])}}" class="btn btn-danger">禁用</a>
                @endif
            </li>
        </ul>
    </div>

@endsection