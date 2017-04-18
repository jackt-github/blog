<div class="row">
    <div class="sidebar-thumbnail" id="recommendation">
        <div class="item-title">推荐文章</div>
        <div class="item-content">
            @foreach($recommedArticles as $recommendArticle)
            <div style="overflow: hidden;width: 320px;height: 27px;text-overflow:ellipsis;word-wrap: break-word;word-break: break-all;">
                <a href="/articleDetail/{{ $recommendArticle->id }}" title="{{ $recommendArticle->title }}" style="text-decoration: none">
                    <span class="glyphicon glyphicon-thumbs-up">({{ $recommendArticle->up }})</span>
                    {{ $recommendArticle->title }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <div class="sidebar-thumbnail">
        <div class="item-title">jack的最新计划</div>
        @foreach( $plans as $plan)
        <div class="item-content">
            {!! $plan->html_content !!}
        </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="sidebar-thumbnail">
        <div class="item-title">本站数据</div>
        <div class="item-content">
            <ul>
                <li>博文量：{{ $articleNumber }}</li>
                <li>评论量：{{ $commentsNumber }}</li>
                <li>访问量：</li>
            </ul>
        </div>
    </div>
</div>