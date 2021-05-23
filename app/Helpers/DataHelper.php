<?php


namespace App\Helpers;


class DataHelper
{

    private static $instance;

    private function __construct()
    {
        $this->questions = collect( require(sprintf("%s/questions.php", database_path())) );
    }

    public static function getInstance()
    {
        if ( is_null(static::$instance) )
            static::$instance = new DataHelper();
        return static::$instance;
    }

    protected $questions;

    public function getCompetencies()
    {
        $rows = [];
        foreach ( $this->questions as $k => $v)
        {
            $rows[] = $this->formatCompetency($k);
        }
        return $rows;
    }

    private function formatCompetency(string $competency)
    {
        return ["label" => $competency];
    }

    public function getQuestions()
    {
        $rows = [];
        foreach ( $this->questions as $k => $v)
        {
            $rows = array_merge(
                $rows,
                $this->formatQuestions($k, $v)
            );
        }
        return $rows;
    }

    private function formatQuestions(string $competency, array $questions)
    {
        $rows = [];
        foreach ($questions as $question)
            $rows[] = $this->formatQuestion($competency, $question);
        return $rows;
    }

    private function formatQuestion(string $competency, string $question)
    {
        return [ "text" => $question, "competency" => $this->formatCompetency($competency) ];
    }

}
