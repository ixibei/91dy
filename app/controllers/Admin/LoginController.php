<?php

class Admin_LoginController extends Controller{

    public function verify(){
        //如果用户应登陆
        if (Auth::check()) {
            return Redirect::Route('dashboard');
        }
        if (Request::isMethod('post')) {
            $flag = Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')));
            if ($flag) {
                return Redirect::Route('dashboard');
            } else {
                echo '用户名或密码不正确！';
            }
        }
        return Response::view('admin.login.index');
    }

    public function logout(){
        session_destroy();
        return Redirect::intended('/');
    }
}