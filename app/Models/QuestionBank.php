<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $key, mixed $value)
 * @method static find(int $id)
 * @method static create(array $array)
 * @method static whereText(string $string)
 */
class QuestionBank extends Model
{

    protected $table = "question_bank";
    protected $guarded = [];

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

}
