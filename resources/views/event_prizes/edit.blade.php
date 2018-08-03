@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('event_prize.update',[$event_prize])}}" class="form-horizontal" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">所属活动名称</label>
            <div class="col-sm-10">
                <select class="form-control" name="events_id">
                    @foreach($events as $event)
                        <option value="{{$event->id}}" @if($event_prize->events_id == $event->id) selected @endif>{{$event->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">奖品名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" value="{{$event_prize->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">奖品信息</label>
            <div class="col-sm-10">
                <textarea  class="form-control" id="inputEmail3" placeholder="description" name="description">{{$event_prize->description}}</textarea>
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

