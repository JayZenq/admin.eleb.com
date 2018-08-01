@extends('default')

@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('users.updates')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商家名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="商家名称" name="name" value="{{$user->name}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="邮箱" name="email" value="{{$user->email}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputEmail3" placeholder="新密码" name="password" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputEmail3" placeholder="确认密码" name="password_confirmation" value="">
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
