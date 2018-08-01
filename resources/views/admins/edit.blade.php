@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('admins.update',[$admin])}}" class="form-horizontal"  method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">账号</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" value="{{$admin->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="name" name="email" value="{{$admin->email}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">角色名</label>
            <div class="col-sm-10">
                @foreach($roles as $role)
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="{{$role->name}}" name="role[]" @if($admin->hasAllRoles($role)) checked @endif> {{$role->name}}
                    </label>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">修改</button>
            </div>
        </div>
    </form>
@endsection