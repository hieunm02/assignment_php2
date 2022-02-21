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

        // $quiz = Quiz::allQuiz($from,$row);
        $quiz = Quiz::join("subjects", "quizs.subject_id", "=", "subjects.id")
                      ->select('quizs.*', 'subjects.name as sub_name')
                      ->orderby("quizs.id", 'desc')
                      ->get();

        
        return view('quiz.index', [
            'count' => $count,
            'pages' => $pages,
            'from' => $from,
            'quiz' => $quiz,
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
        header('location: ' . BASE_URL . 'quiz');
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
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'subject_id' => $_POST['subject_id'],
            'duration_minutes' => $_POST['duration_minutes'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'status' => $_POST['status'],
            'is_shuffle' => $_POST['is_shuffle'],
        ];
        $id = $_POST['id'];

        $model->id = Quiz::find($id);
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
        // $allQuestion = Question::all();
        // foreach ($startQuiz as $allQuestion) {

        // $idQuestion = $allQuestion['id'];
        // echo '<pre>';
        // var_dump($idQuestion);die;
        $answer = Answer::join('questions', 'answers.question_id', '=', 'questions.id')->get();
        //         echo '<pre>';
        // var_dump($answer);die;

        // }

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
        
        return view('quiz.endQuiz', [
            'modal' => $modal,
            'user' => $user,
            'role' => $role,
            'info' => $info,
        ]);
    }
}
