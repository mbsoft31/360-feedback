<?php


namespace App\Logic\Contracts;


use App\Models\Competency as CompetencyModel;
use Illuminate\Support\Facades\Validator;

class Competencies
{

    public static $rules = [
        "label" => ['required', 'string', 'min:3', "unique:competencies,label"],
    ];

    public static function create(string $competency)
    {
        $data = Validator::make(["label" => $competency], self::$rules)->validate();

        return CompetencyModel::create($data);
    }

    public static function update(\App\Models\Competency $competency, string $label)
    {
        Validator::make(["label" => $label], self::$rules)->validate();

        $competency->label = $label;

        return $competency->save();
    }

    public static function exists(string $competency)
    {
        return CompetencyModel::whereLabel($competency)->exists();
    }

    public static function get(string $competency)
    {
        return CompetencyModel::whereLabel($competency)->first();
    }

    public static function find(int $competency)
    {
        return CompetencyModel::find($competency);
    }
}
