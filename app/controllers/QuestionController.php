<?php

namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;

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


        $subjects = Subject::all();
        $subjectId = isset($_GET['subject_id']) ? $_GET['subject_id'] : $subjects[0]->id;
        $quiz = Quiz::where('subject_id', $subjectId)->get();
        $quizId = isset($_GET['quiz_id']) ? $_GET['quiz_id'] : $quiz[0]->id;
        $question = Question::where('quiz_id', $quizId)->orderBy('id', 'desc')->get();

        return view('question.index', [
            'quiz' => $quiz,
            'subjects' => $subjects,
            'quizId' => $quizId,
            'question' => $question,
            'pages' => $pages,
            'from' => $from,
            'subjectId' => $subjectId,
        ]);
    }

    public function addForm(){
        $quiz = Quiz::all();
        $question = Question::all();

        return view('question.add-form', [
            'quiz' => $quiz,
            'question' => $question,
        ]);
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
        header('location: ' . $_SERVER['HTTP_REFERER']);
        die;
    }

    public function update($questionId){
        $quiz = Quiz::all();
        $data = Question::find($questionId);
        
        return view('question.update', [
            'quiz' => $quiz,
            'data' => $data,
        ]);
    }

    public function saveUpdate(){
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
