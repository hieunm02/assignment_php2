<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;

class AnswerController
{
    public function index()
    {
        if(isset($_GET['pages'])){
            $page = $_GET['pages'];
        }else{
            $page = 1;
        }
        $count = Answer::count();
        $row = 10;
        $pages = ceil($count / $row);
        $from = ($page - 1) * $row;
        // $answer = Answer::orderBy('id', 'desc')->limit($from,$row)->fetch();
        // $answer = Answer::join("questions", "answers.question_id" , "questions.id")->select("answers.*", "questions.name as qs_name")->orderBy('id', 'desc')->limit(10)->get();
        $id = $_GET['question_id'];
        $answer = Answer::where('question_id' , '=', $id)->orderBy('id', 'desc')->limit(10)->get();
        return view('answer.index', [
            'count' => $count,
            'row' => $row,
            'pages' => $pages,
            'from' => $from,
            'answer' => $answer,
        ]);
    }

    public function addForm()
    {
        $question = Question::all();
        
        return view('answer.add-form', [
            'question' => $question,
        ]);
    }
    public function saveAdd()
    {
        $model = new Answer();

        $imgFile = $_FILES['img'];
        $data = [
            'content' => $_POST['content'],
            'question_id' => $_POST['question_id'],
            'is_correct' => $_POST['is_correct'],
            'img' => $_FILES['img']['name'],
        ];

        if (empty($_FILES['img']) == false) {
            $fileName = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $fileName);
            $fileName = 'img/' . $fileName;
        }

        $model->image = $fileName;
        $model->insert($data);


        header('location:javascript://history.go(-1)');
        die;
    }

    public function update($answerId){
        $data = Answer::find($answerId);
        
        return view('answer.update', [
            'data' => $data
        ]);
    }

    
    public function saveUpdate(){
        $model = new Answer();
        $imgFile = $_FILES['img'];

        $id = $_POST['id'];
        $model = Answer::find($id);
        $model->content = $_POST['content']; 
        $model->is_correct = $_POST['is_correct']; 
        $model->img = $_FILES['img']['name']; 

        if ( empty($_FILES['img']) == false) {
            $filename = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $filename);
            $filename = 'img/' . $filename;
        }

        $model->save();
        header('location:javascript://history.go(-1)');
        die;
    }

    public function remove($answerId){
        Answer::destroy($answerId);
        header('location: ' . $_SERVER['HTTP_REFERER']);
        die;
    }
}
