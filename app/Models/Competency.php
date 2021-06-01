<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($competency)
 * @method static whereLabel($competency)
 * @method static find(int $int)
 */
class Competency extends Model
{

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(QuestionBank::class, 'competency_id', 'id');
    }

    public function survey_questions()
    {
        return $this->belongsToMany(Question::class, 'question_survey')->distinct();
    }

}
