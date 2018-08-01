@extends('default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
@stop

@section('jsfile')
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>

    @stop
@section('contents')
    @include('_errors')
    <form action="{{route('shop_categories.store')}}" class="form-horizontal" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">分类名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="name" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类图片</label>
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