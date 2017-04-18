<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    /*
     * //邮件管理路由组
    Route::group(['middleware' => 'web'], function () {
    Route::get('mailManage',['uses' => 'MailController@index']);
    Route::get('mailBox',['uses' => 'MailController@mailBox']);
    Route::get('mailTrash',['uses' => 'MailController@mailTrash']);
    Route::get('mailCreate',['uses' => 'MailController@create']);
    Route::get('mailDelete/{id}',['uses' => 'MailController@delete']);

});
     * */

    public function index () {
        return view('admin.mailManage');
    }
    public function mailBox () {
        return view('admin.mailBox');
    }
    public function mailTrash () {
        return view('admin.mailTrash');
    }
    public function create () {
        return view('admin.mailCreate');
    }
    public function delete () {
        return view('admin.mailDelete');
    }
}
