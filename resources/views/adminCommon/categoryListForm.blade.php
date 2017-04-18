<div class="container">
    <div class="row">
        <div class="col-md-11" style="padding:25px;">
            @include('common.message')
            <div class="manageBar">
                <a href="categoryCreate"><span class="glyphicon glyphicon-plus"></span>&nbsp;新增分类</a>
            </div>
            <div class="table-responsive">
                @if(!empty($categorys) && count($categorys)>0)
                    <table class="table table-bordered table-striped table-hover table-condensed">
                        <caption>
                            <h3>标签列表</h3>
                        </caption>
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>标签</th>
                            <th>创建时间</th>
                            <th>最后修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $categorys as $category )
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <a href="categoryUpdate/{{ $category->id }}">修改</a>
                                    <a href="{{ url('categoryDelete',['id' => $category->id]) }}"
                                       onclick="if(confirm('你确定要删除这个标签吗？') == false) return false;">删除</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                @else
                    <h3 style="text-align: center">没有数据</h3>
                @endif
            </div>
        </div>
    </div>
</div>

