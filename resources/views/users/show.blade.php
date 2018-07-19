@extends('default')

@section('contents')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">商家ID: {{$user->id}}</li>
            <li class="list-group-item">商家名称: {{$user->name}}</li>
            <li class="list-group-item">邮箱: {{$user->email}}</li>
            <li class="list-group-item">状态: @if($user->status)启用@else禁用@endif</li>
            {{--<li class="list-group-item">商铺ID: {{$user->shops->id}}</li>--}}
            {{--<li class="list-group-item">店铺分类: {{$user->shops->shop_categories->name}}</li>--}}
            {{--<li class="list-group-item">名称: {{$user->shops->shop_name}}</li>--}}
            {{--<li class="list-group-item">店铺图片: <img src="{{\Illuminate\Support\Facades\Storage::url($user->shops->shop_img)}}" alt="" width="55px"></li>--}}
            {{--<li class="list-group-item">评分: {{$user->shops->shop_rating}}</li>--}}
            {{--<li class="list-group-item">是否是品牌: @if($user->shops->brand)是@else 不是@endif</li>--}}
            {{--<li class="list-group-item">是否准时送达: @if($user->shops->on_time)是@else 不是@endif</li>--}}
            {{--<li class="list-group-item">是否蜂鸟配送: @if($user->shops->fengniao)是@else 不是@endif</li>--}}
            {{--<li class="list-group-item">是否保标记: @if($user->shops->bao)是@else 不是@endif</li>--}}
            {{--<li class="list-group-item">是否票标记: @if($user->shops->piao)是@else 不是@endif</li>--}}
            {{--<li class="list-group-item">是否准标记: @if($user->shops->zhun)是@else 不是@endif</li>--}}
            {{--<li class="list-group-item">起送金额: {{$user->shops->start_send}}</li>--}}
            {{--<li class="list-group-item">配送费: {{$user->shops->send_cost}}</li>--}}
            {{--<li class="list-group-item">店公告: {{$user->shops->notice}}</li>--}}
            {{--<li class="list-group-item">优惠信息: {{$user->shops->discount}}</li>--}}
            {{--<li class="list-group-item">状态: @if($user->shops->status==1)正常@elseif(!$user->shops->status)待审核@else禁用@endif</li>--}}
            <li class="list-group-item">
                @if($user->status==0)
                <a href="{{route('users.status',[$user])}}" class="btn btn-success">启用</a>
                @else
                <a href="{{route('users.status',[$user])}}" class="btn btn-danger">禁用</a>
                @endif
            </li>
        </ul>
    </div>

@endsection