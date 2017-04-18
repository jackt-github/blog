
<div class="sidebar">
    <div class="menu firMenu">
        <span class="glyphicon glyphicon-home"></span><a href="/home"
                 @if( Request::path() == 'home' )
                 class="a_active"
                 @else
                 class="a_default"
                @endif>首页</a>
    </div>
    <div>
        <div class="menu firMenu">
            <span class="glyphicon glyphicon-align-justify"></span><a href="javascript:;" class="a_default">博文管理</a>
        </div>
        <div id="articleManage">
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-pencil"></span><a href="/articleCreate"
                @if( Request::path() == 'articleCreate' )
                    class="a_active"
                @else
                    class="a_default"
                @endif>新建</a>
            </div>
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-list"></span><a href="/articleList"
                @if( Request::path() == 'articleList' )
                    class="a_active"
                @else
                    class="a_default"
                @endif>博文列表</a>
            </div>
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-tasks"></span><a href="/categoryList"
                  @if( Request::path() == 'categoryList'||Request::path() =='categoryCreate' )
                    class="a_active"
                  @else
                    class="a_default"
                  @endif>分类管理</a>
            </div>
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-list-alt"></span><a href="/articlePlanList"
                     @if( Request::path() == 'articlePlanList' ||Request::path() =='articlePlanCreate' )
                     class="a_active"
                     @else
                     class="a_default"
                 @endif>计划管理</a>
            </div>
            {{--<div  class="menu secMenu">--}}
                {{--<span class="glyphicon glyphicon-share"></span><a href="/articleShare"--}}
                      {{--@if( Request::path() == 'articleShare' )--}}
                      {{--class="a_active"--}}
                      {{--@else--}}
                      {{--class="a_default"--}}
                  {{--@endif>个人分享管理</a>--}}
            {{--</div>--}}
        </div>
    </div>
    <div>
        <div class="menu firMenu">
            <span class="glyphicon glyphicon-envelope"></span><a href="javascript:;" class="a_default">邮件管理</a>
        </div>
        <div id="mailManage">
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-send"></span><a href="/mailCreate" class="a_default">写邮件</a>
            </div>
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-lock"></span><a href="/mailBox" class="a_default">收件箱</a>
            </div>
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-trash"></span><a href="/mailTrash" class="a_default">垃圾箱</a>
            </div>
        </div>
    </div>
    <div>
        <div class="menu firMenu">
            <span class="glyphicon glyphicon-cog"></span><a href="/websiteManage" class="a_default">站点管理</a>
        </div>
        <div id="websiteManage" >
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-user"></span><a href="/websiteInfo" class="a_default">个人资料</a>
            </div>
            <div  class="menu secMenu">
                <span class="glyphicon glyphicon-link"></span><a href="/websiteLinks" class="a_default">链接管理</a>
            </div>
        </div>
    </div>
    <div>
        <div class="menu firMenu">
            <span class="glyphicon glyphicon-comment"></span><a href="/commentManage" class="a_default">评论管理</a>
        </div>
    </div>
</div>