<?php

namespace App\Controllers;

use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\User;

class DashboardController
{
    public function dashboard()
    {
        $user = User::all();
        $quiz = Quiz::all();
        $studentquiz = StudentQuiz::all();
        return view('dashboard.index', [
            'user' => $user,
            'quiz' => $quiz,
            'studentquiz' => $studentquiz,
        ]);
    }
}
