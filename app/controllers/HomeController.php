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

        return view('homepage.index', [
            'user' => $user,
            'info' => $info,
            'role' => $role,
            'subject' => $subject,
        ]);
    }
}
