<?php


namespace App\Logic\Contracts;

use App\Logic\Facades\Competencies;
use App\Models\QuestionBank as QuestionBankModel;
use Illuminate\Support\Facades\Validator;

class QuestionBank
{

    public $rules = [
        "text" => ['required', 'string', 'min:3', "unique:question_bank,text"],
        "competency_id" => ['required', 'integer', "exists:competencies,id"],
    ];

    public function create(string $text, string $competency)
    {
        // add a new question
        if ( ! Competencies::exists($competency) ) return null;

        // get competency from database
        $competency = Competencies::get($competency);

        // validate user data
        $data = [
            "text" => $text,
            "competency_id" => $competency->id,
        ];
        $validated_data = Validator::make($data, $this->rules)->validate();

        // create and return the nex question
        return QuestionBankModel::create($validated_data);
    }

    public function update(QuestionBankModel $question, string $text, string $competency)
    {
        // add a new question
        if ( ! Competencies::exists($competency) ) return false;

        // get competency from database
        $competency = Competencies::get($competency);

        // validate user data
        $data = [
            "text" => $text,
            "competency_id" => $competency->id,
        ];
        $validated_data = Validator::make($data, $this->rules)->validate();

        // update and save the question
        $question->text = $validated_data["text"];
        $question->competency_id = $validated_data["competency_id"];

        return $question->save();
    }

    public function exists(string $question_text)
    {
        return QuestionBankModel::whereText($question_text)->exists();
    }

    public function find(int $question_id)
    {
        return QuestionBankModel::find($question_id);
    }

}
