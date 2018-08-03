@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>菜单名称</td>
            <td>菜单地址</td>
            <td>菜单需要权限</td>
            <td>上级菜单</td>
            <td>操作</td>
        </tr>
        @foreach($navs as $nav)
            <tr>
                <td>{{$nav->id}}</td>
                <td>{{$nav->name}}</td>
                <td>{{$nav->url}}</td>
                <td>{{$nav->permission->name}}</td>
                <td>{{$nav->pid==0?'顶层':\App\Models\Nav::where('id',$nav->pid)->value('name')}}</td>
                <td>
                    <form action="" method="post">
                        <a href="{{route('nav.edit',[$nav])}}" class="btn btn-primary">编辑</a>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <a href="{{route('nav.create')}}" class="btn btn-block btn-success">添加菜单</a>
            </td>

        </tr>
    </table>
    {{$navs->links()}}
@endsection