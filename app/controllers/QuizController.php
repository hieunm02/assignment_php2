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

        $quiz = Quiz::allQuiz($from,$row);
        include_once './app/views/quiz/index.php';
    }

    public function addForm()
    {
        $subjects = Subject::all();
        // echo '<pre>';
        // var_dump($subjects);die;
        include_once './app/views/quiz/add-form.php';
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

        $data = Quiz::findById($quizId);
        include_once "./app/views/quiz/update.php";
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
        $model->update($data);
        header('location: ' . BASE_URL . 'quiz');
        die;
    }

    public function starQuiz($startQuizId)
    {
        $startQuiz = Question::startQuiz($startQuizId);
        $question = Question::all();
        // $allQuestion = Question::all();
        // foreach ($startQuiz as $allQuestion) {

        // $idQuestion = $allQuestion['id'];
        // echo '<pre>';
        // var_dump($idQuestion);die;
        $answer = Answer::answerOfQuestion();
        //         echo '<pre>';
        // var_dump($answer);die;

        // }

        $user = User::all();
        $data = Quiz::findById($startQuizId);
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];
        include_once './app/views/quiz/startQuiz.php';
    }

    public function endQuiz(){
        $modal = new StudentQuiz();
        $user = User::all();
       
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];
        include_once './app/views/quiz/endQuiz.php';
    }
}
