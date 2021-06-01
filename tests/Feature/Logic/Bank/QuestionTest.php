<?php


namespace Logic\Bank;


use App\Helpers\DataHelper;
use App\Logic\Facades\QuestionBank;
use App\Logic\Facades\Competencies;
use App\Models\Competency;
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

    public function test_bank_create_competency()
    {
        Competencies::create('Accountability 1');

        $this->assertTrue(Competency::whereLabel('Accountability 1')->exists());
    }

    private function test_bank_update_competency()
    {
        $competency = Competency::whereLabel('Accountability')->first();

        $saved = Competencies::update($competency, 'Accountability 1');

        $this->assertTrue($saved);
        $this->assertFalse(Competency::whereLabel('Accountability')->exists());
        $this->assertTrue(Competency::whereLabel('Accountability 1')->exists());
    }

    private function test_bank_create_question()
    {
        $question = QuestionBank::create('new question', 'Accountability');

        $this->assertTrue(Question::whereText('new question')->exists());
    }

    public function test_bank_update_question()
    {
        $question = QuestionBank::find(1);
        $competency = $question->competency;
        $new_competency = Competency::find(2);

        $saved = QuestionBank::update($question, "new question text 1", $new_competency->label);
        $question->fresh();

        $this->assertTrue($saved);
        $this->assertEquals(2, $new_competency->id);
        $this->assertTrue(Question::whereText('new question text 1')->exists());
    }

}
