@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        <tr>
            <form action="{{ route('order.day') }}" method="get" class="form">
                <div class="row">
                    <div class="col-xs-2">
                        <input type="date" name="day">
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-sm">开始搜索</button>
                </div>
            </form>
        </tr>
        <tr>
            <th>商铺名</th>
            <th>订单量</th>

        </tr>
        @foreach($counts as $count)
            <tr style="font-size: 15px">
                <td>{{$count->name}}</td>
                <td>{{$count->c}}单</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3">
                <a href="{{route('order.count')}}" class="btn btn-success">返回</a>
            </td>
        </tr>
    </table>
    </div>
    {{--<div>--}}
        {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection