<?php

namespace App\Controllers;

use App\Models\Subject;
use App\Models\User;

class HomeController
{
    public function index()
    {
        //chưa đăng nhập thì trả về trang đăng nhập
        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('location: http://localhost/WEB3014/asm1/login');
            die;
        }else{
            $user = User::all();
            $info = $_SESSION['name'];
            $role = $_SESSION['role'];
        }
        $subject = Subject::all();

        include_once './app/views/homepage/index.php';
    }

    
}
