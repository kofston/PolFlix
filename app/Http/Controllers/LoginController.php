<?php

namespace App\Http\Controllers;
use App\Login;
use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class LoginController extends Controller
{
    public function register()
    {
        return view('header').view('register').view('footer');
    }
    public function tester()
    {
        return 5;
    }
    public function signin()
    {
        $name = Request::input('name_r');
        $lastname = Request::input('lastname_r');
        $login = Request::input('login_r');
        $pass = Request::input('password_r');
        $mail = Request::input('email_r');

        $put_user = new Login;
        $put_user = $put_user->insert_new_user($name,$lastname,$login,$pass,$mail);
        if($put_user)
            return $is_register = 1;
        else
            return $is_register = 0;

    }
    public function signup()
    {
        $name = Request::input('login');
        $pass = Request::input('password');
        $login_user = new Login;
        $doyoulog = $login_user->login_checker($name,$pass);

        return $doyoulog;
    }
    public function unlog()
    {
        if(!session_id()) {
            session_start();
        }
        session_destroy();
        return redirect('/');
    }

    public function forgot_pass()
    {
        $forgot_pass_mail = Request::input('forgot_pass');
        $send_pass = new Login;
        $send_pass->send_new_pass($forgot_pass_mail);
        return redirect('/');
    }
}
