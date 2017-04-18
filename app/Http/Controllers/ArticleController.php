<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use App\Plan;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /*
     * ArticleController控制器对应路由
    Route::get('blog',['uses' => 'ArticleController@index']);
    Route::get('articleManage',['uses' => 'ArticleController@manage']);
    Route::get('articleCreate',['uses' => 'ArticleController@create']);
    Route::get('articlePlan',['uses' => 'ArticleController@plan']);
    Route::get('articleShare',['uses' => 'ArticleController@share']);
    Route::get('articleDetail/{id}',['uses' => 'ArticleController@detail']);
    Route::get('articleUpdate/{id}',['uses' => 'ArticleController@update']);
    Route::get('articleDelete/{id}',['uses' => 'ArticleController@delete']);
     * */
    //博客首页
//    匹配img标签的正则表达式：string Pattern = @"<img/s+[^>]*/s*src/s*=/s*([']?)(?<url>/S+)'?[^>]*>";

//    匹配img 的src的正则表达式：string Pattern = @"(?<=src/s*=/s*[/'/""]?)(?<url>[http/:////]?[^'""]+)";

    public function index () {

        $articles = Article::join('articleUpDown', 'article.id', '=', 'articleUpDown.article_id')
                        ->select('article.id','title','html_content','published_at','up','down')
                        ->orderBy('published_at','DESC')
                        ->paginate(10);

//        $recommedArticles = Article::join('articleUpDown','articleUpDown.article_id','article.id')
//                            ->select('article.id','title','up')
//                            ->orderBy('up','DESC')
//                            ->take(6)
//                            ->get();
//        dd($recommedArticles) ;return;

        return view('blog.index',[
            'articles'=>$articles,
//            'recommedArticles'=>$recommedArticles,
        ]);
    }

    //博文管理
    public function articleList () {
        //select category from article,category where article.category_id=category.id
        $article = DB::table('article')
                    ->join('category','category_id','=','category.id')
                    ->select('article.id','title','category','article.created_at','article.updated_at','published_at')
                    ->paginate(10);

        return view('admin.articleList',['articles' => $article]);
    }

    //写博文
    public function create (Request $request) {

        //判断，如果是post方法，则是提交表单
        $article = new Article();
        if($request->isMethod('post')){

            $data = $request->input();
            $data['published_at'] = strtotime($data['published_at']);
                //validator类验证
            $validator = \Validator::make($data,[
                'title' => 'required',
                'category_id' => 'required|integer',
                'markdown_content' => 'required',
                'published_at' => 'required|integer',
            ],[
                    'required' => ':attribute为必填项',
                    'integer' => ':attribute必须为整数',
            ],[
                    'title' => '文章标题',
                    'category_id' => '分类id',
                    'markdown_content' => '文章内容',
                    'published_at' => '发表时间',
            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $article = new Article();
            $article->title = $data['title'];
            $article->category_id = $data['category_id'];
            $article->published_at = $data['published_at'];
            $article->markdown_content = $data['markdown_content'];
            $article->html_content = $data['html_content'];

            if($article->save())
            {
                DB::insert('insert into articleUpDown (article_id,up,down) values(?,?,?)',[$article->id,0,0]);
                return redirect('articleList')->with('success','文章添加成功！');
            }else{
                return redirect()->back();
            }

        }
        $categorys = Category::all();
        return view('admin.articleCreate',['categorys' => $categorys,'article' => $article]);
    }

    //博文详情页
    public function detail($id) {
        $article = new Article();
        $article = $article
                    ->join('category','article.category_id','=','category.id')
                    ->where('article.id',$id)
                    ->select('article.id','title','category','html_content','published_at')
                    ->first()
        ;

        //获取前后相邻两篇文章
        $preArticle = Article::where('id','<',$id)->orderBy('id','DESC')->first();
        $nextArticle = Article::where('id','>',$id)->orderBy('id','ASC')->first();

        //获取对应id文章的评论信息
        $hostComments = Comment::join('socialUsers','comments.uid','=','socialUsers.social_uid')
                    ->where('article_id','=',$id)
                    ->whereNull('parent_id')
                    ->select('parent_id','content','nick_name','user_url','pic_url','comments.id','comments.created_at')
                    ->get();
//        return $hostComments;
        //获取楼层评论
        $floorComments = Comment::join('socialUsers','comments.uid','=','socialUsers.social_uid')
                        ->where('article_id','=',$id)
                        ->whereIn('parent_id',Comment::pluck('id'))
                        ->select('parent_id','content','nick_name','user_url','pic_url','comments.id','comments.created_at')
                        ->get();


//            return $floorComments;
//        return $comments;

        //获取点赞和反对信息
        $upDown = DB::table('articleUpDown')->where('article_id',$id)->select('up','down')->get();

//        $floorParentIds = array_unique($floorComments->pluck('parent_id')->toArray());

        return view('blog.detail',[
            'article'=>$article,
            'upDown'=>$upDown,
            'preArticle'=>$preArticle,
            'nextArticle'=>$nextArticle,
            'hostComments'=>$hostComments,
            'floorComments'=>$floorComments,
            'floorParentIds'=>array_unique($floorComments->pluck('parent_id')->toArray()),
        ]);
    }

    //博文修改
    public function update (Request $request,$id) {

        if($request->isMethod('post')){
            $article = Article::find($id);
            $data = $request->input();
            $data['published_at'] = strtotime($data['published_at']);
            //validator类验证
            $validator = \Validator::make($data,[
                'title' => 'required',
                'category_id' => 'required|integer',
                'markdown_content' => 'required',
                'published_at' => 'required|integer',
            ],[
                'required' => ':attribute为必填项',
                'integer' => ':attribute必须为整数',
            ],[
                'title' => '文章标题',
                'category_id' => '分类id',
                'markdown_content' => '文章内容',
                'published_at' => '发表时间',
            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $items = ['title','category_id','published_at','markdown_content','html_content'];
            foreach( $items as $item){
                $article[$item]  = $data[$item];
            }
//            return $article;

            if($article->save())
            {
                return redirect('articleList')->with('success','文章修改成功！');
            }else{
                return redirect()->back();
            }

        }
        $categorys = Category::all();
        $article = new Article();
        $article = $article
            ->join('category','article.category_id','=','category.id')
            ->where('article.id',$id)
            ->select('article.id','title','category_id','markdown_content','published_at')
            ->first()
        ;
//        return $article;
        return view('admin.articleUpdate',['categorys' => $categorys,'article' => $article]);
    }

    //博文删除
    public function delete ($id) {
        $article = Article::find($id);
        if ($article->delete())
        {
            return redirect('articleList')->with('success','删除id为'. $id.'的文章成功！' );
        }else{
            return redirect('articleList')->with('error','删除id为'. $id.'的文章失败！' );
        }
    }

    //博文点赞
    public function upDown (Request $request) {
        $this->validate($request,[
            'article_id' => 'required|integer',
            'type' => 'required',
        ]);
        $article_id = $request['article_id'];

        if($request['type'] == 'up') {
            DB::table('articleUpDown')->where('article_id', $article_id)->increment('up');
            $up = DB::table('articleUpDown')->where('article_id',$article_id)->value('up');
            return Response()->json(['success' => 'up success','up'=>$up]);
        }else{
            DB::table('articleUpDown')->where('article_id',$article_id)->increment('down');
            $down = DB::table('articleUpDown')->where('article_id',$article_id)->value('down');
            return Response()->json(['success' => 'down success','down'=>$down]);
        }

    }

    //博文计划
    public function planCreate (Request $request) {
        $data = $request->input();
        if($request->isMethod('post')){
            $this->validate($request,[
                'html_content'=>'required',
                'markdown_content'=>'required'
            ],[
                'required'=>':attribute为必填项'
            ]);

            if (Plan::create($data)){
                return redirect('articlePlanList')->with('success','计划添加成功！');
            }else{
                return redirect()->back();
            }

        }
        return view('admin.planCreate');
    }

    public function planList(){
        $plans = Plan::all();
        return view('admin.planList',['plans'=>$plans]);
    }

    public function planUpdate(Request $request,$id){
        if ($request->isMethod('post')){
            $data = $request->input();
            if($request->isMethod('post')){
                $this->validate($request,[
                    'html_content'=>'required',
                    'markdown_content'=>'required'
                ],[
                    'required'=>':attribute为必填项'
                ]);
            }
            $plan = Plan::find($id);
            $plan['html_content'] = $data['html_content'];
            $plan['markdown_content'] = $data['markdown_content'];

            if ($plan->save()){
                return redirect('articlePlanList')->with('success','修改计划成功！');
            }else{
                return redirect()->back();
            }
        }
        $plan = Plan::find($id);
        return view('admin.planUpdate',['plan'=>$plan]);
    }

    public function planDelete($id){
        $plan = Plan::find($id);
        if ($plan->delete())
        {
            return redirect('articlePlanList')->with('success','删除id为'. $id.'的计划成功！' );
        }else{
            return redirect('articlePlanList')->with('error','删除id为'. $id.'的计划失败！' );
        }
    }

    //博文分享
    public function share () {
        return view('admin.articleShare');
    }

}
