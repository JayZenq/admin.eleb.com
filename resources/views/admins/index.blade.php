@extends('default')

@section('contents')
<div class="table-responsive">
    <table class="table" id="table-hover">
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>邮箱</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>
                <form action="{{route('admins.destroy',[$admin])}}" method="post">
                    <a href="{{route('admins.edit',[$admin])}}" class="btn btn-primary">编辑</a>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class="btn btn-danger">删除</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="10">
                <a href="{{route('admins.create')}}" class="btn btn-block btn-success">添加管理员</a>
            </td>

        </tr>
    </table>
</div>
@endsection