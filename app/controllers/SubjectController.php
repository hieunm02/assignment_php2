<?php
namespace App\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Models\User;

class SubjectController{
    public function index(){
        //chưa đăng nhập thì trả về trang đăng nhập
        if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
            header('location: '. BASE_URL . 'login');
            die;
        }
        $subjects = Subject::all();


        include_once "./app/views/mon-hoc/index.php";
    }

    public function addForm(){
        include_once "./app/views/mon-hoc/add-form.php";
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

    public function remove(){
        $id = $_GET['id'];
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function update(){
        $id = $_GET['id'];
        $data = Subject::findById($id);
        include_once "./app/views/mon-hoc/update.php";

    }

    public function saveUpdate(){
        $model = new Subject();
        $imgFile = $_FILES['avatar'];
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'avatar' => $_FILES['avatar']['name']
        ];
        if ( empty($_FILES['avatar']) == false) {
            $filename = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $filename);
            $filename = 'img/' . $filename;
        }
        $model->update($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;

    }

    public function deTail(){
        $id = $_GET['id'];
        $data = Subject::findById($id);
        $quiz = Quiz::where(["subject_id", '=', $id])->get();
        $user = User::all();
        $role = $_SESSION['role'];
        $info = $_SESSION['name'];

// var_dump();die;
        include_once "./app/views/mon-hoc/detail.php";
    }
}
?>