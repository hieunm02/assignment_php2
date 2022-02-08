<?php

namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        //chưa đăng nhập thì trả về trang đăng nhập
        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('location: ' . BASE_URL . 'login');
            die;
        }
        include_once './app/views/nav/nav-admin.php';
    }
}
