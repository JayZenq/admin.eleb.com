@extends('default')
@section('jsfile')
    @include('vendor.ueditor.assets')

@stop

@section('contents')
    @include('_errors')
    <form action="{{route('activities.store',[$activity])}}" class="form-horizontal" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="title" name="title" value="{{$activity->title}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动开始时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" placeholder="start_time" name="start_time" value="{{date('Y-m-d',strtotime($activity->start_time))}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动结束时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" placeholder="end_time" name="end_time" value="{{date('Y-m-d',strtotime($activity->end_time))}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">活动内容</label>
            <div class="col-sm-10">
                <script id="container" name="content" type="text/plain">{!! $activity->content !!}</script>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">添加</button>
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
