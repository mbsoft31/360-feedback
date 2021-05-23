<?php


namespace App\Logic\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static update($competency, string $string)
 * @method static find(int $int)
 */
class Competencies extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'competency_bank';
    }

}
