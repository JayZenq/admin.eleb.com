@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('login')}}" class="form-horizontal"  method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name="name" value="{{old('name')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                记住我:<input type="checkbox" name="rememberMe" value="1">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
            </div>
        </div>
    </form>
@endsection