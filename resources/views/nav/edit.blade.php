@extends('default')

@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('nav.update',[$nav])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="名称" name="name" value="{{$nav->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">地址</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="地址" name="url" value="{{$nav->url}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">关联权限</label>
            <div class="col-sm-10">
                <select class="form-control" name="permission_id">

                    @foreach($permissions as $permission)
                    <option value="{{$permission->id}}" @if($permission->id==$nav->permission_id) selected @endif>{{$permission->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">上层菜单</label>
            <div class="col-sm-10">
                <select class="form-control" name="pid">
                    <option value="0">顶层菜单</option>
                    @foreach($navs as $v)
                        <option value="{{$v->id}}" @if($v->id==$nav->pid) selected @endif>{{$v->name}}</option>
                    @endforeach
                </select>
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
