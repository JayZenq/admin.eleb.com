@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>所属活动</td>
            <td>报名商家</td>

            {{--<td>操作</td>--}}
        </tr>
        @foreach($members as $member)
            <tr>
                <td>{{$member->id}}</td>
                <td>{{$member->event->title}}</td>
                <td>{{$member->member->name}}</td>
                {{--<td>--}}
                    {{--<form action="{{route('event_member.destroy',[$member])}}" method="post">--}}
                        {{--<a href="{{route('event_member.edit',[$member])}}" class="btn btn-primary">编辑</a>--}}
                        {{--{{method_field('DELETE')}}--}}
                        {{--{{csrf_field()}}--}}
                        {{--<button class="btn btn-danger">删除</button>--}}
                    {{--</form>--}}
                {{--</td>--}}
            </tr>
        @endforeach
    </table>
    {{--{{$event_prizes->links()}}--}}
@endsection