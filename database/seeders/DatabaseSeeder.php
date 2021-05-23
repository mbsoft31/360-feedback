<?php

namespace Database\Seeders;

use App\Helpers\DataHelper;
use App\Logic\Facades\Questions;
use App\Logic\Facades\Surveys;
use App\Models\Competency;
use App\Models\QuestionBank;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name" => "admin",
            "email" => "admin@mail.com",
            "password" => Hash::make("admin1234"),
        ]);

        $dataHelper = DataHelper::getInstance();

        foreach ($dataHelper->getCompetencies() as $competency)
        {
            Competency::create($competency);
        }

        foreach ($dataHelper->getQuestions() as $question)
        {
            $competency = Competency::whereLabel($question['competency'])->first();

            /*$question_bank_item = QuestionBank::create(
                collect($question)
                    ->except( ['competency'] )
                    ->merge(['competency_id' => $competency->id])
                    ->toArray()
            );*/
        }

        /**
         * TODO: fix/figure out score types
         * SEE:
         *  - https://blog.quizizz.com/quiz-settings-11e78e4a5589
         *  - https://help.tryinteract.com/en/articles/3117588-how-to-configure-quiz-scoring-and-scoring-ranges
         *  - https://quiz.proprofs.com/how-do-the-different-kinds-of-grading-and-scoring-work
         *  - https://help.alchemer.com/help/how-does-quiz-scoring-work
         **/

        $question_data = [
            [
                "type" => "scq",
                "bank_item" => 1,
                "meta" => [
                    "choices" => [
                        [ "score" => 1, "text" => "choice 1", ],
                        [ "score" => 2, "text" => "choice 2", ],
                        [ "score" => 3, "text" => "choice 3", ],
                        [ "score" => 4, "text" => "choice 4", ],
                        [ "score" => 5, "text" => "choice 5", ],
                    ],
                    "shuffle" => false,
                    "score" => 'numeric_single', // ['numeric_multiple', 'numeric_single', 'text_multiple', 'text_single', 'none']
                    "correct" => 3,
                ],
            ],
            [
                "type" => "scq",
                "bank_item" => 15,
                "meta" => [
                    "choices" => [
                        [ "score" => 1, "text" => "choice 1", ],
                        [ "score" => 2, "text" => "choice 2", ],
                        [ "score" => 3, "text" => "choice 3", ],
                        [ "score" => 4, "text" => "choice 4", ],
                        [ "score" => 5, "text" => "choice 5", ],
                    ],
                    "shuffle" => false,
                    "score" => 'numeric_single', // ['numeric_multiple', 'numeric_single', 'text_multiple', 'text_single', 'none']
                    "correct" => null,
                ],
            ],
            [
                "type" => "mcq",
                "bank_item" => 30,
                "meta" => [
                    "choices" => [
                        [ "score" => 1, "text" => "choice 1", ],
                        [ "score" => 2, "text" => "choice 2", ],
                        [ "score" => 3, "text" => "choice 3", ],
                        [ "score" => 4, "text" => "choice 4", ],
                        [ "score" => 5, "text" => "choice 5", ],
                    ],
                    "shuffle" => true,
                    "score" => 'numeric_multiple', // ['numeric_multiple', 'numeric_single', 'text_multiple', 'text_single', 'none']
                    "correct" => [1, 2],
                ],
            ],
            [
                "type" => "scale",
                "bank_item" => 12,
                "meta" => [
                    "choices" => [
                        [ "score" => 1, "text" => "choice 1", ],
                        [ "score" => 2, "text" => "choice 2", ],
                        [ "score" => 3, "text" => "choice 3", ],
                        [ "score" => 4, "text" => "choice 4", ],
                        [ "score" => 5, "text" => "choice 5", ],
                    ],
                    "shuffle" => false,
                    "score" => 'numeric_single', // ['numeric_multiple', 'numeric_single', 'text_multiple', 'text_single', 'none']
                    "correct" => null,
                ],
            ],
        ];


        $survey = Survey::create([
            "title" => "إدارة الموارد البشرية - 360 درجة",
            "description" => "لقد طُلب منك تقييم نفسك كجزء من عملية التغذية الراجعة بزاوية 360 درجة. سيقوم الموظفون الآخرون ، بما في ذلك مديرك (مديرك) ، وزملائك ، والتقارير المباشرة و / أو غيرهم بتقييمك أيضًا. بهذه الطريقة ، سيتم تزويدك برؤية شاملة متعددة المنظور (أي 360 درجة) لأدائك. الهدف هو تزويدك بالتغذية الراجعة للسماح لك بتحسين أدائك ، مما يؤدي إلى تحسين أداء الفريق والفعالية التنظيمية.",
            "meta" => [],
        ]);

        foreach ($question_data as $question_d)
        {
            $bank_item = \App\Logic\Facades\QuestionBank::find($question_d["bank_item"]);
            $competency = $bank_item->competency;

            unset($question_d["bank_item"]);

            $question_d["text"] = $bank_item->text;
            $question = Questions::create($question_d);

            $input = [
                "meta" => [],
                "survey_id" => $survey->id,
                "competency_id" => $competency->id,
                "question_id" => $question->id,
            ];

            Surveys::addQuestion($input);
        }
    }
}
