<div class="commentList col-md-12 col-sm-12">
    @if(count($hostComments)>0)
        @foreach($hostComments as $hostComment)

            <div class="commentBlade">
                <div class="floorHost clearfix">
                    <div class="userHeadPic">
                        <img src="{{ $hostComment->pic_url }}" alt="用户头像">
                    </div>
                    <div class="mainComment clearfix" >
                        <div class="userName">
                            <p>
                                <a href="{{ $hostComment->user_url }}">
                                <span>
                                    {{ $hostComment->nick_name }}
                                </span>
                                </a>
                            </p>
                        </div>
                        <div class="userComment">
                            <p>{{ $hostComment->content }}</p>
                        </div>
                        <div class="commentRelational pull-right">
                            <span>{{ $hostComment->created_at }}</span>
                            <span>楼主</span>
                            {{--<a href="javascript:void(0);"><span class="glyphicon glyphicon-thumbs-up"></span><span>(1234)</span></a>--}}
                            {{--<a href="javascript:void(0);"><span class="glyphicon glyphicon-thumbs-down"></span><span>(12)</span></a>--}}
                            <a href="javascript:void(0);" id="{{$hostComment->id}}" class="doComment" >参与回复</a>
                            <a href="javascript:void(0);" class="report" id="{{ $hostComment->id }}">举报</a>
                        </div>
                    </div>
                </div>
             @if(count($floorComments)>0 && in_array($hostComment->id,$floorParentIds))
                <a href="javascript:void(0);" style="margin-left: 50px;" data-toggle="collapse" data-target="#floors{{ $hostComment->id }}">展开/收起回复</a>

                <div class="floors collapse" id="floors{{ $hostComment->id }}">
                <?php $floorNo = 0 ?>
                @foreach($floorComments as $number=>$floorComment)
                        @if($hostComment->id == $floorComment->parent_id)
                            <?php $floorNo++ ?>
                            <div class="floor">
                                <div class="userHeadPic">
                                    <img src="{{ $floorComment->pic_url }}" alt="用户头像">
                                </div>
                                <div class="mainComment">
                                    <div class="userName">
                                        <p><span>{{$floorComment->nickname}}</span></p>
                                    </div>
                                    <div class="userComment">
                                        <p>{{$floorComment->content}}</p>
                                    </div>
                                    <div class="commentRelational">
                                        <span>{{$floorComment->created_at}}</span>
                                        <span>{{$floorNo}}F</span>
                                        <a href="javascript:void(0);" class="report" id="{{ $floorComment->id }}">举报</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                @endforeach
                </div>

             @endif
            </div>

        @endforeach

        {{--<div class="commentBlade">--}}
            {{--<div class="moreComment">--}}
                {{--<a href="javascript:;">更多评论（共125条）</a>--}}
            {{--</div>--}}
        {{--</div>--}}

    @else
        <div class="commentBlade">
            <h3 style="text-align: center">暂无评论</h3>
        </div>
    @endif

</div>

{{--评论框--}}
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding: 5px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="commentTextarea" id="commentContent" contenteditable="true"></div>
            <div class="commentButton">
                <button id="publishComment" class="btn btn-primary btn-block" type="button">
                    评论
                </button>
            </div>
        </div>
    </div>
</div>
{{--评论框--}}

{{--评论提交提示信息模态框--}}
<div class="modal fade" id="commentResponseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 style="text-align: center" id="responseContent"></h3>
            </div>

        </div>
    </div>
</div>
{{--评论提交提示信息模态框--}}


<script>
//评论提交响应消息提示框函数
    function showResponse(){
        $('#commentResponseModal').modal('show');
        setTimeout(function(){
            $('#commentResponseModal').modal('hide');
        },1500)
    }

//绑定回复入口的点击事件
    var comment_id = '';
    $('.doComment').click(function(){
        if(!document.getElementById('logout')){
            $('#responseContent').text('请先登录！');
            showResponse();
        }else{
            comment_id = $(this).attr('id') ? $(this).attr('id') : -1;
            $('#commentContent').text('');
            $('#commentModal').modal('show');
        }
    });

//提交异步请求评论
    function comment(uid,article_id,parent_id,content){
{{--        alert('{{ \Illuminate\Support\Facades\Request::path() }}');--}}
        $.ajax({
            url:"/comment",
            data:{
                _token:"{{csrf_token()}}",
                uid:"{{ session('userInfo')['uid'] }}",
                article_id:article_id,
                parent_id:parent_id,
                content:content
            },
            success:function(result,xhr){
                $('#commentModal').modal('hide');
                $('#responseContent').text('评论发表成功！');
                showResponse();
                location.reload(true);
            },
            error:function (xhr,status,error) {
                if (xhr.status == 422){
                    $('#commentModal').modal('hide');
                    $('#responseContent').text('评论内容不能为空！');
                    showResponse();
                }

                if (xhr.status == 500){
                    $('#responseContent').text('代码错误提示！');
                    showResponse();
                }
            }
        });
    }

//绑定评论框提交按钮的点击事件
    $('#publishComment').click(function() {
        comment(123,'{{ $article->id }}',comment_id,$('#commentContent').text());
    });

    $('.report').click(function () {
        alert(12);
    });

</script>
