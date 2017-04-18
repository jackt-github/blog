@extends('layouts.adminLayouts')

@section('title','新增计划')

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
    <div class="container">
        <div class="row">
            <div class="col-md-11" style="padding:25px;">
                @include('common.validator')
                @include('common.message')
                <form action="" method="post" class="form-horizontal" role="form">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="content">计划内容</label>
                        <div class="editormd" id="editormdPlan">
                            {{--editormd的输入区域--}}
                            <textarea class="editormd-markdown-textarea" name="markdown_content" style="display: none;">{{ old('markdown_content') ? old('markdown_content') : $plan }}</textarea>
                            <!-- 第二个隐藏文本域，用来构造生成的HTML代码，方便表单POST提交，这里的name可以任意取，后台接受时以这个name键为准 -->
                            <textarea class="editormd-html-textarea" name="html_content"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">提交</button>
                </form>
            </div>
        </div>
    </div>
@stop


@section('script')
    <script type="text/javascript">
        $(function() {
            editormd("editormdPlan", {
                width   : "100%",
                height  : 480,
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













