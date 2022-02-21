<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Models\User;

class SubjectController{
    public function index(){
        if(isset($_GET['pages'])){
            $page = $_GET['pages'];
        }else{
            $page = 1;
        }
        $count = Subject::count();
        $row = 10;
        $pages = ceil($count / $row);
        $from = ($page - 1) * $row;

        // $subjects = Subject::orderBy('id', 'desc')->limit($from, $row)->get();
        $subjects = Subject::orderBy('id', 'desc')->limit(10)->get();


        return view('mon-hoc.index', [
            'subjects' => $subjects,
            'pages' => $pages
        ]);
    }

    public function addForm(){
        return view('mon-hoc.add-form', []);
    }

    public function saveAdd(){
        $model = new Subject();
        $imgFile = $_FILES['avatar'];
        $data = [
            'name' => $_POST['name'],
            'avatar' => $_FILES['avatar']['name']
        ];
        if ( empty($_FILES['avatar']) == false) {
            $filename = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $filename);
            $filename = 'img/' . $filename;
        }

        $model->image = $filename;
        $model->insert($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function remove($subjectId){
        Subject::destroy($subjectId);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function update($subjectId, $name){
        $data = Subject::find($subjectId);
        
        return view('mon-hoc.update', [
            'data' => $data
        ]);

    }

    public function saveUpdate(){
        $model = new Subject();
        $imgFile = $_FILES['avatar'];      
        $id = $_POST['id'];
        $model = Subject::find($id);
        $model->name = $_POST['name'];
        $model->avatar = $_FILES['avatar']['name'];
        if ( empty($_FILES['avatar']) == false) {
            $filename = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $filename);
            $filename = 'img/' . $filename;
        }

        $model->save();
        header('location: ' . BASE_URL . 'mon-hoc');
        die;

    }

    public function deTail($subjectId, $name){
        $data = Subject::find($subjectId);
        $quiz = Quiz::where("subject_id", '=', $subjectId)->get();
        $user = User::all();
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];

        return view('mon-hoc.detail', [
            'data' => $data,
            'quiz' => $quiz,
            'user' => $user,
            'role' => $role,
            'info' => $info,
        ]);
    }
}
?>