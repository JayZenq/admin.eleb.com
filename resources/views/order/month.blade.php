@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        <tr>
            <form action="{{ route('order.month') }}" method="get" class="form">
                <div class="row">
                    <div class="col-xs-2">
                        <select name="year" id="" class="form-control">
                            <option value="">年</option>
                            <option value="2016">2016年</option>
                            <option value="2017">2017年</option>
                            <option value="2018">2018年</option>
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <select name="month" id="" class="form-control">
                            <option value="">月</option>
                            <option value="01">一月</option>
                            <option value="02">二月</option>
                            <option value="03">三月</option>
                            <option value="04">四月</option>
                            <option value="05">五月</option>
                            <option value="06">六月</option>
                            <option value="07">七月</option>
                            <option value="08">八月</option>
                            <option value="09">九月</option>
                            <option value="10">十月</option>
                            <option value="11">十一月</option>
                            <option value="12">十二月</option>
                        </select>
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