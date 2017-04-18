<?php

namespace App\Http\Controllers\Auth;

use App\SocialUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //将用户重定向到github认证页面
    public function redirectToProvider(){
        return Socialite::driver('github')->redirect();
    }

    //从github获取用户信息
    public function handleProviderCallback(Request $request)
    {

        $user = Socialite::driver('github')->user();
//        dd(null == SocialUsers::where('social_uid','=',$user->id)->first());
//        return ;
        if(null == SocialUsers::where('social_uid','=',$user->id)->first()){
            $userInfo = [
                'platform'=>'github',
                'social_uid'=>$user->id,
                'nick_name'=>$user->nickname,
                'email'=>$user->email,
                'user_url'=>$user->user['html_url'],
                'pic_url'=>$user->avatar,
                'created_at'=>time(),
            ];
            if(SocialUsers::create($userInfo)){
                return redirect()->back()->with('成功保存到用户表！');
            }else{
                return redirect()->back()->with('保存到用户表失败！');
            }
        }

        $request->session()->put('userInfo',[
            'nick_name'=>$user->nickname,
            'user_url'=>$user->user['html_url'],
            'uid'=>$user->id,
            'pic_url'=>$user->avatar,
        ]);

        return redirect()->back();
    }

    //退出登录
    public function logout(Request $request){
       if(!$request->session()->forget('userInfo')){
           return \Response::json(['success'=>'退出登录成功']);
       }else{
           return \Response::json(['error'=>'退出登录失败']);
       }
    }
}
