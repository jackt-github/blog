<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /*
     * 在容器中注册绑定
     *
     * @return void
     * @author http://jackt.cn
     * */
    public function boot(){
        // 使用基于类的composers...
        view()->composer(
            'common.header', 'App\Http\ViewComposers\HeaderComposer'
        );

        view()->composer(
            'common.sidebar', 'App\Http\ViewComposers\SidebarComposer'
        );


        // 使用基于闭包的composers...
        view()->composer('dashboard', function ($view) {});

    }

    /**
     * 注册服务提供者.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}