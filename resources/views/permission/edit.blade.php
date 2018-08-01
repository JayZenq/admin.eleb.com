@extends('default')

@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('permission.update',[$permission])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="权限名" name="name" value="{{$permission->name}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@endsection

