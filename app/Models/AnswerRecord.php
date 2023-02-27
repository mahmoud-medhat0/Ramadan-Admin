<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerRecord extends Model
{
    use HasFactory;
    public function Answers()
    {
        return $this->hasMany(Answer::class,'answer_rec_id','id');
    }
}
