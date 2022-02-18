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

    //check-login
    $router->filter('check-login', function () {
        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            header('location: ' . BASE_URL . 'login');
            die;
        }
    });

    //alone
        $router->get('/', [HomeController::class, 'index'], ['before' => 'check-login']);
        $router->get('logout', [LoginController::class, 'logout'], ['before' => 'check-login']);
        $router->get('dashboard', [DashboardController::class, 'index'], ['before' => 'check-login']);
        $router->get('admin', [DashboardController::class, 'index'], ['before' => 'check-login']);

    //login
    $router->group(['prefix' => 'login'], function ($router) {
        $router->get('', [LoginController::class, 'index']);
        $router->post('check-login', [LoginController::class, 'checkLogin']);
    });

    //subject
    $router->group(['prefix' => 'mon-hoc', 'before' => 'check-login'], function ($router) {
        $router->get('', [SubjectController::class, 'index']);
        $router->get('tao-moi', [SubjectController::class, 'addForm']);
        $router->get('{subjectId}/chi-tiet/{name}?', [SubjectController::class, 'deTail']);
        $router->post('luu-tao-moi', [SubjectController::class, 'saveAdd']);
        $router->get('/{subjectId}/cap-nhat/{name}?', [SubjectController::class, 'update']);
        $router->post('luu-cap-nhat', [SubjectController::class, 'saveUpdate']);
        $router->get('xoa/{subjectId}', [SubjectController::class, 'remove']);
    });

    //quiz
    $router->group(['prefix' => 'quiz', 'before' => 'check-login'], function ($router) {
        $router->get('', [QuizController::class, 'index']);
        $router->get('tao-moi', [QuizController::class, 'addForm']);
        $router->post('luu-tao-moi', [QuizController::class, 'saveAdd']);
        $router->get('/{quizId}/cap-nhat{name}?', [QuizController::class, 'update']);
        $router->post('luu-cap-nhat', [QuizController::class, 'saveUpdate']);
        $router->get('xoa/{quizId}', [QuizController::class, 'remove']);
        $router->get('{startQuizId}/lam-bai/{name}?', [QuizController::class, 'starQuiz']);
        $router->post('result', [QuizController::class, 'endQuiz']);
    });

    //question
    $router->group(['prefix' => 'question', 'before' => 'check-login'], function ($router) {
        $router->get('', [QuestionController::class, 'index']);
        $router->get('tao-moi', [QuestionController::class, 'addForm']);
        $router->post('luu-tao-moi', [QuestionController::class, 'saveAdd']);
        $router->get('{questionId}/cap-nhat/{name}?', [QuestionController::class, 'update']);
        $router->post('luu-cap-nhat', [QuestionController::class, 'savaUpdate']);
        $router->get('xoa/{questionId}', [QuestionController::class, 'remove']);
    });

    //answer
    $router->group(['prefix' => 'answer', 'before' => 'check-login'], function ($router) {
        $router->get('', [AnswerController::class, 'index']);
        $router->get('tao-moi', [AnswerController::class, 'addForm']);
        $router->post('luu-tao-moi', [AnswerController::class, 'saveAdd']);
    });

    //user
    $router->group(['prefix' => 'user', 'before' => 'check-login'], function ($router) {
        $router->get('', [UserController::class, 'index']);
        $router->get('info', [UserController::class, 'info']);
        $router->get('tao-moi', [UserController::class, 'addForm']);
        $router->post('luu-tao-moi', [UserController::class, 'saveAdd']);
        $router->get('{userId}/cap-nhat/{name}?', [UserController::class, 'update']);
        $router->post('luu-cap-nhat', [UserController::class, 'saveUpdate']);
        $router->post('profile-edit', [UserController::class, 'profileEdit']);
        $router->get('xoa/{userId}', [UserController::class, 'remove']);
    });

    //studentQuiz
    $router->group(['prefix' => 'studentquiz', 'before' => 'check-login'], function ($router) {
        $router->get('', [StudentQuizController::class, 'index']);
        $router->get('reset/{studentQuizId}', [StudentQuizController::class, 'reset']);
    });




    $dispatcher = new Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));

    // Print out the value returned from the dispatched function
    echo $response;
}
