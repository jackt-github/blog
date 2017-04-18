<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /*
     * //站点管理路由组
    Route::group(['middleware' => 'web'], function () {
    Route::get('websiteManage',['uses' => 'WebsiteController@index']);
    Route::get('websiteLinks',['uses' => 'WebsiteController@links']);
    Route::get('websiteInfo',['uses' => 'WebsiteController@info']);
});
     * */
    public function index () {
        return view('admin.websiteManage');
    }
    public function links () {
        return view('admin.websiteLinks');
    }
    public function info () {
        return view('admin.websiteInfo');
    }
}
