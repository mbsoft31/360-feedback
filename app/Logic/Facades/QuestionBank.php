<?php


namespace App\Logic\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static create(string $string, string $string1)
 * @method static find(int $int)
 * @method static update($question, string $string, $label)
 */
class QuestionBank extends Facade
{
    protected static function getFacadeAccessor() { return 'question_bank'; }
}
