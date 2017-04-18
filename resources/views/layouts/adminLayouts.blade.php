<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>admin-@yield('title')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="/images/JA.png"/>
    {{--<link rel="stylesheet" href="css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/adminStyle.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('head')
    <style>
        @yield('style')
    </style>

</head>

<body>

    {{--<div id="header">--}}
        {{--@include('common.adminHeader')--}}
    {{--</div>--}}

    <div id="adminMain" class="row">
        <div class="col-md-2 col-sm-2">
            @yield('sidebar')
        </div>
        <div class="col-md-10 col-sm-10">
            <div id="adminContentWrap">
                <div id="adminContent">
                    <div style="min-height: 550px;">
                        @yield('content')
                    </div>
                    @include('common.footer')
                </div>
            </div>
        </div>
    </div>



    @section('script')
    @show

</body>
</html>