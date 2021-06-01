<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAttempt extends Model
{
    use HasFactory;

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function attemptOn()
    {
        return $this->belongsTo(User::class, 'attempt_on', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
