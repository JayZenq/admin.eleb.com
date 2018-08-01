@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>名称</td>
            <td>邮箱</td>
            <td>店铺</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->shops->shop_name}}</td>
                <td>@if($user->status)启用@else禁用@endif</td>
                <td>

                    <form action="" method="post">
                        {{--@if($user->status==0)--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-success">启用</a>--}}
                        {{--@else--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-danger">禁用</a>--}}
                        {{--@endif--}}
                        <a href="{{route('users.show',[$user])}}" class="btn btn-primary">查看</a>
                        <a href="{{route('users.edit',[$user])}}" class="btn btn-primary">编辑</a>
                        @if(\Illuminate\Support\Facades\Auth::user())
                        <a href="{{route('users.change',[$user])}}" class="btn btn-success">重置密码</a>
                        @endif
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <a href="{{route('users.create')}}" class="btn btn-block btn-success">商家注册</a>
            </td>

        </tr>
    </table>

@endsection