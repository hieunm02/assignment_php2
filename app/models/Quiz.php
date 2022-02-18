<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Quiz extends Model{
    protected $table = 'quizs';
    public $timestamps = false;
    public function getStudentScore(){
 
        $studenResult = StudentQuiz::where('quiz_id', '=', $this->id)
                        ->where('student_id', '=', $_SESSION['id'])
                        ->orderBy('id', 'desc')
                        ->first();

        if($studenResult != null){
            return $studenResult->score;
        }
        return 0;
    }
}
?>