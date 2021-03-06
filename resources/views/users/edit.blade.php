@extends('default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
@stop

@section('jsfile')
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>

@stop
@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('users.update',[$user])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商家名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="商家名称" name="name" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="邮箱" name="email" value="{{$user->email}}">
            </div>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="inputEmail3" class="col-sm-2 control-label">密码</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="password" class="form-control" id="inputEmail3" placeholder="密码" name="password" value="">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="inputEmail3" class="col-sm-2 control-label">确认密码</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="password" class="form-control" id="inputEmail3" placeholder="确认密码" name="password_confirmation" value="">--}}
            {{--</div>--}}
        {{--</div>--}}


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="店铺名称" name="shop_name" value="{{$user->shops->shop_name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺分类</label>
            <div class="col-sm-10">
                <select class="form-control" name="shop_category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺图片</label>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" id="img_url" name="logo">
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                </div>
                <img src="" alt="" id="img" width="200px">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否是品牌</label>
            <div class="col-sm-5">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="brand" value="1" @if($user->shops->brand) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="brand"  value="0" @if(!$user->shops->brand) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否准时送达</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="on_time" value="1" @if($user->shops->on_time) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="on_time"  value="0" @if(!$user->shops->on_time) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否蜂鸟配送</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="fengniao" value="1" @if($user->shops->fengniao) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="fengniao"  value="0" @if(!$user->shops->fengniao) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否保标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="bao" value="1" @if($user->shops->bao) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="bao"  value="0" @if(!$user->shops->bao) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否票标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="piao" value="1" @if($user->shops->piao) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="piao"  value="0" @if(!$user->shops->piao) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否准标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="zhun" value="1" @if($user->shops->zhun) checked    @endif>是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="zhun"  value="0" @if(!$user->shops->zhun) checked    @endif>否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">起送金额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="" name="start_send" value="{{$user->shops->start_send}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">配送费</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="配送费" name="send_cost" value="{{$user->shops->send_cost}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店公告</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="店公告" name="notice" value="{{$user->shops->notice}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="优惠信息" name="discount" value="{{$user->shops->discount}}">
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

@section('js')
    <script>
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
//            swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server: "{{route('upload')}}",

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData:{
                _token:'{{csrf_token()}}'
            }
        });

        uploader.on('uploadSuccess',function (file,response) {
            $('#img').attr('src',response.fileName);

            $('#img_url').val(response.fileName);
        })
    </script>
@endsection