<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">平台端</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家管理 <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="active"><a href="{{route('shop_categories.index')}}">商家分类管理 <span class="sr-only">(current)</span></a></li>--}}
                        {{--<li><a href="{{route('shops.index')}}">商家信息</a></li>--}}
                        {{--<li><a href="{{route('users.index')}}">商家账号</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a href="{{route('member.index')}}">用户信息</a></li>--}}
                {{--<li><a href="{{route('admins.index')}}">管理员信息</a></li>--}}
                {{--<li><a href="{{route('activities.index')}}">活动管理</a></li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家统计 <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="{{route('order.count')}}">商家订单量统计</a></li>--}}
                        {{--<li><a href="{{route('order.menu')}}">菜品销量统计</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                @foreach(\App\Models\Nav::where('pid',0)->get() as $nav)
                    @can($nav->permission->name)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$nav->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Models\Nav::where('pid',$nav->id)->get() as $v)
                            @can($v->permission->name)
                        <li><a href="{{route($v->url)}}">{{$v->name}}</a></li>
                            @endcan
                        @endforeach
                    </ul>
                </li>
                    @endcan
                @endforeach
            </ul>
            {{--<form class="navbar-form navbar-left">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search" name="key">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-default">Submit</button>--}}
            {{--</form>--}}
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('login')}}">登录</a></li>
                @endguest
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户:  {{\Illuminate\Support\Facades\Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admins.edit',[\Illuminate\Support\Facades\Auth::user()])}}">编辑个人信息</a></li>
                        <li><a href="{{route('change',[\Illuminate\Support\Facades\Auth::user()])}}">修改密码</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <form method="post" action="{{route('logout',[\Illuminate\Support\Facades\Auth::user()])}}">
                                {{ csrf_field() }}{{ method_field('DELETE') }}
                                <button class="btn btn-link">注销</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

