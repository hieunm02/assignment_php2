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
        $answer = Answer::join("questions", "answers.question_id" , "questions.id")->select("answers.*", "questions.name as qs_name")->orderBy('id', 'desc')->limit(10)->get();
        
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

        // Đáp án 1
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

        // Đáp án 2
        $imgFile2 = $_FILES['img2'];
        $data2 = [
            'content' => $_POST['content2'],
            'question_id' => $_POST['question_id'],
            'is_correct' => $_POST['is_correct2'],
            'img' => $_FILES['img2']['name'],
        ];

        if (empty($_FILES['img2']) == false) {
            $fileName2 = $imgFile2['name'];
            move_uploaded_file($imgFile2['tmp_name'], 'app/img/' . $fileName2);
            $fileName2 = 'img/' . $fileName2;
        }

        $model->image = $fileName2;
        $model->insert($data2);

        // Đáp án 3
        $imgFile3 = $_FILES['img3'];
        $data3 = [
            'content' => $_POST['content3'],
            'question_id' => $_POST['question_id'],
            'is_correct' => $_POST['is_correct3'],
            'img' => $_FILES['img3']['name'],
        ];

        if (empty($_FILES['img3']) == false) {
            $fileName3 = $imgFile3['name'];
            move_uploaded_file($imgFile3['tmp_name'], 'app/img/' . $fileName3);
            $fileName3 = 'img/' . $fileName3;
        }

        $model->image = $fileName3;
        $model->insert($data3);

        // Đáp án 4
        $imgFile4 = $_FILES['img4'];
        $data4 = [
            'content' => $_POST['content4'],
            'question_id' => $_POST['question_id'],
            'is_correct' => $_POST['is_correct4'],
            'img' => $_FILES['img4']['name'],
        ];

        if (empty($_FILES['img4']) == false) {
            $fileName4 = $imgFile4['name'];
            move_uploaded_file($imgFile4['tmp_name'], 'app/img/' . $fileName4);
            $fileName4 = 'img/' . $fileName4;
        }

        $model->image = $fileName4;
        $model->insert($data4);

        header('location: ' . BASE_URL . 'answer');
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

        header('location: ' . BASE_URL . '/answer');
        die;
    }

    public function remove($answerId){
        Answer::destroy($answerId);
        header('location: ' . BASE_URL . '/answer');
        die;
    }
}
