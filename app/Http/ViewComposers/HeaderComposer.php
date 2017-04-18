<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\Contracts\View\View;

class HeaderComposer
{
    /**
     * 用户仓库实现.
     *
     * @var UserRepository
     */
    protected $categorys;

    /**
     * 创建一个新的属性composer.
     *
     * @param UserRepository $users
     * @return void
     */
    public function __construct(Category $categorys)
    {
        // Dependencies automatically resolved by service container...
        $this->categorys = $categorys;
    }

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categorys', $this->categorys->all());
    }
}

