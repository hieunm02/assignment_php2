<?php
    namespace App\Controllers;

use App\Models\User;

class LoginController {
        public function index(){
            return view('login.form-login', []);
        }

        public function checkLogin(){
            $login = User::all();
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            // var_dump($email, $password);die;
            $model = User::where('email', '=', $email )->where('password', '=', $password)->first();
            $_SESSION['login'] = $model;
            $_SESSION['name'] = $_SESSION['login']->name;
            $_SESSION['id'] = $_SESSION['login']->id;
            $_SESSION['email'] = $_SESSION['login']->email;
            $_SESSION['password'] = $_SESSION['login']->password;
            $_SESSION['avatar'] = $_SESSION['login']->avatar;
            $_SESSION['role'] = $_SESSION['login']->role_id;
            if(!$model){
                $_SESSION['mess'] = "Sai tài khoản hoặc mật khẩu !";
                header('location: ' . BASE_URL . 'login');
                die;
            }else{
                header('location: ' . BASE_URL);
                die;
            }

        }

        public function logout(){
            return view('login.logout', []);
        }
    }

?>