@extends('default')

@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>分类名</td>
            <td>是否显示</td>
            <td>分类图片</td>
            <td>操作</td>
        </tr>
        @foreach($shop_categories as $shop_category)
        <tr>
            <td>{{$shop_category->id}}</td>
            <td>{{$shop_category->name}}</td>
            <td>@if($shop_category->status)显示@else隐藏@endif</td>
            <td><img src="{{$shop_category->img}}" alt="" width="50px"></td>
            <td>
                <form action="{{route('shop_categories.destroy',[$shop_category])}}" method="post">
                    <a href="{{route('shop_categories.edit',[$shop_category])}}" class="btn btn-primary">编辑</a>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class="btn btn-danger">删除</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5">
                <a href="{{route('shop_categories.create')}}" class="btn btn-block btn-success">添加分类</a>
            </td>

        </tr>
    </table>
@endsection