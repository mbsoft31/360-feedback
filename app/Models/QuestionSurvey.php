<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSurvey extends Model
{
    use HasFactory;

    protected $table = "question_survey";

    protected $casts = [
        "meta" => "array"
    ];

    protected $with = ['question', 'competency'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

}
