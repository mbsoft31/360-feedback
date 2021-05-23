<?php


namespace App\Logic\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $input)
 * @method static delete($question)
 */
class Questions extends Facade
{

    protected static function getFacadeAccessor() { return 'question'; }

}
