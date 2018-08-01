<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    //
    public function login()
    {//登录页面
        return view('session/login');
    }

    public function store(Request $request)
    {//验证
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
        ]);

       if ( Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ],$request->rememberToken)){//认证成功
           return redirect('/')->with('success','登录成功')->withInput();
       }else{
           session()->flash('danger','用户名或密码错误');
           return redirect()->back();
       }
    }
    
    //退出
    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success','注销成功');
    }

    //修改密码
    public function change(Admins $admin)
    {
        return view('session/change',compact('admin'));
    }

    public function update(Request $request,Admins $admin)
    {
        $this->validate($request,[
            'captcha'=>'required|captcha',
            'password'=>'required|confirmed',
            'old_password'=>'required'
        ],[
            'captcha.required'=>'请输入验证码',
            'captcha.captcha'=>'验证码错误',
            'old_password.required'=>'旧密码不能为空',
            'password.required'=>'密码不能为空',
            'password.confirmed'=>'两次输入的密码不一致',
        ]);

        if (Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->old_password
        ])){//旧密码验证成功
            $admin->update([
                'password'=>bcrypt($request->password)
            ]);
            Auth::logout();
            return redirect('/')->with('success','修改成功')->withInput();
        }else{//旧密码错误
            session()->flash('danger','旧密码错误');
            return redirect()->back();
        }
//        $this->validate($request,[
//            $this->
//        ]);
    }
}
