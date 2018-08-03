@extends('default')
@section('jsfile')
    @include('vendor.ueditor.assets')

@stop

@section('contents')
    @include('_errors')
    <form action="{{route('event.update',[$event])}}" class="form-horizontal" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="title" name="title" value="{{$event->title}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报名开始时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" placeholder="signup_start" name="signup_start" value="{{date('Y-m-d',$event->signup_start)}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报名结束时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" placeholder="signup_end" name="signup_end" value="{{date('Y-m-d',$event->signup_end)}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">开奖日期</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" placeholder="prize_date" name="prize_date" value="{{date('Y-m-d',strtotime($event->prize_date))}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报名人数限制</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputEmail3" placeholder="signup_num" name="signup_num" value="{{$event->signup_num}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">活动内容</label>
            <div class="col-sm-10">
                <script id="container" name="content" type="text/plain">{!! $event->content !!}</script>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">确定修改</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>
@endsection
