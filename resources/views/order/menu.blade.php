@extends('default')


@section('contents')
    <div class="row">
        <table class="table">
            <tr>
                {{--<form action="" method="get" class="form">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                            {{--<select name="year" id="" class="form-control">--}}
                                {{--<option value="2016">2016年</option>--}}
                                {{--<option value="2017">2017年</option>--}}
                                {{--<option value="2018">2018年</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<button type="submit" class="btn btn-info btn-sm">开始搜索</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
                <td colspan="3">
                    <a href="{{route('order.menu_month')}}" class="btn btn-success">按月搜索</a>
                    <a href="{{route('order.mday')}}" class="btn btn-success">按天搜索</a>
                </td>
            </tr>
            <tr>
                <th>菜品</th>
                <th>商铺名</th>
                <th>销量</th>

            </tr>
            @foreach($counts as $count)
            <tr style="font-size: 15px">
                <td>{{$count->goods_name}}</td>
                <td>{{$count->name}}</td>
                <td>{{$count->sum}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
            </tr>
        </table>
    </div>
    {{--<div>--}}
    {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection