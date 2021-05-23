<?php


namespace App\Logic\Facades;


use Illuminate\Support\Facades\Facade;

class QuestionBank extends Facade
{
    protected static function getFacadeAccessor() { return 'question_bank'; }
}
