<div class="container">
    <div class="row">
        <div class="col-md-11" style="padding:25px;">
            @include('common.validator')
            @include('common.message')
            <form action="" method="post" class="form-horizontal" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">文章标题</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $article->title }}" placeholder="请输入文章标题">
                </div>
                <div class="form-group">
                    <label for="category">文章分类</label>
                    <select class="form-control" name="category_id">
                        @if(!empty($categorys) && count($categorys)>0)
                            @foreach($categorys as $category)
                                <option value="{{ $category->id}}"
                                        @if((old('category_id') ? old('category_id') : $article->category_id) == $category->id)
                                        selected @endif>
                                    {{$category->category}}</option>
                            @endforeach
                        @else
                            <option value="分类获取失败！">分类获取失败！</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="published_at">发表时间</label>
                    <input type="datetime-local" name="published_at"
                           value="{{ old('published_at') ? old('published_at') : date('Y-m-d H:i:s',$article->published_at)}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">文章内容</label>
                    <div class="editormd" id="editormd">
                        {{--editormd的输入区域--}}
                        <textarea class="editormd-markdown-textarea" name="markdown_content" style="display: none;">{{ old('markdown_content') ? old('markdown_content') : $article->markdown_content }}</textarea>
                        <!-- 第二个隐藏文本域，用来构造生成的HTML代码，方便表单POST提交，这里的name可以任意取，后台接受时以这个name键为准 -->
                        <textarea class="editormd-html-textarea" name="html_content"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">提交</button>
            </form>
        </div>
    </div>
</div>

