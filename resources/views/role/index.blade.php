@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>角色名称</td>
            <td>操作</td>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    <form action="" method="post">
                        <a href="{{route('role.edit',[$role])}}" class="btn btn-primary">编辑</a>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <a href="{{route('role.create')}}" class="btn btn-block btn-success">添加角色</a>
            </td>

        </tr>
    </table>

@endsection