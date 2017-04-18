<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//个人主页
Route::get('/', function () {
    return view('index');
});
//登陆
Auth::routes();
//admin主页
Route::get('/home', 'HomeController@index');

Route::get('/auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('/auth/logout', 'Auth\AuthController@logout');
Route::get('/auth/github/callback', 'Auth\AuthController@handleProviderCallback');

//博文管理路由组
Route::group(['middleware' => 'web'], function () {
    Route::get('blog',['uses' => 'ArticleController@index']);
    Route::any('categoryList',['uses' => 'CategoryController@show']);
    Route::any('categoryCreate',['uses' => 'CategoryController@create']);
    Route::any('categoryUpdate/{id}',['uses' => 'CategoryController@update']);
    Route::any('categoryDelete/{id}',['uses' => 'CategoryController@delete']);
    Route::get('category/{id}',['uses' => 'CategoryController@category']);
    Route::get('articleList',['uses' => 'ArticleController@articleList']);
    Route::any('articleCreate',['uses' => 'ArticleController@create']);
    Route::get('articlePlanList',['uses' => 'ArticleController@planList']);
    Route::any('articlePlanUpdate/{id}',['uses' => 'ArticleController@planUpdate']);
    Route::get('articlePlanDelete/{id}',['uses' => 'ArticleController@planDelete']);
    Route::any('articlePlanCreate',['uses' => 'ArticleController@planCreate']);
    Route::get('articleShare',['uses' => 'ArticleController@share']);
    Route::any('articleUpDown',['uses' => 'ArticleController@upDown']);
    Route::get('articleDetail/{id}',['uses' => 'ArticleController@detail']);
    Route::any('articleUpdate/{id}',['uses' => 'ArticleController@update']);
    Route::get('articleDelete/{id}',['uses' => 'ArticleController@delete']);
});


Route::get('admin',function(){
    return view('admin.index');
});
//邮件管理路由组
Route::group(['middleware' => 'web'], function () {
    Route::get('mailManage',['uses' => 'MailController@index']);
    Route::get('mailBox',['uses' => 'MailController@mailBox']);
    Route::get('mailTrash',['uses' => 'MailController@mailTrash']);
    Route::get('mailCreate',['uses' => 'MailController@create']);
    Route::get('mailDelete/{id}',['uses' => 'MailController@delete']);

});

//站点管理路由组
Route::group(['middleware' => 'web'], function () {
    Route::get('websiteManage',['uses' => 'WebsiteController@index']);
    Route::get('websiteLinks',['uses' => 'WebsiteController@links']);
    Route::get('websiteInfo',['uses' => 'WebsiteController@info']);
});

//评论系统管理路由组
Route::group(['middleware' => 'web'], function () {
    Route::get('/comment',['uses' => 'CommentController@index']);
    Route::get('commentManage',['uses' => 'CommentController@manage']);
    Route::get('/commentDelete',['uses' => 'CommentController@delete']);
});

Route::get('test',function (){
   return 'test';
});







