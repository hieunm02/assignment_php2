<?php

use App\Controllers\AnswerController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\QuestionController;
use App\Controllers\QuizController;
use App\Controllers\StudentQuizController;
use App\Controllers\SubjectController;
use App\Controllers\UserController;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

function applyRouting($url)
{

    $router = new RouteCollector();

    // $router->get('/', function(){
    //     return "home page";
    // });

    $router->get('/', [HomeController::class , 'index']);
    $router->get('login/', [LoginController::class , 'index']);
    $router->get('login/check-login', [LoginController::class , 'checkLogin']);
    $router->get('logout', [LoginController::class , 'logout']);
    $router->get('dashboard', [DashboardController::class , 'index']);
    $router->get('mon-hoc', [SubjectController::class , 'index']);
    $router->get('mon-hoc/tao-moi', [SubjectController::class , 'addForm']);
    $router->get('mon-hoc/chi-tiet', [SubjectController::class , 'deTail']);
    $router->get('mon-hoc/luu-tao-moi', [SubjectController::class , 'saveAdd']);
    $router->get('mon-hoc/cap-nhat', [SubjectController::class , 'update']);
    $router->get('mon-hoc/luu-cap-nhat', [SubjectController::class , 'saveUpdate']);
    $router->get('mon-hoc/xoa', [SubjectController::class , 'remove']);
    $router->get('quiz', [QuizController::class , 'index']);
    $router->get('quiz/tao-moi', [QuizController::class , 'addForm']);
    $router->get('quiz/luu-tao-moi', [QuizController::class , 'saveAdd']);
    $router->get('quiz/cap-nhat', [QuizController::class , 'update']);
    $router->get('quiz/luu-cap-nhat', [QuizController::class , 'saveUpdate']);
    $router->get('quiz/xoa', [QuizController::class , 'remove']);
    $router->get('quiz/lam-bai', [QuizController::class , 'starQuiz']);
    $router->get('question', [QuestionController::class , 'index']);
    $router->get('question/tao-moi', [QuestionController::class , 'addForm']);
    $router->get('question/luu-tao-moi', [QuestionController::class , 'saveAdd']);
    $router->get('question/cap-nhat', [QuestionController::class , 'question/cap-nhat']);
    $router->get('question/luu-cap-nhat', [QuestionController::class , 'savaUpdate']);
    $router->get('question/xoa', [QuestionController::class , 'remove']);
    $router->get('answer', [AnswerController::class , 'index']);
    $router->get('answer/tao-moi', [AnswerController::class , 'addForm']);
    $router->get('answer/luu-tao-moi', [AnswerController::class , 'saveAdd']);
    $router->get('admin', [DashboardController::class , 'index']);
    $router->get('user', [UserController::class , 'index']);
    $router->get('user/info', [UserController::class , 'info']);
    $router->get('user/tao-moi', [UserController::class , 'addForm']);
    $router->get('user/luu-tao-moi', [UserController::class , 'saveAdd']);
    $router->get('user/cap-nhat', [UserController::class , 'update']);
    $router->get('user/profile-edit', [UserController::class , 'profileEdit']);
    $router->get('user/xoa', [UserController::class , 'remove']);
    $router->post('quiz/result', [QuizController::class , 'endQuiz']);
    $router->get('studentquiz', [StudentQuizController::class , 'index']);
    $router->get('studentquiz/reset', [StudentQuizController::class , 'reset']);


    $dispatcher = new Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));

    // Print out the value returned from the dispatched function
    echo $response;
}
