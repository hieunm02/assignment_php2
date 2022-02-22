<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\subject;
use App\Models\User;

class QuizController
{
    public function index()
    {
        if(isset($_GET['pages'])){
            $page = $_GET['pages'];
        }else{
            $page = 1;
        }
        $count = Quiz::count();
        $row = 10;
        $pages = ceil($count / $row);
        $from = ($page - 1) * $row;


        $subjects = Subject::all();
        $subjectId = isset($_GET['subject_id']) ? $_GET['subject_id'] : $subjects[0]->id;
        $quizs = Quiz::where('subject_id', $subjectId)->orderBy('id', 'desc')->get();

        return view('quiz.index', [
            'subjects' => $subjects,
            'subjectId' => $subjectId,
            'quizs' => $quizs,
            'pages' => $pages,
            'from' => $from,
        ]);
    }

    public function addForm()
    {
        $subjects = Subject::all();

        return view('quiz.add-form', [
            'subjects' => $subjects,
        ]);
    }

    public function saveAdd()
    {
        $model = new Quiz;
        $id = $_GET['id'];
        $data = [
            'name' => $_POST['name'],
            'subject_id' => $_POST['subject_id'],
            'duration_minutes' => $_POST['duration_minutes'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'status' => $_POST['status'],
            'is_shuffle' => $_POST['is_shuffle'],
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'quiz');
        die;
    }

    public function remove($quizId)
    {
        Quiz::destroy($quizId);
        header('location: ' .  $_SERVER['HTTP_REFERER']);
        die;
    }

    public function update($quizId)
    {
        $subjects = Subject::all();

        $data = Quiz::find($quizId);
        
        return view('quiz.update', [
            'subjects' => $subjects,
            'data' => $data,
        ]);
    }

    public function saveUpdate()
    {
        $model = new Quiz();
        $id = $_POST['id'];

        $model = Quiz::find($id);
        $model->name = $_POST['name'];
        $model->subject_id = $_POST['subject_id'];
        $model->duration_minutes = $_POST['duration_minutes'];
        $model->start_time = $_POST['start_time'];
        $model->end_time = $_POST['end_time'];
        $model->status = $_POST['status'];
        $model->is_shuffle = $_POST['is_shuffle'];

        $model->save();
        header('location: ' . BASE_URL . 'quiz');
        die;
    }

    public function starQuiz($startQuizId)
    {
        $startQuiz = Question::where('quiz_id', '=', $startQuizId)->get();
        $question = Question::all();
        
        $answer = Answer::join('questions', 'answers.question_id', '=', 'questions.id')->get();

        $user = User::all();
        $data = Quiz::find($startQuizId);
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];
        
        
        return view('quiz.startQuiz', [
            'startQuiz' => $startQuiz,
            'question' => $question,
            'answer' => $answer,
            'user' => $user,
            'data' => $data,
            'role' => $role,
            'info' => $info,
        ]);
    }

    public function endQuiz(){

        $modal = new StudentQuiz();
        $user = User::all();
       
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];
        
        $score = 0;
        foreach($_POST['questionId'] as $questionId):
            $studentId = $_POST['studentId'];
            $quizId = $_POST['quizId'];

            $answer = Answer::where('question_id', '=', $questionId)->where('is_correct', '=', 2)->get();
            if ($_POST['question_' . $questionId] == 2) {
                $score++;
            }

        endforeach ;

        return view('quiz.endQuiz', [
            'modal' => $modal,
            'user' => $user,
            'role' => $role,
            'info' => $info,
            'studentId' => $studentId,
            'quizId' => $quizId,
            'answer' => $answer,
            'score' => $score,
        ]);
    }
}
