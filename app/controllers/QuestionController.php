<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;

class QuestionController
{
    public function index()
    {
        //chưa đăng nhập thì trả về trang đăng nhập

        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('location: '. BASE_URL . 'login');
            die;
        }

        if(isset($_GET['pages'])){
            $page = $_GET['pages'];
        }else{
            $page = 1;
        }
        $count = Question::count();
        $row = 10;
        $pages = ceil($count / $row);
        $from = ($page - 1) * $row;

        $question = Question::allQuestion($from,$row);
        include_once './app/views/question/index.php';
    }

    public function addForm(){
        $quiz = Quiz::all();
        $question = Question::all();

        include_once './app/views/question/add-form.php';
    }

    public function saveAdd(){
        $model = new Question();
        $imgFile = $_FILES['img'];
        $data = [
            'name' => $_POST['name'],
            'quiz_id' => $_POST['quiz_id'],
            'img' => $_FILES['img']['name']
        ];
        if ( empty($_FILES['img']) == false) {
            $filename = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $filename);
            $filename = 'img/' . $filename;
        }

        $model->image = $filename;
        $model->insert($data);

        header('location: ' . BASE_URL . 'question');
        die;
    }


    public function update(){
        $id = $_GET['id'];
        $quiz = Quiz::all();
        $data = Question::findById($id);
        include_once './app/views/question/update.php';
    }

    public function savaUpdate(){
        $model = new Question();
        $imgFile = $_FILES['img'];
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'quiz_id' => $_POST['quiz_id'],
            'img' => $_FILES['img']['name'],
        ];
        if ( empty($_FILES['img']) == false) {
            $filename = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $filename);
            $filename = 'img/' . $filename;
        }
        $model->update($data);
        header('location: ' . BASE_URL . '/question');
        die;
    }
}
