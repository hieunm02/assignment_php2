<?php
namespace App\Models;
class Quiz extends BaseModel{
    protected $tableName = 'quizs';
    public function getStudentScore(){
        $studentQuiz = StudentQuiz::all(); 
        foreach($studentQuiz as $s){
            $_SESSION['studentQuiz'] = $s->id;
        }

        $studenResult = StudentQuiz::where(['quiz_id', '=', $this->id])
                        ->andWhere(['student_id', '=', $_SESSION['id']])
                        ->orderBy($_SESSION['studentQuiz'])
                        ->first();
        if($studenResult != null){
            return $studenResult->score;
        }
        return 0;
    }
}
?>