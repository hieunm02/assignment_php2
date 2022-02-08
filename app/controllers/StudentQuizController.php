<?php
    namespace App\Controllers;

    use App\Models\StudentQuiz;

    class StudentQuizController
    {
        public function index(){
            $studentQuiz = StudentQuiz::studentQuiz();
            include_once './app/views/student_quiz/index.php';
        }
        public function reset(){
            $id = $_GET['id'];
            StudentQuiz::destroy($id);
            header('location: ' . BASE_URL . 'studentquiz');
            die;
        }
    }
?>