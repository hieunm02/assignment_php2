<?php

namespace App\Controllers;

use App\Models\Role;
use App\Models\User;

class UserController
{
    public function info()
    {
        $user = User::all();

        $id = $_SESSION['id'];
        $info = $_SESSION['name'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $avatar = $_SESSION['avatar'];
        $role = $_SESSION['role'];
        if ($_SESSION['avatar'] !== "") {
            $avatar = $_SESSION['avatar'];
        } else {
            $avatar = "avt.jpg";
        }
        include_once './app/views/user/info.php';
    }

    public function index()
    {
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'];
        } else {
            $page = 1;
        }
        $count = user::count();
        $row = 10;
        $pages = ceil($count / $row);
        $from = ($page - 1) * $row;

        $user = User::orderBy('id', 'desc')->limit(10)->get();

        include_once './app/views/user/index.php';
    }

    public function addForm()
    {

        $role = Role::all();
        include_once './app/views/user/add-form.php';
    }

    public function saveAdd()
    {
        $model = new User();
        $imgFile = $_FILES['avatar'];
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'avatar' => $_FILES['avatar']['name'],
            'role_id' => $_POST['role_id'],
        ];

        if (empty($_FILES['avatar']) == false) {
            $fileName = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $fileName);
            $fileName = 'img/' . $fileName;
        }

        $model->image = $fileName;
        $model->insert($data);
        header('location: ' . BASE_URL . 'user');
        die;
    }

    public function remove($userId)
    {
        User::destroy($userId);
        header('location: ' . BASE_URL . 'user');
        die;
    }

    public function update($userId)
    {
        $user = User::find($userId);
        $role = Role::all();

        include_once './app/views/user/update.php';
    }

    public function saveUpdate()
    {
        $model = new User();
        $imgFile = $_FILES['avatar'];

        $id = $_POST['id'];
        $model = User::find($id);
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];
        $model->password = $_POST['password'];
        $model->avatar = $_FILES['avatar']['name'];
        $model->role_id = $_POST['role_id'];

        if (empty($_FILES['avatar']) == false) {
            $fileName = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $fileName);
            $fileName = 'img/' . $fileName;
        }

        $model->save();
        header('location: ' . BASE_URL . 'user');
        die;
    }

    // cập nhật tài khoản phía người dùng
    public function profileEdit()
    {
        $model = new User();
        $imgFile = $_FILES['avatar'];
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'password' => md5($_POST['password']),
            'avatar' => $_FILES['avatar']['name'],
        ];

        if (empty($_FILES['avatar']) == false) {
            $fileName = $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], 'app/img/' . $fileName);
            $fileName = 'img/' . $fileName;
        }

        $model->image = $fileName;
        $model->update($data);
        header('location: ' . BASE_URL . '/user/info');
        die;
    }
}
