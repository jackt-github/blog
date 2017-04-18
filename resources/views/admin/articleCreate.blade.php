@extends('layouts.adminLayouts')

@section('title','写文章')

@section('head')
    <link rel="stylesheet" href="/editor.md/editormd.css">
    <script src="/editor.md/editormd.min.js"></script>
@stop

@section('style')

@stop

@section('sidebar')
    @include('adminCommon.adminSidebar')
@stop

@section('content')
    @include('adminCommon.createArticleForm')
@stop


@section('script')
    <script type="text/javascript">
        $(function() {
            editormd("editormd", {
                width   : "100%",
                height  : 640,
                emoji : true,
                syncScrolling : "single",
                //你的lib目录的路径，我这边用JSP做测试的
                path    : "/editor.md/lib/",
                saveHTMLToTextarea : true
            });
            // You can custom Emoji's graphics files url path
            editormd.emoji     = {
                path  : "http://www.emoji-cheat-sheet.com/graphics/emojis/",
                ext   : ".png"
            };

            // Twitter Emoji (Twemoji)  graphics files url path
            editormd.twemoji = {
                path : "http://twemoji.maxcdn.com/72x72/",
                ext  : ".png"
            };

        });
    </script>
@stop













