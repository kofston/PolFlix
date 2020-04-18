<?php

namespace App;
use DB;
use Request;
use Session;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public function insert_new_user($name=NULL,$lastname=NULL,$login=NULL,$pass=NULL,$mail=NULL)
    {
        $new_user = DB::table('clients')->insertGetId(
            ['c_first_name' => $name,'c_last_name' => $lastname,'c_login'=>$login,'c_password'=>$pass,'c_email'=>$mail,'status' => '1' ]
        );
        if($new_user)
        {
            return 1;
        }
    }
    public function login_checker($login=NULL,$pass=NULL)
    {
        $IamLogged = 0;

        $new_user = DB::table('clients')->select('c_login','c_password','c_id')->where([
            ['c_login', '=', $login],
            ['c_password', '=', $pass],
            ['status', '=', '1'],
        ])->get();

        $new_user_isadmin = DB::table('admin')->select('a_login','a_password','a_id')->where([
            ['a_login', '=', $login],
            ['a_password', '=', $pass],
            ['status', '=', '1'],
        ])->get();

        if($new_user->isNotEmpty())
        {
            if(!session_id()) {
                session_start();
            }
            $_SESSION['isLogin']='1';
            $_SESSION['Login']=$login;
            $_SESSION['Login_id']=$new_user['0']->c_id;
            $IamLogged = 1;
        }
        else
        {
            if($new_user_isadmin->isNotEmpty())
            {
                if(!session_id()) {
                    session_start();
                }
                $_SESSION['isLogin']='1';
                $_SESSION['Login']=$login;
                $_SESSION['Login_id']=$new_user_isadmin['0']->a_id;
                $_SESSION['isAdmin']='1';
                $IamLogged = 1;
            }
        }

        return $IamLogged;
    }
    public function send_new_pass($email = NULL)
    {
        $client = DB::table('clients')->where('c_email',$email)->get();
        if($client!=NULL)
            foreach ($client as $cl)
            {
                $to      = $email;
                $subject = 'Pol-Flix - Nowe hasło';
                $newpass = time();
                $message = '<h2>Witaj '.$cl->c_login.'!</h2>Otrzymujesz nowe hasło!<h2>Twoje hasło to:</h2>'.$newpass.'<br>Teraz możesz się zalogować na swoje konto :)';
                echo $message;
                $headers = 'From: webmaster@example.com' . "\r\n" .
                    'Reply-To: webmaster@example.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

//    komentuje bo nie skonfigurowano portu
//    mail($to, $subject, $message, $headers);
            }
        return 1;
    }
}
