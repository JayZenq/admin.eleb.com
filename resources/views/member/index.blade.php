@extends('default')


@section('contents')
    <div class="row">
    <div class="col-md-11">
    <table class="table">
        <tr>
            <form action="{{ route('member.index') }}" method="get" class="form">
                <div class="form-group">
                    <input type="text" name="username" placeholder="输入用户名搜索" style="margin-right: 20px;">{{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-sm">搜索</button>
                </div>
            </form>
        </tr>
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>电话号码</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach($members as $member)
            <tr>
                <td>{{$member->id}}</td>
                <td>{{$member->username}}</td>
                <td>{{$member->tel}}</td>
                <td>@if($member->status) 正常 @else 禁用 @endif</td>
                <td>
                    @if($member->status==0)
                            <a href="{{route('member.status',[$member])}}?status=1" class="btn btn-success">启用</a>
                        @else
                            <a href="{{route('member.status',[$member])}}?status=0" class="btn btn-danger">禁用</a>
                        @endif
                        {{--<a href="{{route('menus.show',[$member])}}" class="btn btn-primary">查看</a>--}}
                        {{--<a href="{{route('menus.edit',[$member])}}" class="btn btn-primary">编辑</a>--}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">

            </td>

        </tr>
    </table>
    </div>
        {{$members->appends($username)->links()}}
    </div>
@endsection