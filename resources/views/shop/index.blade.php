@extends('default')

@section('contents')
<div class="table-responsive">
    <table class="table" id="table-hover">
        <tr>
            <th>ID</th>
            <th>店铺分类</th>
            <th>店铺名称</th>
            <th>店铺图片</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>店铺状态</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
        <tr>
            <td>{{$shop->id}}</td>
            <td>{{$shop->shop_categories->name}}</td>
            <td>{{$shop->shop_name}}</td>
            <td>
                <img src="{{\Illuminate\Support\Facades\Storage::url($shop->shop_img)}}" alt="" width="50px">
            </td>
            <td>{{$shop->start_send}}</td>
            <td>{{$shop->send_cost}}</td>
            <td>{{$shop->notice}}</td>
            <td>{{$shop->discount}}</td>
            <td>
                @if($shop->status==1)
                正常
                @elseif(!$shop->status)
                待审核
                @else
                禁用
                @endif
            </td>
            <td>

                <form action="{{route('shops.destroy',[$shop])}}" method="post">
                    <a href="{{route('shops.edit',[$shop])}}" class="btn btn-primary">编辑</a>
                    <a href="{{route('shops.show',[$shop])}}" class="btn btn-primary">查看</a>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class="btn btn-danger">删除</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="10">
                <a href="{{route('users.create')}}" class="btn btn-block btn-success">商家注册</a>
            </td>

        </tr>
    </table>
</div>
@endsection