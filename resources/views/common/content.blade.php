{{--@if( preg_match("/<img.*?src=\"(.*?)\".*?>/is",$article->html_content,$match)){{ $match }}@else  @endif--}}
@if(!empty($articles) && count($articles)>0)
    @foreach($articles as $article)
        <div  class="row blog-thumbnail">
            <div class="col-sm-12 col-md-3" style="text-align: center;padding: 10px 0 10px 10px;">
                <img  style="width:100%;height: 240px;border-radius: 4px;" alt="通用的占位符缩略图"
                      src="@if(preg_match("/<img.*?src=\"(.*?)\".*?>/is",$article->html_content,$matchImg))
    {{--                          {{ $matchImg[0] }}--}}
                              @if( preg_match("/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i",$matchImg[0],$matchSrc))
                                    {{ $matchSrc[1] }}
                                @endif
                            @else
                              /images/v.jpg
                            @endif">
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="row">
                    <div class="col-sm-12 col-md-9"><h3>{{ $article->title }}</h3></div>
                    <div class="col-sm-12 col-md-3" style="text-align: right"><h3>{{ date('Y-m-d',$article->published_at) }}</h3></div>
                </div>
                {{--<hr>--}}
                <div id="html_content" style="height:140px;overflow:hidden;">
                    {{--<p>--}}
                        {!! preg_replace("/<img.*?src=\"(.*?)\".*?>/is",'',$article->html_content) !!}
                    {{--</p>--}}
                </div>
                {{--<hr>--}}
                <p>
                    <div class="row">
                        <div class="col-md-10 col-sm-12">
                            <p>
                    <span href="#" title="支持量" style="margin-right:10px"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;{{ $article->up }}</span>
                    <span href="#" title="反对量" style="margin-right:10px"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp;{{ $article->down }}</span>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-12" style="text-align: center">
                            <a href="/articleDetail/{{ $article->id }}" class="btn btn-primary btn-block" role="button">阅读全文</a>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    @endforeach

    <!-- 分页  -->
    <div>
        <div class="pull-right">
            {{$articles->render()}}
        </div>
    </div>
    {{--分页--}}
@else
    <div  class="row blog-thumbnail" style="text-align: center;color: red;">
        <h1>没有数据...</h1>
    </div>
@endif
