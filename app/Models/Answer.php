<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    public function Questions()
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }
    public function AnswerRecord()
    {
        return $this->belongsTo(Answer::class);
    }
}
