<?php

use PhpParser\Node\Expr\Cast\String_;

class Result
{

    private Int $idResults;
    private string $result;

    public function __construct(int $idResults, String $result)
    {
        $this->idResults = $idResults;
        $this->result = $result;
    }

    public function getId(): int
    {
        return $this->idResults;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
