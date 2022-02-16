<?php

namespace App\Controllers;

use App\Models\Subject;
use App\Models\User;

class HomeController
{
    public function index()
    {
        $user = User::all();
        $info = $_SESSION['name'];
        $role = $_SESSION['role'];
        $subject = Subject::all();

        include_once './app/views/homepage/index.php';
    }
}
