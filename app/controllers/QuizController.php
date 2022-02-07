<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\subject;
use App\Models\User;

class QuizController
{
    public function index()
    {
        //chưa đăng nhập thì trả về trang đăng nhập

        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('location: http://localhost/WEB3014/asm1/login');
            die;
        }

        $quiz = Quiz::allQuiz();
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

    public function remove()
    {
        $id = $_GET['id'];
        Quiz::destroy($id);
        header('location: ' . BASE_URL . 'quiz');
        die;
    }

    public function update()
    {
        $id = $_GET['id'];
        $subjects = Subject::all();

        $data = Quiz::findById($id);
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

    public function starQuiz()
    {
        $id = $_GET['id'];
        $startQuiz = Question::startQuiz($id);
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
        $data = Quiz::findById($id);
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];
        include_once './app/views/quiz/startQuiz.php';
    }

    public function endQuiz(){
        $user = User::all();
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];
        include_once './app/views/quiz/endQuiz.php';
    }
}
