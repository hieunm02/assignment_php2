<?php

namespace App\Controllers;

use App\Models\StudentQuiz;

class StudentQuizController
{
    public function index()
    {
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
    public function reset($studentQuizId)
    {
        StudentQuiz::destroy($studentQuizId);
        header('location: ' . BASE_URL . 'studentquiz');
        die;
    }
}
