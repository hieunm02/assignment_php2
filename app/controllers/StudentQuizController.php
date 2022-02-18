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

        $studentQuiz = StudentQuiz::join("users", "student_quizs.student_id", "users.id")
                                  ->join("quizs", "student_quizs.quiz_id", "quizs.id")
                                  ->select("student_quizs.*","users.name as us_name", "quizs.name as q_name")
                                  ->orderBy("student_quizs.id", "desc")
                                  ->limit(10)
                                  ->get();
        return view('student_quiz.index', [
            'studentQuiz' => $studentQuiz,
            'pages' => $pages
        ]);

    }
    public function reset($studentQuizId)
    {
        StudentQuiz::destroy($studentQuizId);
        header('location: ' . BASE_URL . 'studentquiz');
        die;
    }
}
