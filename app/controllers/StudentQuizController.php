<?php

namespace App\Controllers;

use App\Models\Quiz;
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


        $quiz = Quiz::all();
        $quizId = isset($_GET['quiz_id']) ? $_GET['quiz_id'] : $quiz[0]->id;
        $studentQuiz = StudentQuiz::where('quiz_id', $quizId)->join("users", "student_quizs.student_id", "users.id")
        ->select("student_quizs.*", "users.name as us_name")
        ->orderBy("student_quizs.id", "desc")
        ->limit(10)
        ->get();

        return view('student_quiz.index', [
            'studentQuiz' => $studentQuiz,
            'quiz' => $quiz,
            'quizId' => $quizId,
            'pages' => $pages,
            'from' => $from,
        ]);
    }
    public function reset($studentQuizId)
    {
        StudentQuiz::destroy($studentQuizId);
        header('location: ' . BASE_URL . 'studentquiz');
        die;
    }
}
