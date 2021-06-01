<?php


namespace Tests\Feature\Logic\Facades;


use App\Logic\Facades\Competencies;
use App\Logic\Facades\Questions;
use App\Logic\Facades\Surveys;
use App\Models\Survey as SurveyModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyTest extends TestCase
{

    use RefreshDatabase;

    public function test_create_survey()
    {
        $input = [
            "title" => 'new survey',
            "description" => 'mcq',
            "meta" => [],
        ];
        $survey = Surveys::create($input);

        self::assertTrue(SurveyModel::whereTitle($input['title'])->whereDescription($input['description'])->exists());
    }

    public function test_update_survey()
    {
        $data = [
            "title" => 'new survey',
            "description" => 'mcq',
            "meta" => [],
        ];
        $survey = Surveys::create($data);

        $input = [
            "title" => 'updated text',
            "description" => 'scq',
            // "meta" => [],
        ];
        $saved = Surveys::update($survey, $input);

        self::assertTrue($saved);
        self::assertFalse(SurveyModel::whereTitle('new survey')->whereDescription('mcq')->exists());
        self::assertTrue(SurveyModel::whereTitle('updated text')->whereDescription('scq')->exists());
    }

    public function test_delete_survey()
    {
        $data = [
            "title" => 'new survey',
            "description" => 'mcq',
            "meta" => [],
        ];
        $survey = Surveys::create($data);

        $deleted = Surveys::delete($survey);

        self::assertTrue($deleted);
        self::assertFalse(SurveyModel::whereTitle('new survey')->whereDescription('mcq')->exists());
    }

    public function test_add_question_to_survey()
    {
        $survey = Surveys::create([
            "title" => 'new survey',
            "description" => 'mcq',
            "meta" => [],
        ]);
        $competency = Competencies::create("Accountability 1");
        $question = Questions::create([
            "text" => 'new question',
            "type" => 'mcq',
            "meta" => [],
        ]);

        $input = [
            "meta" => [],
            "survey_id" => $survey->id,
            "competency_id" => $competency->id,
            "question_id" => $question->id,
        ];

        Surveys::addQuestion($input);

        self::assertEquals(1, $survey->questions()->count());
        self::assertEquals(1, $survey->competencies()->count());
    }

}
