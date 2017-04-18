<div class="col-md-12">
    <div class="thumbnail" style="margin-right: 30px;">
        @include('common.message')
        <div class="table-responsive">
            @if(!empty($articles) && count($articles)>0)
            <table class="table table-bordered table-striped table-hover table-condensed">
                <caption><h3>博文列表</h3></caption>
                <thead>
                <tr>
                    <th>id</th>
                    <th>标题</th>
                    <th>所属分类</th>
                    <th>发表时间</th>
                    <th>创建时间</th>
                    <th>最后修改时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach( $articles as $article )
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category }}</td>
                        <td>{{ date('Y-m-d H:i:s',$article->published_at) }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td>
                            <a href="articleDetail/{{ $article->id }}">详情</a>
                            <a href="articleUpdate/{{ $article->id }}">修改</a>
                            <a href="{{ url('articleDelete',['id' => $article->id]) }}"
                               onclick="if(confirm('你确定要删除这篇文章吗？') == false) return false;">删除</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

            @else
                <h3 style="text-align: center">没有数据</h3>
            @endif
        </div>
        <!-- 分页  -->
        <div>
            <div class="pull-right">
                {{$articles->render()}}
            </div>
        </div>
        {{--分页--}}
    </div>
</div>











