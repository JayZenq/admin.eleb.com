@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>所属活动</td>
            <td>奖品名</td>
            <td>奖品详情</td>
            <td>中奖商家账号</td>
            <td>操作</td>
        </tr>
        @foreach($event_prizes as $event_prize)
            <tr>
                <td>{{$event_prize->id}}</td>
                <td>{{$event_prize->event->title}}</td>
                <td>{{$event_prize->name}}</td>
                <td>{{$event_prize->description}}</td>
                <td>{{$event_prize->member_id}}</td>
                <td>
                    <form action="{{route('event_prize.destroy',[$event_prize])}}" method="post">
                        <a href="{{route('event_prize.edit',[$event_prize])}}" class="btn btn-primary">编辑</a>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$event_prizes->links()}}
@endsection