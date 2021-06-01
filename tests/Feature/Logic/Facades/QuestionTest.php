<?php


namespace Tests\Feature\Logic\Facades;


use App\Helpers\DataHelper;
use App\Logic\Facades\Questions as QuestionFacade;
use App\Models\Competency;
use App\Models\Question as QuestionModel;
use App\Models\QuestionBank as Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $dataHelper = DataHelper::getInstance();

        foreach ($dataHelper->getCompetencies() as $competency)
        {
            Competency::create(
                $competency
            );
        }

        foreach ($dataHelper->getQuestions() as $question)
        {
            $competency = Competency::whereLabel($question['competency'])->first();

            Question::create(
                collect($question)
                    ->except( [ 'competency' ] )
                    ->merge(  [ 'competency_id' => $competency->id ] )
                    ->toArray(  )
            );
        }
    }

    public function test_create_question()
    {
        $input = [
            "text" => 'new question',
            "type" => 'mcq',
            "meta" => [],
        ];
        $question = QuestionFacade::create($input);

        self::assertTrue(QuestionModel::whereText($input['text'])->whereType($input['type'])->exists());
    }

    public function test_update_question()
    {
        $data = [
            "text" => 'new question',
            "type" => 'mcq',
            "meta" => [],
        ];
        $question = QuestionFacade::create($data);

        $input = [
            "text" => 'updated text',
            "type" => 'scq',
            // "meta" => [],
        ];
        $saved = QuestionFacade::update($question, $input);

        self::assertTrue($saved);
        self::assertFalse(QuestionModel::whereText('new question')->whereType('mcq')->exists());
        self::assertTrue(QuestionModel::whereText('updated text')->whereType('scq')->exists());
    }

    public function test_delete_question()
    {
        $data = [
            "text" => 'new question',
            "type" => 'mcq',
            "meta" => [],
        ];
        $question = QuestionFacade::create($data);

        $deleted = QuestionFacade::delete($question);

        self::assertTrue($deleted);
        self::assertFalse(QuestionModel::whereText('new question')->whereType('mcq')->exists());
    }

}
