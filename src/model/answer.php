<?php

use PhpParser\Node\Expr\Cast\String_;

class Answer
{

    private Int $idAnswers;
    private string $createDate;

    public function __construct(int $idAnswers, String $createDate)
    {
        $this->idAnswers = $idAnswers;
        $this->createDate = $createDate;
    }

    public function getId(): int
    {
        return $this->idAnswers;
    }

    public function getCreateDate(): string
    {
        return $this->createDate;
    }
}
