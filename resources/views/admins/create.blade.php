@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('admins.store')}}" class="form-horizontal"  method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="邮箱" name="email" value="{{old('email')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="确认密码" name="password_confirmation">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">角色名</label>
            <div class="col-sm-10">
                @foreach($roles as $role)
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="{{$role->name}}" name="role[]"> {{$role->name}}
                    </label>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">添加</button>
            </div>
        </div>
    </form>
@endsection