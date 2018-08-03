@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>权限名称</td>
            <td>操作</td>
        </tr>
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>
                    <form action="{{route('permission.destroy',[$permission])}}" method="post">
                        <a href="{{route('permission.edit',[$permission])}}" class="btn btn-primary">编辑</a>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <a href="{{route('permission.create')}}" class="btn btn-block btn-success">添加权限</a>
            </td>

        </tr>
    </table>
    {{$permissions->links()}}
@endsection