<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title','jack的博客')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/images/JA.png" media="screen"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <style>
        @yield('style')
    </style>
</head>

<body>

{{--博客页面的头部相同，直接在layout中写好，不必在子模板再一一处理--}}
<div id="header">
    @include('common.header')
</div>

{{--基本每个页面的主要部分内容与布局不同，在父模板布置好位置,子模板做具体实现--}}
<div id="main">
    @section('content')
        @show
    @section('sidebar')
        @show
</div>

<div id="footer">
    @include('common.footer')
</div>

<div>
    @include('common.goTop')
</div>

<script>

    //百度分享社会化组件
    window._bd_share_config={"common":{"bdSnsKey":{"tqq":"3dW1M688Fo2sC2NO"},"bdText":"","bdMini":"1","bdMiniList":["qzone","tsina","weixin","sqq"],"bdPic":"","bdStyle":"0","bdSize":"24"},"slide":{"type":"slide","bdImg":"8","bdPos":"right","bdTop":"143.5"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];

    $('#logout').click(function(){
        $.ajax(
                {
                    url: "/auth/logout",
                    data: {
                        _token: "{{csrf_token()}}",
                    },
                    success: function (result, xhr) {
                        location.reload();
//                        alert('退出登录成功');
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status == 422) {
                            alert('422错误');
                        }

                        if (xhr.status == 500) {
                            alert('500错误');
                        }
                    }
                }
        )
    });
    @section('script')
        @show
</script>

</body>
</html>