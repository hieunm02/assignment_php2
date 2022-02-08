<?php
namespace App\Models;
class Quiz extends BaseModel{
    protected $tableName = 'quizs';
    public function getStudentScore(){
 
        $studenResult = StudentQuiz::where(['quiz_id', '=', $this->id])
                        ->andWhere(['student_id', '=', $_SESSION['id']])
                        ->orderBy('id', false)
                        ->first();

        if($studenResult != null){
            return $studenResult->score;
        }
        return 0;
    }
}
?>