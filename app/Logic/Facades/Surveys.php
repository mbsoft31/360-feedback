<?php


namespace App\Logic\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $data)
 * @method static delete($survey)
 * @method static update($survey, string[] $input)
 * @method static addQuestion($survey, $competency, $question)
 */
class Surveys extends Facade
{

    protected static function getFacadeAccessor() { return 'survey'; }

}
