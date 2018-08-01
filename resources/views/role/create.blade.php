@extends('default')

@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">角色名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="角色名" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限名</label>
            <div class="col-sm-10">
                @foreach($permissions as $permission)
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="{{$permission->name}}" name="permission[]"> {{$permission->name}}
                    </label>
                @endforeach
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
