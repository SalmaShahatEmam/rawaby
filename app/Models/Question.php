<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    protected $fillable = ['question_ar' , 'question_en' , 'answer_ar' , 'answer_en' , "category"];

    public function getQuestionAttribute()
    {
        return $this->attributes['question_' . app()->getLocale()];
    }

    public function getAnswerAttribute()
    {
        return $this->attributes['answer_' . app()->getLocale()];
    }
}
