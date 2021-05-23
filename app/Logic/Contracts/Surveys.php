<?php


namespace App\Logic\Contracts;


use App\Models\Survey as SurveyModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Surveys
{
    /*
    public $rules = [
        "text" => [],
        "meta" => ['nullable', 'array'],
    ];
    */

    public function rules()
    {
        return [
            "title" => ['required', 'string', 'min:3'],
            "description" => ['nullable', 'string'],
            "meta" => ['nullable', 'array'],
        ];
    }

    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public function validate(array $data)
    {
        return Validator::make($data, $this->rules())->validate();
    }

    /**
     * @param array  $input user form input
     * @return mixed
     * @throws ValidationException
     */
    public function create(array $input)
    {
        $validated_data = $this->validate($input);

        return SurveyModel::create($validated_data);
    }

    public function update(SurveyModel $survey, array $input)
    {
        $validated_data = $this->validate($input);

        $survey->title = $validated_data['title'];

        if ( isset($validated_data['description']) )
            $survey->description = $validated_data['description'];

        if ( isset($validated_data['meta']) && ( count($validated_data['meta']) > 0 ) )
            $survey->meta = $validated_data['meta'];

        return $survey->save();
    }

    public function delete(SurveyModel $survey)
    {
        return $survey->delete();
    }

    /**
     * @param array $input
     * @throws ValidationException
     */
    public function addQuestion(array $input)
    {
        $validated_data = Validator::make($input, [
            "meta" => ['nullable', 'array'],
            "survey_id" => ['required', 'integer', 'exists:surveys,id'],
            "competency_id" => ['required', 'integer', 'exists:competencies,id'],
            "question_id" => ['required', 'integer', 'exists:questions,id'],
        ])->validate();

        $survey = SurveyModel::find($validated_data["survey_id"]);
        $survey->questions()->attach($validated_data["question_id"],
            ["competency_id" => $validated_data["competency_id"]]);

        return true;
    }

}
