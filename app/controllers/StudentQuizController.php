<?php

namespace App\Controllers;

use App\Models\StudentQuiz;

class StudentQuizController
{
    public function index()
    {
        //chưa đăng nhập thì trả về trang đăng nhập
        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('location: ' . BASE_URL . 'login');
            die;
        }

        if (isset($_GET['pages'])) {
            $page = $_GET['pages'];
        } else {
            $page = 1;
        }
        $count = StudentQuiz::count();
        $row = 10;
        $pages = ceil($count / $row);
        $from = ($page - 1) * $row;

        $studentQuiz = StudentQuiz::studentQuiz($from, $row);
        include_once './app/views/student_quiz/index.php';
    }
    public function reset()
    {
        $id = $_GET['id'];
        StudentQuiz::destroy($id);
        header('location: ' . BASE_URL . 'studentquiz');
        die;
    }
}
