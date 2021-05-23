<?php


namespace App\Logic\Contracts;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Question as QuestionModel;
use Illuminate\Validation\ValidationException;

class Questions
{

    public const TYPES = ['mcq', 'scq', 'scale'];

    /*
    public $rules = [
        "text" => [],
        "meta" => ['nullable', 'array'],
    ];
    */

    public function rules()
    {
        return [
            "text" => ['required', 'string', 'min:3'],
            "type" => ['required', Rule::in(self::TYPES)],
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
        $validator = Validator::make($data, $this->rules());
        /*$errors = $validator->errors();

        dd($errors);*/
        return $validator->validate();
    }

    /**
     * @param array  $input user form input
     * @return mixed
     * @throws ValidationException
     */
    public function create(array $input)
    {
        $validated_data = $this->validate($input);


        return QuestionModel::create($validated_data);
    }

    public function update(QuestionModel $question, array $input)
    {
        $validated_data = $this->validate($input);

        $question->text = $validated_data['text'];
        $question->type = $validated_data['type'];

        if ( isset($validated_data['meta']) && ( count($validated_data['meta']) > 0 ) )
            $question->meta = $validated_data['meta'];

        return $question->save();
    }

    public function delete(QuestionModel $question)
    {
        return $question->delete();
    }

}
