<?php

use PhpParser\Node\Expr\Cast\String_;

class Result
{

    private Int $idResults;
    private Int $Answers_idAnswers;
    private string $result;

    public function __construct(int $idResults, String $result, Int $Answers_idAnswers)
    {
        $this->idResults = $idResults;
        $this->result = $result;
    }

    public function getId(): int
    {
        return $this->idResults;
    }
    public function getForgeinId(): int
    {
        return $this->Answers_idAnswers;
    }
    public function getResult(): string
    {
        return $this->result;
    }
}
