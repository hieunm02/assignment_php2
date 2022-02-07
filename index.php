<?php
session_start();
require_once './app/commons/helpers.php';
require_once './vendor/autoload.php';

use App\Controllers\AnswerController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\QuestionController;
use App\Controllers\QuizController;
use App\Controllers\SubjectController;
use App\Controllers\UserController;
use App\Models\Quiz;
use App\Models\User;

$url = isset($_GET['url']) ? $_GET['url'] : "/";
// $url mong muốn của người gửi request


switch ($url) {
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'login':
        $ctr = new LoginController();
        $ctr->index();
        break;
    case 'login/check-login':
        $ctr = new LoginController();
        $ctr->checkLogin();
        break;
    case 'logout':
        $ctr = new LoginController();
        $ctr->logout();
        break;
    case 'dashboard':
        $ctr = new DashboardController();
        $ctr->index();
        break;
    case 'mon-hoc':
        $ctr = new SubjectController();
        $ctr->index();
        break;
    case 'mon-hoc/tao-moi':
        $ctr = new SubjectController();
        $ctr->addForm();
        break;
    case 'mon-hoc/luu-tao-moi':
        $ctr = new SubjectController();
        $ctr->saveAdd();
        break;
    case 'mon-hoc/cap-nhat':
        $ctr = new SubjectController();
        $ctr->update();
        break;
    case 'mon-hoc/luu-cap-nhat':
        $ctr = new SubjectController();
        $ctr->saveUpdate();
        break;
    case 'mon-hoc/xoa':
        $ctr = new SubjectController();
        $ctr->remove();
        break;
    case 'mon-hoc/chi-tiet':
        $ctr = new SubjectController();
        $ctr->deTail();
        break;
    case 'quiz':
        $ctr = new QuizController();
        $ctr->index();
        break;
    case 'quiz/tao-moi':
        $ctr = new QuizController();
        $ctr->addForm();
        break;
    case 'quiz/luu-tao-moi':
        $ctr = new QuizController();
        $ctr->saveAdd();
        break;
    case 'quiz/cap-nhat':
        $ctr = new QuizController();
        $ctr->update();
        break;
    case 'quiz/luu-cap-nhat':
        $ctr = new QuizController();
        $ctr->saveUpdate();
        break;
    case 'quiz/xoa':
        $ctr = new QuizController();
        $ctr->remove();
        break;
    case 'quiz/lam-bai':
        $ctr = new QuizController();
        $ctr->starQuiz();
        break;
    case 'question':
        $ctr = new QuestionController();
        $ctr->index();
        break;
    case 'question/tao-moi':
        $ctr = new QuestionController();
        $ctr->addForm();
        break;
    case 'question/luu-tao-moi':
        $ctr = new QuestionController();
        $ctr->saveAdd();
        break;
    case 'question/cap-nhat':
        $ctr = new QuestionController();
        $ctr->update();
        break;
    case 'question/luu-cap-nhat':
        $ctr = new QuestionController();
        $ctr->savaUpdate();
        break;
    case 'answer':
        $ctr = new AnswerController();
        $ctr->index();
        break;
    case 'answer/tao-moi':
        $ctr = new AnswerController();
        $ctr->addForm();
        break;
    case 'answer/luu-tao-moi':
        $ctr = new AnswerController();
        $ctr->saveAdd();
        break;
    case 'admin':
        $ctr = new DashboardController();
        $ctr->index();
        break;
    case 'user':
        $ctr = new UserController();
        $ctr->index();
        break;
    case 'user/info':
        $ctr = new UserController();
        $ctr->info();
        break;
    case 'user/tao-moi':
        $ctr = new UserController();
        $ctr->addForm();
        break;
    case 'user/luu-tao-moi':
        $ctr = new UserController();
        $ctr->saveAdd();
        break;
    case 'user/cap-nhat':
        $ctr = new UserController();
        $ctr->update();
        break;
    case 'user/luu-cap-nhat':
        $ctr = new UserController();
        $ctr->saveUpdate();
        break;
        case 'user/profile-edit':
            $ctr = new UserController();
            $ctr->profileEdit();
            break;
    case 'user/xoa':
        $ctr = new UserController();
        $ctr->remove();
        break;
        case 'quiz/result':
            $ctr = new QuizController();
            $ctr->endQuiz();
            break;
    default:
        echo "Đường dẫn bạn đang truy cập chưa được cho phép";
        break;
}
