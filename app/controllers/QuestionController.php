<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;

class QuestionController
{
    public function index()
    {
        if(isset($_GET['pages'])){
            $page = $_GET['pages'];
        }else{
            $page = 1;
        }
        $count = Question::count();
        $row = 10;
        $pages = ceil($count / $row);
        $from = ($page - 1) * $row;

        // $question = Question::allQuestion($from,$row);
        $question = Question::join("quizs", "questions.quiz_id", "quizs.id")->select("questions.*", "quizs.name as quiz_name")->orderBy("questions.id", 'desc')->get();
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

    public function remove($questionId)
    {
        Question::destroy($questionId);
        header('location: ' . BASE_URL . 'question');
        die;
    }

    public function update($questionId){
        $quiz = Quiz::all();
        $data = Question::find($questionId);
        include_once './app/views/question/update.php';
    }

    public function savaUpdate(){
        $model = new Question();
        $imgFile = $_FILES['img'];

        $id = $_POST['id'];
        $model = Question::find($id);
        $model->name = $_POST['name']; 
        $model->quiz_id = $_POST['quiz_id']; 
        $model->img = $_POST['img']; 

        if ( empty($_FILES['img']) == false) {
            $filename = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $filename);
            $filename = 'img/' . $filename;
        }

        $model->save();

        header('location: ' . BASE_URL . '/question');
        die;
    }
}
