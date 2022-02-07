<?php

namespace App\Controllers;

use App\Models\Question;
use App\Models\Quiz;

class QuestionController
{
    public function index()
    {
        //chưa đăng nhập thì trả về trang đăng nhập

        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('location: http://localhost/WEB3014/asm1/login');
            die;
        }
        $question = Question::allQuestion();
        include_once './app/views/question/index.php';
    }

    public function addForm(){
        $quiz = Quiz::all();
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
        // echo "<pre>";
        // var_dump($_FILES['img']['name']);die;
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
