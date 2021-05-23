<?php


namespace App\Helpers;


use App\Models\Question;
use App\Models\QuestionBank;
use App\Models\Survey;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Throwable;

class SurveyWizard
{

    protected Survey $survey;
    protected Collection $questions;

    /**
     * @param Survey $survey
     * @return $this
     */
    public function setSurvey(Survey $survey)
    {
        $this->survey = $survey;
        $this->questions = collect();
        return $this;
    }

    /**
     * @param int $question_bank_id
     * @param array $args
     * @return $this
     * @throws Throwable
     */
    public function addQuestionFromBank(int $question_bank_id, array $args)
    {
        throw_if(! QuestionBank::where('id', $question_bank_id)->exists(),
            new Exception("Question with id=$question_bank_id doesn't exist"));

        $question = QuestionBank::find($question_bank_id);
        $this->questions->add([
            "question" => [
                "text" => $question->text,
                "type" => $args["type"],
                "meta" => Arr::except($args, ['type']),
            ],
            "competency_id" => $question->competency_id,
        ]);
        return $this;
    }

    /**
     * @return $this
     */
    public function commit()
    {
        foreach ($this->questions as $question)
        {
            $model = Question::create($question['question']);
            $this->survey->questions()->save($model, [
                "competency_id" => $question['competency_id']
            ]);
        }
        $this->questions = collect();
        return $this;
    }

    private static ?SurveyWizard $instance = null;

    private function __construct() {}

    /**
     * @return SurveyWizard
     */
    public static function getInstance()
    {
        if ( ! is_null(self::$instance) )
            return self::$instance;
        return self::$instance = new SurveyWizard();
    }
}
