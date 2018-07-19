@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('shop_categories.update',[$shop_category])}}" class="form-horizontal" enctype="multipart/form-data" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">分类名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" value="{{$shop_category->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类图片</label>
            <div class="col-sm-10">
                <input type="file" class="" id="inputPassword3" placeholder="" name="logo">
                <img src="{{\Illuminate\Support\Facades\Storage::url($shop_category->img)}}" alt="" height="50px">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否显示</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" name="status" value="1" @if($shop_category->status==1) checked @endif>显示
                </label>
                <label>
                    <input type="radio" name="status" value="0" @if($shop_category->status==0) checked @endif>隐藏
                </label>
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