<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /*
     * //评论系统管理路由组
    Route::group(['middleware' => 'web'], function () {
    Route::get('comment',['uses' => 'CommentsController@index']);
    Route::get('commentManage',['uses' => 'CommentsController@manage']);
    Route::get('commentDelete',['uses' => 'WebsiteController@delete']);
});
     * */
    public function index (Request $request) {
        $this->validate($request,[
            'article_id' => 'required|integer',
            'uid' => 'required|integer',
            'parent_id'=>'required|integer',
            'content' => 'required',
        ]);

        $data = $request->only('uid','article_id','parent_id','content');
        if($data['parent_id'] == -1 ) $data['parent_id'] = null;

        $comment = new Comment();
        $comment->uid = $data['uid'];
        $comment->parent_id = $data['parent_id'];
        $comment->article_id = $data['article_id'];
        $comment->content = $data['content'];

        if($comment->save())
        {
            DB::insert('insert into commentUpDown (comment_id,up,down) values(?,?,?)',[$comment->id,0,0]);
            return Response()->json(['success'=>'评论发表成功！']);
        }else{
            return Response()->json(['error'=>'评论发表失败！']);
        }
    }

    public function manage () {
        return view('admin.commentManage');
    }

    public function delete (Request $request) {
        $comment = Comment::all();
        return $comment;
        $comment->delete();
        if($comment->trashed()){
            echo "软删除成功！";
            dd($comment);
        }else{
            echo "软删除失败";
        }
    }
}
