<div class="container">
    <div class="row">
        <div class="col-md-11" style="padding:25px;">
            @include('common.validator')
            @include('common.message')
            <form action="" method="post" class="form-horizontal" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">分类标签</label>
                    <input type="input" class="form-control" name="category" value="{{ old('category') ? old('category') : $category->category }}" placeholder="请输入分类标签">
                </div>
                <button type="submit" class="btn btn-primary btn-block">提交</button>
            </form>
        </div>
    </div>
</div>

