<?php
    namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;

class AnswerController{
        public function index(){
                    //chưa đăng nhập thì trả về trang đăng nhập
        if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
            header('location: http://localhost/WEB3014/asm1/login');
            die;
        }
        $answer = Answer::all();
            include_once './app/views/answer/index.php';
        }

        public function addForm(){
            $question = Question::all();
            include_once './app/views/answer/add-form.php';
        }
        public function saveAdd(){
            $model = new Answer();
            $imgFile = $_FILES['img'];

            $data = [
                'content' => $_POST['content'],
                'question_id' => $_POST['question_id'],
                'is_correct' => $_POST['is_correct'],
                'img' => $_FILES['img']['name'],
            ];

            if(empty($_FILES['img']) == false){
                $fileName = $imgFile['name'];
                move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $fileName);
                $fileName = 'img/' . $fileName;
            } 
            
            $model->image = $fileName;
            $model->insert($data);
            header('location: ' . BASE_URL . 'answer');
            die;
        }
    }

?>