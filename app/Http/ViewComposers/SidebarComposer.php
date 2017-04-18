<?php

namespace App\Http\ViewComposers;

use App\Article;
use App\Category;
use App\Comment;
use App\Plan;
use Illuminate\Contracts\View\View;

class SidebarComposer
{
    /**
     * 用户仓库实现.
     *
     * @var UserRepository
     */
    protected $recommedArticles;
    protected $plans;
    protected $articleNumber;
    protected $commentsNumber;

    /**
     * 创建一个新的属性composer.
     *
     * @param UserRepository $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->recommedArticles = Article::join('articleUpDown','articleUpDown.article_id','article.id')
                                    ->select('article.id','title','up')
                                    ->orderBy('up','DESC')
                                    ->take(6)
                                    ->get();

        $this->plans = Plan::orderBy('updated_at')->limit(3)->get();

        $this->articleNumber = Article::all()->count();

        $this->commentsNumber = Comment::all()->count();
    }

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'recommedArticles'=> $this->recommedArticles,
            'plans'=>$this->plans,
            'articleNumber'=>$this->articleNumber,
            'commentsNumber'=>$this->commentsNumber,
        ]);
    }
}

