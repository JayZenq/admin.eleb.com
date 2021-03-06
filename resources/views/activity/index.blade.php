@extends('default')

@section('contents')

    <table class="table">
                <div class="form-group">
                    <a href="{{route('activities.index')}}?a=1" class="btn btn-success">未开始</a>
                    <a href="{{route('activities.index')}}?a=2" class="btn btn-success">已开始</a>
                    <a href="{{route('activities.index')}}?a=3" class="btn btn-success">已结束</a>
                </div>
        <tr>
            <td>ID</td>
            <td>活动名称</td>
            <td>活动开始时间</td>
            <td>活动结束时间</td>
            <td>操作</td>
        </tr>
        @foreach($activities as $activity)
        <tr>
            <td>{{$activity->id}}</td>
            <td><a href="{{route('activities.show',[$activity])}}">{{$activity->title}}</a></td>
            <td>{{$activity->start_time}}</td>
            <td>{{$activity->end_time}}</td>
            <td>
                <form action="{{route('activities.destroy',[$activity])}}" method="post">
                    @can('activities_edit')
                    <a href="{{route('activities.edit',[$activity])}}" class="btn btn-primary">编辑</a>
                    @endcan
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                        @can('activities_del')
                    <button class="btn btn-danger">删除</button>
                        @endcan
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5">
                @can('activities_add')
                    <a href="{{route('activities.create')}}" class="btn btn-block btn-success">添加活动</a>
                    @endcan

            </td>

        </tr>
    </table>
    {{$activities->links()}}
@endsection