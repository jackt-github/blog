@extends('layouts.layouts')

@section('title','详情页')

@section('content')
    <div class="col-md-8 col-md-offset-2" >
        <div class="row" id="content">
            <div class="row thumbnail articleDetail">
                <div class="articleTitle">
                    <h2>{{ $article->title }}</h2>
                </div>
                <div class="relativeInfo">
                    <span>作者：jack &nbsp;&nbsp;发表日期：{{ date('Y-m-d H:i:s',$article->published_at) }}&nbsp;&nbsp;分类：{{ $article->category }}</span>
                </div>
                <hr>
                <div class="articleContent">
                    <p>
                        {!! $article->html_content  !!}
                    </p>
                </div>
                <div class="articleBar">
                    <a href="javascript:void(0);" class="upDown" title="up"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<span id="articleUps">({{ $upDown[0]->up }})</span></a>
                    <a href="javascript:void(0);" class="upDown" title="down"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;<span id="articleDowns">({{ $upDown[0]->down }})</span></a>
                    <a href="javascript:void(0);" class="doComment" ><span class="glyphicon glyphicon-comment"></span>&nbsp;<span>参与评论</span></a>
                    {{--<a href="javascript:void(0);">举报</a>--}}
                </div>
            </div>
            <div class="articlePager">
                <ul class="pager">
                    @if(null !== $preArticle)
                        <li ><a href="/articleDetail/{{ $preArticle->id }}">上一篇：{{ $preArticle->title }}</a></li>
                    @endif
                    @if(null !== $nextArticle)
                        <li ><a href="/articleDetail/{{ $nextArticle->id }}">下一篇：{{ $nextArticle->title }}</a></li>
                    @endif
                </ul>
            </div>
            @include('common.commentList')
        </div>
    </div>
@stop

@section('script')
//        为文章中的图片加上图片响应式
        $('.articleContent img').addClass('img-responsive');

//        支持反对点击事件与异步处理
        $('.upDown').click(function () {
            var title = $(this).attr('title');
            $.ajax({
                url:"{{ URL::action('ArticleController@upDown') }}",
                data:{
                    _token:"{{ csrf_token() }}",
                    article_id:"{{ $article->id }}",
                    type:title
                },
                success:function(result,xhr){
                    if(result.success == "up success"){
                        $('#articleUps').text('(' + result.up + ')');

                    }else if(result.success == "down success"){
                        $('#articleDowns').text('(' + result.down + ')');
                    }
                },
                error:function (xhr,status,error) {
                    if (xhr.status == 422){
                        alert("反对无效！");
                    }

                    if (xhr.status == 500){
                        alert("代码错误提示！");
                    }
                }
            });
        });
@stop











