<nav class="navbar navbar-inverse" role="navigation" style="border-radius: inherit;padding-left: 15px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  class="navbar-brand"  href="/blog"
                @if(Request::path() == 'blog')
                    style="color:#ffffff;"
                @endif>jack的博客</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">首页</a></li>
            @foreach( $categorys as $category)
                <li>
                    <a href="/category/{{ $category->id }}"
                       @if( Request::path() == "category/" . $category->id  )
                        style="color: #FFFFFF;"
                       @endif
                    >{{ $category->category }}</a>
                </li>
                @endforeach
            </ul>

            <ul class="nav navbar-nav navbar-right">

                    @if(session()->has('userInfo'))
                        <li>
                            <div style="padding: 5px 0 0 15px;">
                                <img src="{{ session('userInfo')['pic_url'] }}" alt="用户头像" style="display:inline-block;width:40px;height: 40px;border-radius: 50%">
                                <a  href="{{ session('userInfo')['user_url'] }}">{{ session('userInfo')['nick_name'] }}</a>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;" id="logout">退出登录</a>
                        </li>
                    @else
                        <li>
                            <a href="/auth/github" class="dropdown-toggle">
                                {{--<span class="glyphicon glyphicon-log-in"></span>&nbsp;--}}
                                <span>github登录</span>
                            </a>
                        </li>
                    @endif

            </ul>
        </div>
    </div>
</nav>

