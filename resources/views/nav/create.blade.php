@extends('default')

@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('nav.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="名称" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">地址</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="地址" name="url" value="{{old('url')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">关联权限</label>
            <div class="col-sm-10">
                <select class="form-control" name="permission_id">
                    @foreach($permissions as $permission)
                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">上层菜单</label>
            <div class="col-sm-10">
                <select class="form-control" name="pid">
                    <option value="0">顶层菜单</option>
                    @foreach($navs as $nav)
                        <option value="{{$nav->id}}">{{$nav->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@endsection
