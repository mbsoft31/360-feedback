<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @method static whereTitle(string $string)
 * @method static create(array $inputs)
 */
class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "meta" => "array"
    ];

    protected $with = ['items'];

    public function items()
    {
        return $this->hasMany(QuestionSurvey::class)
            ->select(['question_survey.*'])
            ->orderBy('competency_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function competencies()
    {
        return $this->belongsToMany(Competency::class, 'question_survey');
    }

}
