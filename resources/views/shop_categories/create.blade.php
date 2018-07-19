@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('shop_categories.store')}}" class="form-horizontal" enctype="multipart/form-data" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">分类名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类图片</label>
            <div class="col-sm-10">
                <input type="file" class="" id="inputPassword3" placeholder="" name="logo">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否显示</label>
            <div class="col-sm-10">
                    <label>
                        <input type="radio" name="status" value="1">显示
                    </label>
                    <label>
                        <input type="radio" name="status" value="0">隐藏
                    </label>
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